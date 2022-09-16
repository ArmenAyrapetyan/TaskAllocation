<div>
    <div class="form-floating mb-3">
        <input wire:model="contact_data.first_name" name="contact_data.first_name" type="text"
               class="form-control @isset($contact_data['first_name']) @if($contact_data['first_name'] != '') is-valid @else is-invalid @endif @endisset
               @error('contact_data.first_name') is-invalid @enderror" id="floatingInput">
        <label for="floatingInput">Имя</label>
        @error('contact_data.first_name')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="form-floating mb-3">
        <input wire:model="contact_data.last_name" name="contact_data.last_name" type="text"
               class="form-control @isset($contact_data['last_name']) @if($contact_data['last_name'] != '') is-valid @else is-invalid @endif @endisset
               @error('contact_data.last_name') is-invalid @enderror" id="floatingInput">
        <label for="floatingInput">Фамилия</label>
        @error('contact_data.last_name')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="form-floating mb-3">
        <input wire:model="contact_data.post" name="contact_data.post" type="text"
               class="form-control @isset($contact_data['post']) @if($contact_data['post'] != '') is-valid @else is-invalid @endif @endisset
               @error('contact_data.post') is-invalid @enderror" id="floatingInput">
        <label for="floatingInput">Должность</label>
        @error('contact_data.post')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="form-floating mb-3">
        <select wire:model="contact_data.source_id" name="contact_data.source_id" class="form-control
        @isset($contact_data['source_id']) is-valid @endisset @error('contact_data.source_id') is-invalid @enderror">
            <option selected="" value="">Ресурс контакта</option>
            @foreach($sources as $source)
                <option @if($contact_data['source_id'] == $source->id) selected @endif value="{{ $source->id }}"> {{ $source->name }}</option>
            @endforeach
        </select>
        <label for="floatingInput">Ресурс</label>
        @error('contact_data.source_id')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="form-floating mb-3">
        <select wire:model="contact_data.special_group_id" name="contact_data.special_group_id" class="form-control @isset($contact_data['special_group_id']) is-valid @endisset
                @error('contact_data.special_group_id') is-invalid @enderror">
            <option selected="" value="">Группа</option>
            @foreach($special_groups as $group)
                <option @if($contact_data['special_group_id'] == $group->id) selected @endif value="{{ $group->id }}"> {{ $group->name }}</option>
            @endforeach
        </select>
        <label for="floatingInput">Группа контакта</label>
        @error('contact_data.special_group_id')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="form-floating mb-3">
        <select wire:model="contact_data.counterparty_id" name="contact_data.counterparty_id"
                class="form-control @isset($contact_data['counterparty_id']) is-valid @endisset
                @error('contact_data.counterparty_id') is-invalid @enderror">
            <option selected="" value="">Компания</option>
            @foreach($counterpaties as $counterparty)
                <option @if($contact_data['counterparty_id'] == $counterparty->id) selected @endif value="{{ $counterparty->id }}"> {{ $counterparty->name }}</option>
            @endforeach
        </select>
        <label for="floatingInput">К какой компании относится</label>
        @error('contact_data.counterparty_id')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="form-floating mb-3">
        <input wire:model="contact_data.phone" name="contact_data.phone" type="text"
               class="form-control @isset($contact_data['phone']) @if($contact_data['phone'] != '') is-valid @else is-invalid @endif @endisset
               @error('contact_data.phone') is-invalid @enderror" id="floatingInput">
        <label for="floatingInput">Номер телефона</label>
        @error('contact_data.phone')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="form-floating mb-3">
        <input wire:model="contact_data.email" name="contact_data.email" type="email"
               class="form-control @isset($contact_data['email']) @if($contact_data['email'] != '') is-valid @else is-invalid @endif @endisset
               @error('contact_data.email') is-invalid @enderror" id="floatingInput">
        <label for="floatingInput">Почта</label>
        @error('contact_data.email')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="form-floating mb-3">
        <input wire:model="contact_data.telegram" name="contact_data.telegram" type="text"
               class="form-control @isset($contact_data['telegram']) @if($contact_data['telegram'] != '') is-valid @else is-invalid @endif @endisset
               @error('contact_data.telegram') is-invalid @enderror" id="floatingInput">
        <label for="floatingInput">Телеграм</label>
        @error('contact_data.telegram')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="form-floating mb-3">
        <input wire:model="contact_data.vk_url" name="contact_data.vk_url" type="text"
               class="form-control @isset($contact_data['vk_url']) @if($contact_data['vk_url'] != '') is-valid @else is-invalid @endif @endisset
               @error('contact_data.vk_url') is-invalid @enderror" id="floatingInput">
        <label for="floatingInput">Ссылка на vk</label>
        @error('contact_data.vk_url')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        <button wire:click="editContact" type="button" class="btn btn-primary">
            Сохранить контакт
        </button>
    </div>
</div>
