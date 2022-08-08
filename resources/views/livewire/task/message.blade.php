<div class="ms-2 mt-2">
    <p>Чат по задаче:</p>
    @foreach($task_messages as $msg)
        <div class="d-flex flex-row mt-1">
            <div class="image">
                @if($msg->user->avatar)
                    <img src="{{asset($msg->user->avatar->path)}}" class="rounded-circle" width="40"
                         height="40" alt="user avatar">
                @else
                    <img src="{{asset('storage/images/imguser.png')}}" class="rounded-circle" width="40" height="40"
                         alt="user avatar">
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
    <div class="form-floating mb-3 mt-2">
        <textarea wire:model="message" name="message"
                  class="form-control @isset($message) @if($message != '') is-valid @else is-invalid @endif @endisset
                  @error('message') is-invalid @enderror"
                  id="floatingInput"></textarea>
        <label for="floatingInput">Сообщение</label>
    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button class="btn" wire:click="createMessage">Отправить сообщение</button>
    </div>
</div>
