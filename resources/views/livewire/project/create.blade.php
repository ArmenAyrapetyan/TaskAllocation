<div>
    <div class="form-floating mb-3">
        <input wire:model="name" name="name" type="text"
               class="form-control @isset($name) @if($name != '') is-valid @else is-invalid @endif @endisset
               @error('name') is-invalid @enderror"
               id="floatingInput">
        <label for="floatingInput">Имя проекта</label>
        @error('name')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="form-floating mb-3">
        <textarea wire:model="description" name="description"
                  class="form-control @isset($description) @if($description != '') is-valid @else is-invalid @endif @endisset
                  @error('description') is-invalid @enderror"
                  id="floatingInput"></textarea>
        <label for="floatingInput">Описание</label>
        @error('description')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="form-floating mb-3">
        <select wire:model="counterparty" name="counterparty"
                class="form-control @isset($counterparty) is-valid @endisset @error('counterparty') is-invalid @enderror">
            <option selected="" value="">Выберите контрагента</option>
            @foreach($counterparties as $counterparty)
                <option value="{{ $counterparty->id }}"> {{ $counterparty->name }}</option>
            @endforeach
        </select>
        <label for="floatingInput">Контрагент</label>
        @error('counterparty')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="form-floating mb-3">
        <select wire:model="group" name="group"
                class="form-control @isset($group) is-valid @endisset @error('group') is-invalid @enderror">
            <option selected="" disabled="">Выберите группу проекта</option>
            @foreach($groups as $group)
                <option value="{{ $group->id }}"> {{ $group->name }}</option>
            @endforeach
        </select>
        <label for="floatingInput">Группа проекта</label>
        @error('group')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="form-floating mb-3">
        <select wire:model="status" name="status"
                class="form-control @isset($status) is-valid @endisset @error('status') is-invalid @enderror">
            <option selected="" disabled="">Выберите статус проекта</option>
            @foreach($statuses as $status)
                <option value="{{ $status->id }}"> {{ $status->name }}</option>
            @endforeach
        </select>
        <label for="floatingInput">Статус</label>
        @error('status')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        <button @if(session('success'))  @endif wire:click="saveProject()" type="button" class="btn btn-primary">Сохранить проект</button>
    </div>
</div>
