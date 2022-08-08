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
        <input wire:model="third_name" name="third_name" type="text"
               class="form-control @isset($third_name) @if($third_name != '') is-valid @else is-invalid @endif @endisset
               @error('third_name') is-invalid @enderror"
               id="floatingInput">
        <label for="floatingInput">Отчество</label>
        @error('third_name')
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
        <label for="floatingInput">Вконтакте</label>
        @error('vk_url')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="form-floating mb-3">
        <input wire:model="phone" name="phone" type="text"
               class="form-control @isset($phone) @if($phone != '') is-valid @else is-invalid @endif @endisset
               @error('phone') is-invalid @enderror"
               id="floatingInput">
        <label for="floatingInput">Телефон</label>
        @error('phone')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="form-floating mb-3">
        <input wire:model="email" name="email" type="text"
               class="form-control @isset($email) @if($email != '') is-valid @else is-invalid @endif @endisset
               @error('email') is-invalid @enderror"
               id="floatingInput">
        <label for="floatingInput">Почта</label>
        @error('email')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="modal-footer">
        <button class="btn btn-primary" wire:click="editProfile">Изменить</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
    </div>
</div>
