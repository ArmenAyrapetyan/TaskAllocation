<div>
    <p class="mb-1">Создание словаря</p>
    <div class="form-check form-switch">
        Словарь к задаче или проекту
        <input wire:model="is_task" class="form-check-input @error('$is_task') is-invalid @enderror" type="checkbox">
    </div>
    @if($is_task)
        <p class="mb-0">Выбор задачи</p>
        <select wire:model="object_id" class="form-select @error('object_id') is-invalid @enderror">
            <option value="null">Выберите задачу</option>
            @foreach($tasks as $task)
                <option value="{{$task->id}}">{{$task->name}}</option>
            @endforeach
        </select>
    @else
        <p class="mt-1 mb-0">Выбор проекта</p>
        <select wire:model="object_id" class="form-select @error('object_id') is-invalid @enderror">
            <option value="null">Выберите проект</option>
            @foreach($projects as $project)
                <option value="{{$project->id}}">{{$project->name}}</option>
            @endforeach
        </select>
    @endif
    <div class="form-check form-switch">
        Добавить в папку или подпапку
        <input wire:model="is_dictionary" class="form-check-input" type="checkbox">
    </div>
    @if($is_dictionary)
        <p class="mb-0">Выбор папки</p>
        <select wire:model="dict_id" class="form-select @error('dict_id') is-invalid @enderror">
            <option value="null">Выберите папку</option>
            @foreach($dictionaries as $dictionary)
                <option value="{{$dictionary->id}}">{{$dictionary->name}}</option>
            @endforeach
        </select>
    @else
        <p class="mt-1 mb-0">Выбор подпапки</p>
        <select wire:model="dict_id" class="form-select @error('dict_id') is-invalid @enderror">
            <option value="null">Выберите подпапку</option>
            @foreach($subdictionaries as $subdictionary)
                <option value="{{$subdictionary->id}}">{{$subdictionary->name}}</option>
            @endforeach
        </select>
    @endif
    <p class="mt-1 mb-0">Информация</p>
    <textarea style="height: 350px" wire:model="information" class="form-control @error('information') is-invalid @enderror">
    </textarea>

    <input wire:model="files" type="file" multiple class="form-control mt-1
    @if($files) @error('information') is-invalid @enderror @endif">

    <div class="d-flex justify-content-end">
        <button wire:key="active" wire:loading.attr="disabled" wire:target="files"
                class="btn btn-primary mt-2" wire:click="createInformation()">Создать словарь информации
        </button>
    </div>
</div>
