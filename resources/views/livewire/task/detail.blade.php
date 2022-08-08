<div>
    <div class="mt-2 ms-2">
        <p class="h2">
            @if($task->project)
                {{ $task->project->name . ' - ' . $task->name . ' ' . $task->project->counterparty->name }}
            @else
                Без проекта - {{ $task->name }}
            @endif
        </p>
    </div>

    <div class="ms-3 mt-2">
        <p class="h3">
            @foreach($task->users as $user)
                @if($user->task_role_id == 1)
                    @if($user->user->avatar)
                        <img width="100" height="100" src="{{asset($user->user->avatar->path)}}" alt="user avatar">
                    @else
                        <img width="100" height="100" src="{{asset('storage/images/imguser.png')}}" alt="user avatar">
                    @endif
                    <a href="{{route('staff.detail', $user->user->id)}}">{{$user->user->full_name}}</a>
                @endif
            @endforeach
        </p>
        <p>{{$task->description}}</p>
    </div>

    <div class="ms-3 mt-2">
        <p>Участники:</p>
        <div class="list-group">
            @foreach($task->users as $user)
                <a class="list-group-item list-group-item-action"
                   href="{{route('staff.detail', $user->user->id)}}">{{$user->role->name}} - {{$user->user->full_name}}</a>
            @endforeach
        </div>
    </div>

    @livewire('task.message', ['id' => $task->id])

    <div class="float-end me-2 mt-2">
        <!-- Кнопка-триггер модального окна -->
        <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Редактировать задачу
        </button>

        <!-- Модальное окно -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
             aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Редактирование задачи</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                    </div>
                    <div class="modal-body">
                        @livewire('task.edit', ['id' => $task_id])
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
