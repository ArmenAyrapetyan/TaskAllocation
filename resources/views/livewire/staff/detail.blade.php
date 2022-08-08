<div>
    <div class="ms-3 mt-2">
        <p class="h3">
            @if($employee->avatar)
                <img width="100" height="100" src="{{asset($employee->avatar->path)}}" alt="user avatar">
            @else
                <img width="100" height="100" src="{{asset('storage/images/imguser.png')}}" alt="user avatar">
            @endif
            {{$employee->full_name}}
        </p>
    </div>

    <div class="ms-2 mt-1">
        <p>Состоит в группах:</p>
        <ul>
            @foreach($employee->groups as $group)
                <li>
                    {{$group->name}}
                </li>
            @endforeach
        </ul>
    </div>

    <div class="ms-2 mt-2 me-2">
        <p class="mb-0 mt-3">Созданные проекты:</p>
        <div class="list-group">
            @foreach($employee->projects as $project)
                <a class="list-group-item list-group-item-action"
                   href="{{route('project.detail', $project->id)}}">{{$project->name}}</a>
            @endforeach
        </div>
        <p class="mb-0 mt-3">Участвует в задачах:</p>
        <div class="list-group">
            @foreach($employee->tasks as $task)
                <a class="list-group-item list-group-item-action"
                   href="{{route('task.detail', $task->task->id)}}">{{$task->role->name}} - {{$task->task->name}}</a>
            @endforeach
        </div>
    </div>

    <div class="float-end me-2 mt-2">
        <!-- Кнопка-триггер модального окна -->
        <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Редактировать группы сотрудника
        </button>

        <!-- Модальное окно -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
             aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Редактирование сотрудника</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                    </div>
                    <div class="modal-body">
                        @livewire('staff.edit', ['id' => $employee_id])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
