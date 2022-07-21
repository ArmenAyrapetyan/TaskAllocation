<div>
    <div class="float-start bg-light p-2 h-100 w-25 mw-25">
        <div class="accordion" id="accordionExample">
            <ul class="list-group nav-tabs" id="myTab" role="tablist">
                <p class="m-2">Все</p>
                <li class="nav-item list-group-item d-flex justify-content-between align-items-start"
                    role="presentation">
                    <button class="btn"
                            wire:click="getAllProjects">Все проекты</button>
                </li>
                <p class="m-2">Статусы</p>
                @foreach($statuses as $status)
                    <li class="nav-item list-group-item d-flex justify-content-between align-items-start"
                        role="presentation">
                        <button class="btn"
                                wire:click="checkProject({{$status->id}}, {{true}})">{{$status->name}}</button>
                    </li>
                @endforeach
                <p class="m-2">Группы</p>
                @foreach($groups as $group)
                    <li class="nav-item list-group-item d-flex justify-content-between align-items-start"
                        role="presentation">
                        <button class="btn"
                                wire:click="checkProject({{$group->id}}, {{false}})">
                            <p class="m-0">{{ $group->name }}</p>
                        </button>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="float-end bg-white w-75 mw-75 h-100 position-relative">

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

        @livewire('project.show')

    </div>
</div>
