<div>
    <div class="mb-3 form-check form-switch d-flex justify-content-center">
        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" wire:model="is_have_files">
        <label class="form-check-label ms-1" for="flexSwitchCheckChecked">Добавить файлы в проект?</label>
    </div>

    <div class="form-floating mb-3">
        <input wire:model="project_data.name" name="project_data.name" type="text"
               class="form-control @isset($project_data['name']) @if($project_data['name'] != '') is-valid @else is-invalid @endif @endisset
               @error('project_data.name') is-invalid @enderror"
               id="floatingInput">
        <label for="floatingInput">Имя проекта</label>
        @error('project_data.name')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="form-floating mb-3">
        <textarea wire:model="project_data.description" name="project_data.description" style="height: 200px"
                  class="form-control @isset($project_data['description']) @if($project_data['description'] != '') is-valid @else is-invalid @endif @endisset
                  @error('project_data.description') is-invalid @enderror"
                  id="floatingInput">
        </textarea>
        <label for="floatingInput">Описание</label>
        @error('project_data.description')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="form-floating mb-3">
        <select wire:model="project_data.counterparty_id" name="project_data.counterparty_id"
                class="form-control @isset($project_data['counterparty_id']) is-valid @endisset @error('project_data.counterparty_id') is-invalid @enderror">
            <option selected="" value="">Выберите контрагента</option>
            @foreach($counterparties as $counterparty)
                <option value="{{ $counterparty->id }}"> {{ $counterparty->name }}</option>
            @endforeach
        </select>
        <label for="floatingInput">Контрагент</label>
        @error('project_data.counterparty_id')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="form-floating mb-3">
        <select wire:model="project_data.group_id" name="project_data.group_id"
                class="form-control @isset($project_data['group_id']) is-valid @endisset @error('project_data.group_id') is-invalid @enderror">
            <option selected="" value="">Выберите группу проекта</option>
            @foreach($groups as $group)
                <option value="{{ $group->id }}"> {{ $group->name }}</option>
            @endforeach
        </select>
        <label for="floatingInput">Группа проекта</label>
        @error('project_data.group_id')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="form-floating mb-3">
        <select wire:model="project_data.status_id" name="project_data.status_id"
                class="form-control @isset($project_data['status_id']) is-valid @endisset @error('project_data.status_id') is-invalid @enderror">
            <option selected="" value="">Выберите статус проекта</option>
            @foreach($statuses as $status)
                <option value="{{ $status->id }}"> {{ $status->name }}</option>
            @endforeach
        </select>
        <label for="floatingInput">Статус</label>
        @error('project_data.status_id')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="d-flex mb-3">
        <input class="form-control" multiple @if(!$is_have_files) disabled @endif type="file" wire:model="files">

        <div wire:loading wire:target="files" class="m-1 spinner-grow text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>

        @error('files')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        <button @if($is_have_files) wire:key="active" wire:loading.attr="disabled"  wire:target="files" @endif
            wire:click="saveProject()" type="button" class="btn btn-primary">
            Сохранить проект
        </button>
    </div>
</div>
