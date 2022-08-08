<div>
    <ul class="list-group nav-tabs" id="myTab" role="tablist">
        <p class="m-2">Сортировка</p>
        <li class="nav-item list-group-item d-flex justify-content-between align-items-start"
            role="presentation">
            <button class="btn" wire:click="getAllContacts">Все контакты</button>
        </li>
        @foreach($contactsGroup as $group)
            <li class="nav-item list-group-item d-flex justify-content-between align-items-start"
                role="presentation">
                <button class="btn" wire:click="sortContactsBy({{$group->id}})">{{$group->name}}</button>
            </li>
        @endforeach
    </ul>
</div>
