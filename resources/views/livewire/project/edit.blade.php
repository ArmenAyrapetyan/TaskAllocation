<div>
    <div class="form-floating mb-3">
        <input wire:model="name" name="name" type="text" class="form-control
        @isset($name) @if($name != '') is-valid @else is-invalid @endif @endisset
        @error('name') is-invalid @enderror" id="nameInput" value="{{$name}}">
        <label for="nameInput">Имя проекта</label>
        @error('name')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="form-floating mb-3">
        <textarea wire:model="description" name="description" style="height: 200px" class="form-control
        @isset($description) @if($description != '') is-valid @else is-invalid @endif @endisset
        @error('description') is-invalid @enderror" id="descInput">
            {{$description}}
        </textarea>
        <label for="descInput">Описание</label>
        @error('description')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="form-floating mb-3">
        <select wire:model="counterparty" name="counterparty"
                class="form-control @isset($counterparty) is-valid @endisset @error('counterparty') is-invalid @enderror">
            <option value="">Без контрагента</option>
            @foreach($counterparties as $counterpartyv)
                <option @if($counterparty == $counterpartyv->id) selected @endif
                value="{{ $counterpartyv->id }}"> {{ $counterpartyv->name }}</option>
            @endforeach
        </select>
        <label>Контрагент</label>
        @error('counterparty')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="form-floating mb-3">
        <select wire:model="group" name="group"
                class="form-control @isset($group) is-valid @endisset @error('group') is-invalid @enderror">
            @foreach($groups as $groupv)
                <option @if($group == $groupv->id) selected @endif
                value="{{ $groupv->id }}"> {{ $groupv->name }}</option>
            @endforeach
        </select>
        <label>Группа проекта</label>
        @error('group')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="form-floating mb-3">
        <select wire:model="status" name="status"
                class="form-control @isset($status) is-valid @endisset @error('status') is-invalid @enderror">
            <option value="">Выберите статус проекта</option>
            @foreach($statuses as $statusv)
                <option @if($status == $statusv->id) selected @endif
                value="{{ $statusv->id }}"> {{ $statusv->name }}</option>
            @endforeach
        </select>
        <label>Статус</label>
        @error('status')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        <button wire:click="editProject()" type="button" class="btn btn-primary">
            Изменить
        </button>
    </div>
</div>
