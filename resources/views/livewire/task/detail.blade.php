<div>
    <div class="mt-2 ms-2">
        <p class="h3">
            @if($task->project)
                Проект:
                <a class="ms-1 me-1" href="{{route('project.detail', $task->project->id)}}">
                    {{$task->project->name}}</a>
                Задача: {{$task->name}}
                @if($task->project->counterparty)
                    Контрагент:
                    <a class="ms-1 me-1" href="{{route('counterparty.detail', $task->project->counterparty->id)}}">
                        {{$task->project->counterparty->name}}</a>
                @endif
                Статус: {{$task->status->name}}
            @else
                Без проекта - {{ $task->name . ' ' . $task->status->name}}
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
        <p class="h3">Времени по плану: {{$task->time_planned}} мин.
            Времени было затраченно: {{$task->timeSpend()}} мин.</p>
        @if($task->isUserInTask(auth()->id()))
            @livewire('task.timer', ['task_id' => $task_id])
        @endif
    </div>

    <p class="m-3">Участники:</p>
    <div class="m-3 d-flex justify-content-start">
        <div class="list-group">
            @foreach($task->users as $user)
                <a class="list-group-item list-group-item-action"
                   href="{{route('staff.detail', $user->user->id)}}">{{$user->role->name}}
                    - {{$user->user->full_name}}</a>
            @endforeach
        </div>
    </div>

    <div class="float-end me-2 mb-2">
        @if(!$task->isUserInTask(auth()->id()))
            <button type="button" class="btn btn-primary m-2" wire:click="takeExecutor">Взять на исполнение</button>
        @else
            @if($task->creator_id != auth()->id())
                @if($task->status_id != 8)
                    <button type="button" class="btn btn-primary m-2" wire:click="modStatus({{1}})">Требуется доработка
                        описания
                    </button>
                @endif
                @if($task->status_id != 2)
                    <button type="button" class="btn btn-primary m-2" wire:click="modStatus({{0}})">В работу
                    </button>
                @endif
            @endif
        @endif

        @if($task->creator_id == auth()->id())
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
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Закрыть"></button>
                        </div>
                        <div class="modal-body">
                            @livewire('task.edit', ['id' => $task_id])
                        </div>
                    </div>
                </div>
            </div>
        @else
            @if($task->isUserInTask(auth()->id()))
                <!-- Кнопка-триггер модального окна -->
                <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">
                    Редактировать исполнителей
                </button>

                <!-- Модальное окно -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                     tabindex="-1"
                     aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Доступные исполнители</h5>
                            </div>
                            <div class="modal-body">
                                @livewire('task.executorsadd', ['task_id' => $task_id])
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endif
    </div>

    <p class="ms-3">Чат по задаче:</p>
    @livewire('task.message', ['id' => $task->id])
</div>
