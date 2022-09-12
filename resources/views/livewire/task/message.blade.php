<div class="m-3 p-2">
    @if($task->isUserInTask(auth()->id()))
        <div class="form-floating mb-3 mt-2">
        <textarea wire:model="message" name="message" style="height: 100px;"
                  class="form-control @isset($message) @if($message != '') is-valid @else is-invalid @endif @endisset
                  @error('message') is-invalid @enderror" id="message"></textarea>
            <label for="message">Сообщение</label>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            @if($is_have_files)
                <div class="d-flex align-items-center">
                    <input class="form-control" multiple @if(!$is_have_files) disabled @endif type="file" wire:model="files">
                    <div wire:loading wire:target="files" class="m-1 spinner-grow text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    @error('files')
                    <div class="text-danger">{{ $message }}</div> @enderror
                </div>
            @endif
            <div class="form-check form-switch d-flex justify-content-center align-items-center">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" wire:model="is_have_files">
                <label class="form-check-label ms-1" for="flexSwitchCheckChecked">Добавить файлы в задачу?</label>
            </div>
            <button @if($is_have_files) wire:key="active" wire:loading.attr="disabled"  wire:target="files" @endif
                class="btn btn-primary" wire:click="createMessage">Отправить сообщение</button>
        </div>
    @endif
    @foreach($task_messages as $msg)
        <div class="d-flex flex-row mt-1">
            <div class="image">
                @if($msg->user->avatar)
                    <img src="{{asset($msg->user->avatar->path)}}" style="object-fit: cover;" class="rounded-circle"
                         width="40" height="40" alt="user avatar">
                @else
                    <img src="{{asset('storage/images/imguser.png')}}" style="object-fit: cover;" class="rounded-circle"
                         width="40" height="40" alt="user avatar">
                @endif
            </div>

            <div class="ps-2">
                <div class="d-flex flex-row">
                <span>
                    <p><a href="{{route('staff.detail', $msg->user->id)}}">{{$msg->user->full_name}}</a> {{$msg->created_at}}</p>
                </span>
                </div>
                <div class="ps-1">
                    @foreach(explode(' ', $msg->text) as $word)
                        @if(is_numeric(strpos($word, 'http')))
                            <div class="d-none">
                                {{preg_match("~<title>(.*)</title>~",file_get_contents($word), $title)}}
                            </div>
                            <a href="{{$word}}">{{$title[1]}}</a>
                        @else
                            {{$word}}
                        @endif
                    @endforeach
                </div>
                <div class="d-flex">
                    @foreach($msg->files as $file)
                        @if(exif_imagetype($file->path))
                            <img src="{{asset($file->path)}}" alt="image_task" width="200" height="200" style="object-fit: cover;"
                                 class="m-2 img-thumbnail">
                        @else
                            <button wire:click="downloadFile('{{$file->path}}')" class="btn" style="width: 200px;height: 200px;">
                                {{pathinfo($file->path)['extension']}}
                            </button>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach
    {{$task_messages->links()}}
</div>
