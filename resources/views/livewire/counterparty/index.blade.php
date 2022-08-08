<div>
    <div class="accordion" id="accordionExample">
        <ul class="list-group nav-tabs" id="myTab" role="tablist">
            <p class="m-2">Все</p>
            <li class="nav-item list-group-item d-flex justify-content-between align-items-start"
                role="presentation">
                <button class="btn" wire:click="allCounterparty">Все контрагенты</button>
            </li>
            <p class="m-2">Группы</p>
            @foreach($specialGroups as $group)
                <li class="nav-item list-group-item d-flex justify-content-between align-items-start" role="presentation">
                    <button class="btn" wire:click="sortCounterparty({{$group->id}})">{{$group->name}}</button>
                </li>
            @endforeach
        </ul>
    </div>
</div>
