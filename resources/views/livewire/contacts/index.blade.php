<div>
    <div class="float-start bg-light p-2 h-100 w-25 mw-25">
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
    <div class="float-end bg-white w-75 mw-75 h-100 position-relative">

        @livewire('contacts.show')

    </div>
</div>
