<div>

    <div class="form-floating mb-3">
        <input wire:model="counterparty_data.name" name="counterparty_data.name" type="text"
               class="form-control @isset($counterparty_data['name']) @if($counterparty_data['name'] != '') is-valid @else is-invalid @endif @endisset
               @error('counterparty_data.name') is-invalid @enderror" id="floatingInput">
        <label for="floatingInput">Имя компании</label>
        @error('counterparty_data.name')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-floating mb-3">
        <input wire:model="counterparty_data.phone" name="counterparty_data.phone" type="text"
               class="form-control @isset($counterparty_data['phone']) @if($counterparty_data['phone'] != '') is-valid @else is-invalid @endif @endisset
               @error('counterparty_data.phone') is-invalid @enderror" id="floatingInput">
        <label for="floatingInput">Телефон</label>
        @error('counterparty_data.phone')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-floating mb-3">
        <input wire:model="counterparty_data.email" name="counterparty_data.email" type="text"
               class="form-control @isset($counterparty_data['email']) @if($counterparty_data['email'] != '') is-valid @else is-invalid @endif @endisset
               @error('counterparty_data.email') is-invalid @enderror" id="floatingInput">
        <label for="floatingInput">Почта</label>
        @error('counterparty_data.email')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-floating mb-3">
        <input wire:model="counterparty_data.website_url" name="counterparty_data.website_url" type="text"
               class="form-control @isset($counterparty_data['website_url']) @if($counterparty_data['website_url'] != '') is-valid @else is-invalid @endif @endisset
               @error('counterparty_data.website_url') is-invalid @enderror" id="floatingInput">
        <label for="floatingInput">Ссылка на web-сайт</label>
        @error('counterparty_data.website_url')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-floating mb-3">
        <input wire:model="counterparty_data.vk_url" name="counterparty_data.vk_url" type="text"
               class="form-control @isset($counterparty_data['vk_url']) @if($counterparty_data['vk_url'] != '') is-valid @else is-invalid @endif @endisset
               @error('counterparty_data.vk_url') is-invalid @enderror" id="floatingInput">
        <label for="floatingInput">Ссылка на сообщество vk</label>
        @error('counterparty_data.vk_url')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-floating mb-3">
        <input wire:model="counterparty_data.telegram" name="counterparty_data.telegram" type="text"
               class="form-control @isset($counterparty_data['telegram']) @if($counterparty_data['telegram'] != '') is-valid @else is-invalid @endif @endisset
               @error('counterparty_data.telegram') is-invalid @enderror" id="floatingInput">
        <label for="floatingInput">Сообщество telegram</label>
        @error('counterparty_data.telegram')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-floating mb-3">
        <select wire:model="counterparty_data.is_manufacturer" name="counterparty_data.is_manufacturer"
                class="form-control @isset($counterparty_data['is_manufacturer']) is-valid @endisset
                @error('counterparty_data.is_manufacturer') is-invalid @enderror">
            <option selected="" value="">Выберите ответ</option>
            <option value="1">Да</option>
            <option value="0">Нет</option>
        </select>
        <label for="floatingInput">Компания производитель?</label>
        @error('counterparty_data.is_manufacturer')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-floating mb-3">
        <select wire:model="counterparty_data.special_group_id" name="counterparty_data.special_group_id"
                class="form-control @isset($counterparty_data['special_group_id']) is-valid @endisset
                @error('counterparty_data.special_group_id') is-invalid @enderror">
            <option selected="" value="">Группа компании</option>
            @foreach($specialGroups as $group)
                <option value="{{ $group->id }}"> {{ $group->name }}</option>
            @endforeach
        </select>
        <label for="floatingInput">Группа компании</label>
        @error('counterparty_data.special_group_id')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-floating mb-3">
        <select wire:model="counterparty_data.source_id" name="counterparty_data.source_id"
                class="form-control @isset($counterparty_data['source_id']) is-valid @endisset
                @error('counterparty_data.source_id') is-invalid @enderror">
            <option selected="" value="">Ресурс компании</option>
            @foreach($sources as $source)
                <option value="{{ $source->id }}"> {{ $source->name }}</option>
            @endforeach
        </select>
        <label for="floatingInput">Ресурс</label>
        @error('counterparty_data.source_id')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        <button wire:click="createCounterparty()" type="button" class="btn btn-primary">
            Сохранить контрагенство
        </button>
    </div>

</div>
