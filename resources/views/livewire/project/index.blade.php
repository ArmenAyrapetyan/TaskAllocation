<div>
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
                            wire:click="checkProject({{$group->id}})">
                        <p class="m-0">{{ $group->name }}</p>
                    </button>
                </li>
            @endforeach
        </ul>
    </div>
</div>
