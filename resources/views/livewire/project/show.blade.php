<div>
    <table class="table table-striped table-bordered ms-2">
        <tr>
            <th scope="col">
                Проект
            </th>
            <th scope="col">
                Задач
            </th>
            <th scope="col">
                Контрагент
            </th>
            <th scope="col">
                Статус
            </th>
            <th scope="col">
                Автор
            </th>
        </tr>
        @foreach($projects as $project)
            <tr data-bs-toggle="modal" data-bs-target="#detailModal{{$project->id}}">
                <th scope="row">
                    {{ $project->name }}
                </th>
                <td>
                    {{ $project->count_tasks }}
                </td>
                <td>
                    @if($project->counterparty)
                        {{ $project->counterparty->name }}
                    @else
                        null
                    @endif
                </td>
                <td>
                    {{ $project->status->name }}
                </td>
                <td>
                    {{ $project->user->full_name }}
                </td>
            </tr>

            <!-- Модальное окно -->
            <div class="modal fade" id="detailModal{{$project->id}}" data-bs-backdrop="static" data-bs-keyboard="false"
                 tabindex="-1"
                 aria-labelledby="detailModalLabel{{$project->id}}" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="detailModalLabel{{$project->id}}">Подробнее о проекте</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Закрыть"></button>
                        </div>
                        <div class="modal-body">
                            <p>{{$project->group->name . '/' . $project->name}}</p>
                            <div class="container">
                                <div class="row border-bottom">
                                    <div class="col-sm border-end">
                                        Задача
                                    </div>
                                    <div class="col-sm border-end">
                                        Контрагент
                                    </div>
                                    <div class="col-sm border-end">
                                        Статус
                                    </div>
                                    <div class="col-sm border-end">
                                        Дата создания
                                    </div>
                                    <div class="col-sm border-end">
                                        Участники
                                    </div>
                                    <div class="col-sm">
                                        Затраченное время
                                    </div>
                                </div>
                                @foreach($project->tasks as $task)
                                    <div class="row border-bottom">
                                        <div class="col-sm border-end">
                                            {{$task->name}}
                                        </div>
                                        <div class="col-sm border-end">
                                            @if($project->counterparty)
                                                {{$project->counterparty->name}}
                                            @endif
                                        </div>
                                        <div class="col-sm border-end">
                                            {{$task->status->name}}
                                        </div>
                                        <div class="col-sm border-end">
                                            {{$task->created_at}}
                                        </div>
                                        <div class="col-sm border-end">
                                            @if($task->users)
                                                @foreach($task->users as $user)
                                                    <p>{{$user->user->full_name . ' ' . $user->role->name}}</p>
                                                @endforeach
                                            @endif
                                        </div>
                                        <div class="col-sm">
                                            @if($task->time_spend)
                                                {{$task->time_spend . ' мин.'}}
                                            @else
                                                0 мин.
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </table>
</div>
