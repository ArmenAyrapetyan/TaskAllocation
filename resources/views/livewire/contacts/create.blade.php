<div>
    <div class="form-floating mb-3">
        <input wire:model="first_name" name="first_name" type="text"
               class="form-control @isset($first_name) @if($first_name != '') is-valid @else is-invalid @endif @endisset
               @error('first_name') is-invalid @enderror"
               id="floatingInput">
        <label for="floatingInput">Имя</label>
        @error('first_name')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="form-floating mb-3">
        <input wire:model="last_name" name="last_name" type="text"
               class="form-control @isset($last_name) @if($last_name != '') is-valid @else is-invalid @endif @endisset
               @error('last_name') is-invalid @enderror"
               id="floatingInput">
        <label for="floatingInput">Фамилия</label>
        @error('last_name')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="form-floating mb-3">
        <input wire:model="post" name="post" type="text"
               class="form-control @isset($post) @if($post != '') is-valid @else is-invalid @endif @endisset
               @error('post') is-invalid @enderror"
               id="floatingInput">
        <label for="floatingInput">Должность</label>
        @error('post')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="form-floating mb-3">
        <select wire:model="source_id" name="source_id"
                class="form-control @isset($source_id) is-valid @endisset
                @error('source_id') is-invalid @enderror">
            <option selected="" value="">Ресурс контакта</option>
            @foreach($sources as $source)
                <option value="{{ $source->id }}"> {{ $source->name }}</option>
            @endforeach
        </select>
        <label for="floatingInput">Ресурс</label>
        @error('source_id')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="form-floating mb-3">
        <select wire:model="group_id" name="group_id"
                class="form-control @isset($group_id) is-valid @endisset
                @error('group_id') is-invalid @enderror">
            <option selected="" value="">Группа</option>
            @foreach($special_groups as $group)
                <option value="{{ $group->id }}"> {{ $group->name }}</option>
            @endforeach
        </select>
        <label for="floatingInput">Группа контакта</label>
        @error('group_id')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="form-floating mb-3">
        <select wire:model="counterparty_id" name="counterparty_id"
                class="form-control @isset($counterparty_id) is-valid @endisset
                @error('counterparty_id') is-invalid @enderror">
            <option selected="" value="">Компания</option>
            @foreach($counterpaties as $counterparty)
                <option value="{{ $counterparty->id }}"> {{ $counterparty->name }}</option>
            @endforeach
        </select>
        <label for="floatingInput">К какой компании относится</label>
        @error('counterparty_id')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="form-floating mb-3">
        <input wire:model="phone" name="phone" type="text"
               class="form-control @isset($phone) @if($phone != '') is-valid @else is-invalid @endif @endisset
               @error('phone') is-invalid @enderror"
               id="floatingInput">
        <label for="floatingInput">Номер телефона</label>
        @error('phone')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="form-floating mb-3">
        <input wire:model="email" name="email" type="email"
               class="form-control @isset($email) @if($email != '') is-valid @else is-invalid @endif @endisset
               @error('email') is-invalid @enderror"
               id="floatingInput">
        <label for="floatingInput">Почта</label>
        @error('email')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="form-floating mb-3">
        <input wire:model="telegram" name="telegram" type="text"
               class="form-control @isset($telegram) @if($telegram != '') is-valid @else is-invalid @endif @endisset
               @error('telegram') is-invalid @enderror"
               id="floatingInput">
        <label for="floatingInput">Телеграм</label>
        @error('telegram')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="form-floating mb-3">
        <input wire:model="vk_url" name="vk_url" type="text"
               class="form-control @isset($vk_url) @if($vk_url != '') is-valid @else is-invalid @endif @endisset
               @error('vk_url') is-invalid @enderror"
               id="floatingInput">
        <label for="floatingInput">Ссылка на vk</label>
        @error('vk_url')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        <button @if(session('success'))  @endif wire:click="saveContact()" type="button" class="btn btn-primary">
            Сохранить контакт
        </button>
    </div>

</div>
