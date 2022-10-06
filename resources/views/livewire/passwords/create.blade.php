<div class="ms-1">
    <p class="mb-1">Создание папки или подпапки</p>
    <p class="mb-0">К какой папке относится</p>
    <select wire:model="dictionary_id" class="form-select">
        <option value="0">Выберите основную папку при необходимости</option>
        @foreach($dictionaries as $dictionary)
            <option value="{{$dictionary->id}}">{{$dictionary->name}}</option>
        @endforeach
    </select>
    <p class="mt-1 mb-0">Имя папки</p>
    <input wire:model="name" class="form-control @error('name') is-invalid @enderror" type="text">
    <div class="d-flex justify-content-end">
        <button wire:click="createDictionary()" class="mt-2 btn btn-primary">Создать папку/подпапку</button>
    </div>
    <hr>

    @livewire('passwords.create-info')

</div>
