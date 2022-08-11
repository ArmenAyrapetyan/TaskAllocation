<div>
    <!-- Кнопка-триггер модального окна -->
    <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Создать задачу
    </button>

    <!-- Модальное окно -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Создание задачи</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>
                <div class="modal-body">
                    @livewire('task.create')
                </div>
            </div>
        </div>
    </div>

    <table class="table table-striped table-bordered ms-2">
        <tr>
            <th scope="col">
                Название
            </th>
            <th scope="col">
                Проект
            </th>
            <th scope="col">
                Начало
            </th>
            <th scope="col">
                Окончание
            </th>
            <th scope="col">
                Участники
            </th>
            <th scope="col">
                Затраченное время
            </th>
        </tr>
        @foreach($tasks as $task)
            <tr>
                <th scope="row">
                    <a href="{{route('task.detail', $task->id)}}">{{$task->name}}</a>
                </th>
                <td>
                    @if($task->project)
                        <a href="{{route('project.detail', $task->project->id)}}">{{$task->project->name}}</a>
                    @endif
                </td>
                <td>
                    {{$task->date_start}}
                </td>
                <td>
                    {{$task->date_end}}
                </td>
                <td>
                    @if($task->users)
                        @foreach($task->users as $user)
                            <p>{{$user->role->name}} <a href="{{route('staff.detail', $user->user->id)}}">{{$user->user->full_name}}</a></p>
                        @endforeach
                    @endif
                </td>
                <td>
                    {{$task->timeSpend()}} мин.
                </td>
            </tr>
        @endforeach
    </table>
</div>
