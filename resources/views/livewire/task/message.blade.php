<div class="m-3 p-2">
    <div class="form-floating mb-3 mt-2">
        <textarea wire:model="message" name="message" style="height: 100px;"
                  class="form-control @isset($message) @if($message != '') is-valid @else is-invalid @endif @endisset
                  @error('message') is-invalid @enderror"
                  id="message"></textarea>
        <label for="message">Сообщение</label>
    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button class="btn btn-primary" wire:click="createMessage">Отправить сообщение</button>
    </div>
    @foreach($task_messages as $msg)
        <div class="d-flex flex-row mt-1">
            <div class="image">
                @if($msg->user->avatar)
                    <img src="{{asset($msg->user->avatar->path)}}" style="object-fit: cover;" class="rounded-circle" width="40" height="40" alt="user avatar">
                @else
                    <img src="{{asset('storage/images/imguser.png')}}" style="object-fit: cover;" class="rounded-circle" width="40" height="40" alt="user avatar">
                @endif
            </div>

            <div class="ps-2">
                <div class="d-flex flex-row">
                <span>
                    <p><a href="{{route('staff.detail', $msg->user->id)}}">{{$msg->user->full_name}}</a> {{$msg->created_at}}</p>
                </span>
                </div>
                <div class="ps-1">
                    <p>{{$msg->text}}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>
