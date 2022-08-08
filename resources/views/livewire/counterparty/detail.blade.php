<div>
    <div class="mt-2 ms-2">
        <p class="h2">{{$counterparty->group->name . ' - ' . $counterparty->name . ' ' . $counterparty->source->name}}</p>
    </div>

    <div class="ms-3 mt-2">
        <p>
            @if($counterparty->website_url)
                <a href="{{$counterparty->website_url}}">Сайт</a>
            @else
                Сайт: не указан
            @endif
        </p>
        <p>
            @if($counterparty->vk_url)
                <a href="{{$counterparty->vk_url}}">Сообщество вконтакте</a>
            @else
                Сообщество вконтакте: не указано
            @endif
        </p>
        <p>
            @if($counterparty->telegram)
                Тег сообщества в телеграме: {{$counterparty->telegram}}
            @else
                Тег сообщества в телеграме: нет
            @endif
        </p>
    </div>

    <div class="ms-2 mt-2 me-2">
        <table class="table table-hover">
            <tbody>
            <tr>
                <td>
                    Проекты
                </td>
                <td>
                    Задачи
                </td>
            </tr>
            @foreach($counterparty->projects as $project)
                <tr>
                    <td>
                        <a href="{{route('project.detail', $project->id)}}">{{$project->name}}</a>
                    </td>
                    <td>
                        @foreach($project->tasks as $task)
                            <a href="{{route('task.detail', $task->id)}}">{{$task->name}}</a>
                            <br>
                        @endforeach
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="float-end me-2 mt-2">
        <!-- Кнопка-триггер модального окна -->
        <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Редактировать контрагента
        </button>

        <!-- Модальное окно -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
             aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Редактирование контрагента</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                    </div>
                    <div class="modal-body">
                        @livewire('counterparty.edit', ['id' => $counterparty_id])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
