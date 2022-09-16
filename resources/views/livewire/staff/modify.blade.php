<div>
    <div class="form-floating mb-3">
        <input wire:model="staff_data.first_name" name="staff_data.first_name" type="text"
               class="form-control @isset($staff_data['first_name']) @if($staff_data['first_name'] != '') is-valid @else is-invalid @endif @endisset
               @error('staff_data.first_name') is-invalid @enderror"
               id="floatingInput">
        <label for="floatingInput">Имя</label>
        @error('staff_data.first_name')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="form-floating mb-3">
        <input wire:model="staff_data.last_name" name="staff_data.last_name" type="text"
               class="form-control @isset($staff_data['last_name']) @if($staff_data['last_name'] != '') is-valid @else is-invalid @endif @endisset
               @error('staff_data.last_name') is-invalid @enderror"
               id="floatingInput">
        <label for="floatingInput">Фамилия</label>
        @error('staff_data.last_name')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="form-floating mb-3">
        <input wire:model="staff_data.third_name" name="staff_data.third_name" type="text"
               class="form-control @isset($staff_data['third_name']) @if($staff_data['third_name'] != '') is-valid @else is-invalid @endif @endisset
               @error('staff_data.third_name') is-invalid @enderror"
               id="floatingInput">
        <label for="floatingInput">Отчество</label>
        @error('staff_data.third_name')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="form-floating mb-3">
        <input wire:model="staff_data.telegram" name="staff_data.telegram" type="text"
               class="form-control @isset($staff_data['telegram']) @if($staff_data['telegram'] != '') is-valid @else is-invalid @endif @endisset
               @error('staff_data.telegram') is-invalid @enderror"
               id="floatingInput">
        <label for="floatingInput">Телеграм</label>
        @error('staff_data.telegram')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="form-floating mb-3">
        <input wire:model="staff_data.vk_url" name="staff_data.vk_url" type="text"
               class="form-control @isset($staff_data['vk_url']) @if($staff_data['vk_url'] != '') is-valid @else is-invalid @endif @endisset
               @error('staff_data.vk_url') is-invalid @enderror"
               id="floatingInput">
        <label for="floatingInput">Вконтакте</label>
        @error('staff_data.vk_url')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="form-floating mb-3">
        <input wire:model="staff_data.phone" name="staff_data.phone" type="text"
               class="form-control @isset($staff_data['phone']) @if($staff_data['phone'] != '') is-valid @else is-invalid @endif @endisset
               @error('staff_data.phone') is-invalid @enderror"
               id="floatingInput">
        <label for="floatingInput">Телефон</label>
        @error('staff_data.phone')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="form-floating mb-3">
        <input wire:model="staff_data.email" name="staff_data.email" type="text"
               class="form-control @isset($staff_data['email']) @if($staff_data['email'] != '') is-valid @else is-invalid @endif @endisset
               @error('staff_data.email') is-invalid @enderror"
               id="floatingInput">
        <label for="floatingInput">Почта</label>
        @error('staff_data.email')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="modal-footer">
        <button class="btn btn-primary" wire:click="editProfile">Изменить</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
    </div>
</div>
