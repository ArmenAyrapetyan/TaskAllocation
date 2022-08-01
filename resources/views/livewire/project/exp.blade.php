<div class="modal-body">
    <div class="d-flex flex-row mt-1">
        <div class="image">
            @foreach($task->users as $user)
                @if($user->task_role_id == 1)
                    @if($user->user->avatar)
                        <img src="{{asset($user->user->avatar->path)}}" class="rounded-circle"
                             width="100" height="100" alt="">
                    @else
                        <img src="storage/images/imguser.png" class="rounded-circle" width="100"
                             height="100" alt="">
                    @endif
                @endif
            @endforeach
        </div>

        <div class="ps-2">
            <div class="d-flex flex-row">
                    <span>
                        @foreach($task->users as $user)
                            @if($user->task_role_id == 1)
                                <p>{{$user->user->full_name . ' ' . $task->created_at}}</p>
                            @endif
                        @endforeach
                    </span>
            </div>

            <div class="ps-1">
                <button class="btn btn-outline-dark btn-sm">Открыть профиль</button>
            </div>
        </div>
    </div>

    <div class="p-2">
        <p>{{$task->description}}</p>
        <p>Чат по задаче:</p>
        @foreach($task->messages as $message)
            <div class="d-flex flex-row mt-1">
                <div class="image">
                    @if($message->user->avatar)
                        <img src="{{asset($message->user->avatar->path)}}" class="rounded-circle"
                             width="100" height="100" alt="">
                    @else
                        <img src="storage/images/imguser.png" class="rounded-circle" width="100"
                             height="100" alt="">
                    @endif
                </div>

                <div class="ps-2">
                    <div class="d-flex flex-row">
                        <span>
                            <p>{{$message->user->full_name . ' ' . $message->created_at}}</p>
                        </span>
                    </div>
                    <div class="ps-1">
                        <p>{{$message->text}}</p>
                    </div>
                </div>
            </div>
        @endforeach
        @livewire('task.message', ['id' => $task->id] ,key($task->id))
    </div>
</div>
