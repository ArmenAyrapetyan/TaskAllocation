<div>
    <div class="form-floating mb-3">
        <input wire:model="project_data.name" name="project_data.name" type="text" class="form-control
        @isset($project_data['name']) @if($project_data['name'] != '') is-valid @else is-invalid @endif @endisset
        @error('project_data.name') is-invalid @enderror" id="nameInput" value="{{$project_data['name']}}">
        <label for="nameInput">Имя проекта</label>
        @error('project_data.name')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="form-floating mb-3">
        <textarea wire:model="project_data.description" name="project_data.description" style="height: 200px" class="form-control
        @isset($project_data['description']) @if($project_data['description'] != '') is-valid @else is-invalid @endif @endisset
        @error('project_data.description') is-invalid @enderror" id="descInput">
            {{$project_data['description']}}
        </textarea>
        <label for="descInput">Описание</label>
        @error('project_data.description')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="form-floating mb-3">
        <select wire:model="project_data.counterparty_id" name="project_data.counterparty_id"
                class="form-control @isset($project_data['counterparty']) is-valid @endisset @error('counterparty_id') is-invalid @enderror">
            <option value="">Без контрагента</option>
            @foreach($counterparties as $counterpartyv)
                <option @if($project_data['counterparty_id'] == $counterpartyv->id) selected @endif
                value="{{ $counterpartyv->id }}"> {{ $counterpartyv->name }}</option>
            @endforeach
        </select>
        <label>Контрагент</label>
        @error('project_data.counterparty_id')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="form-floating mb-3">
        <select wire:model="project_data.group_id" name="project_data.group_id"
                class="form-control @isset($project_data['group_id']) is-valid @endisset @error('project_data.group_id') is-invalid @enderror">
            @foreach($groups as $groupv)
                <option @if($project_data['group_id'] == $groupv->id) selected @endif
                value="{{ $groupv->id }}"> {{ $groupv->name }}</option>
            @endforeach
        </select>
        <label>Группа проекта</label>
        @error('project_data.group_id')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="form-floating mb-3">
        <select wire:model="project_data.status_id" name="project_data.status_id"
                class="form-control @isset($project_data['status_id']) is-valid @endisset @error('project_data.status_id') is-invalid @enderror">
            <option value="">Выберите статус проекта</option>
            @foreach($statuses as $statusv)
                <option @if($project_data['status_id'] == $statusv->id) selected @endif
                value="{{ $statusv->id }}"> {{ $statusv->name }}</option>
            @endforeach
        </select>
        <label>Статус</label>
        @error('project_data.status_id')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="d-flex mb-3">
        <input class="form-control" multiple type="file" wire:model="files">

        <div wire:loading wire:target="files" class="m-1 spinner-grow text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>

        @error('files')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        <button wire:key="active" wire:loading.attr="disabled"  wire:target="files"
            wire:click="editProject()" type="button" class="btn btn-primary">
            Изменить
        </button>
    </div>
</div>
