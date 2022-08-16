<div>
    <!-- Кнопка-триггер модального окна -->
    <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Создать проект
    </button>

    <!-- Модальное окно -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Создание проекта</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>
                <div class="modal-body">
                    @livewire('project.create')
                </div>
            </div>
        </div>
    </div>

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
                <tr>
                    <th scope="row">
                        <a href="{{route('project.detail', $project->id)}}">
                        {{ $project->name }}
                        </a>
                    </th>
                    <td>
                        {{ $project->count_tasks }}
                    </td>
                    <td>
                        @if($project->counterparty)
                            <a href="{{route('counterparty.detail', $project->counterparty->id)}}">{{$project->counterparty->name}}</a>
                        @else
                            Нет
                        @endif
                    </td>
                    <td>
                        {{ $project->status->name }}
                    </td>
                    <td>
                        <a href="{{route('staff.detail', $project->user->first()->id)}}">{{ $project->user->first()->full_name }}</a>
                    </td>
                </tr>
        @endforeach
    </table>
</div>
