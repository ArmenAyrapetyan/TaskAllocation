<div>

    <!-- Кнопка-триггер модального окна -->
    <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#createTask">
        Создать задачу
    </button>

    <!-- Модальное окно -->
    <div class="modal fade" id="createTask" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="createTaskLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createTaskLabel">Создание задачи</h5>
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
            <tr data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$task->id}}">
                <th scope="row">
                    @if($task->project)
                        {{$task->project->name}} -
                    @endif {{ $task->name }}
                </th>
                <td>
                    @if($task->project)
                        {{ $task->project->name }}
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
                            <p>{{$user->user->full_name . ' ' . $user->role->name}}</p>
                        @endforeach
                    @endif
                </td>
                <td>
                    @if($task->time_spend)
                        {{$task->time_spend . ' мин.'}}
                    @else
                        0 мин.
                    @endif
                </td>
            </tr>

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop{{$task->id}}" data-bs-backdrop="static" data-bs-keyboard="false"
                 tabindex="-1" aria-labelledby="staticBackdrop{{$task->id}}Label" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdrop{{$task->id}}Label">
                                @if($task->project)
                                    {{$task->project->name}} -
                                @endif {{$task->name}}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="d-flex flex-row mt-1">
                                <div class="image">
                                    <img
                                        src="https://proprikol.ru/wp-content/uploads/2020/02/porodistye-sobaki-krasivye-kartinki-19.jpg"
                                        class="rounded-circle" width="100" height="100"/>
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
                        </div>

                        <div class="p-2">
                            <p>{{$task->description}}</p>
                        </div>

                        <div class="p-2">
                            <p>Чат по задаче:</p>
                            @foreach($task->messages as $message)
                                <div class="d-flex flex-row mt-1">
                                    <div class="image">
                                        <img
                                            src="https://proprikol.ru/wp-content/uploads/2020/02/porodistye-sobaki-krasivye-kartinki-19.jpg"
                                            class="rounded-circle" width="100" height="100"/>
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
                            @livewire('task.message')
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </table>
</div>
