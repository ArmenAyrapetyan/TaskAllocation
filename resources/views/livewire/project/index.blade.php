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

        @livewire('project.show')

    </div>
</div>
