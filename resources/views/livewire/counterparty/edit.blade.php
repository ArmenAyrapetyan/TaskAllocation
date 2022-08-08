<div>
    <div class="form-floating mb-3">
        <input wire:model="name" name="name" type="text"
               class="form-control @isset($name) @if($name != '') is-valid @else is-invalid @endif @endisset
               @error('name') is-invalid @enderror" id="floatingInput">
        <label for="floatingInput">Имя компании</label>
        @error('name')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-floating mb-3">
        <input wire:model="phone" name="phone" type="text"
               class="form-control @isset($phone) @if($phone != '') is-valid @else is-invalid @endif @endisset
               @error('phone') is-invalid @enderror" id="floatingInput">
        <label for="floatingInput">Телефон</label>
        @error('phone')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-floating mb-3">
        <input wire:model="email" name="email" type="text"
               class="form-control @isset($email) @if($email != '') is-valid @else is-invalid @endif @endisset
               @error('email') is-invalid @enderror" id="floatingInput">
        <label for="floatingInput">Почта</label>
        @error('email')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-floating mb-3">
        <input wire:model="web_site" name="web_site" type="text"
               class="form-control @isset($web_site) @if($web_site != '') is-valid @else is-invalid @endif @endisset
               @error('web_site') is-invalid @enderror" id="floatingInput">
        <label for="floatingInput">Ссылка на web-сайт</label>
        @error('web_site')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-floating mb-3">
        <input wire:model="vk" name="vk" type="text"
               class="form-control @isset($vk) @if($vk != '') is-valid @else is-invalid @endif @endisset
               @error('vk') is-invalid @enderror" id="floatingInput">
        <label for="floatingInput">Ссылка на сообщество vk</label>
        @error('vk')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-floating mb-3">
        <input wire:model="telegram" name="telegram" type="text"
               class="form-control @isset($telegram) @if($telegram != '') is-valid @else is-invalid @endif @endisset
               @error('telegram') is-invalid @enderror" id="floatingInput">
        <label for="floatingInput">Сообщество telegram</label>
        @error('telegram')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-floating mb-3">
        <select wire:model="is_manufacturer" name="is_manufacturer"
                class="form-control @isset($is_manufacturer) is-valid @endisset
                @error('is_manufacturer') is-invalid @enderror">
            <option selected="" value="">Выберите ответ</option>
            <option value="1">Да</option>
            <option value="0">Нет</option>
        </select>
        <label for="floatingInput">Компания производитель?</label>
        @error('is_manufacturer')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-floating mb-3">
        <select wire:model="special_group_id" name="special_group_id"
                class="form-control @isset($special_group_id) is-valid @endisset
                @error('special_group_id') is-invalid @enderror">
            <option selected="" value="">Группа компании</option>
            @foreach($specialGroups as $group)
                <option value="{{ $group->id }}"> {{ $group->name }}</option>
            @endforeach
        </select>
        <label for="floatingInput">Группа компании</label>
        @error('special_group_id')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-floating mb-3">
        <select wire:model="source_id" name="source_id"
                class="form-control @isset($source_id) is-valid @endisset
                @error('source_id') is-invalid @enderror">
            <option selected="" value="">Ресурс компании</option>
            @foreach($sources as $source)
                <option value="{{ $source->id }}"> {{ $source->name }}</option>
            @endforeach
        </select>
        <label for="floatingInput">Ресурс</label>
        @error('source_id')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        <button wire:click="editCounterparty()" type="button" class="btn btn-primary">
            Изменить контрагенство
        </button>
    </div>
</div>
