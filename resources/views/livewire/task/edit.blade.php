<div>
    <div class="form-floating mb-3">
        <input wire:model="task_data.name" name="task_data.name" type="text"
               class="form-control @isset($task_data['name']) @if($task_data['name'] != '') is-valid @else is-invalid @endif @endisset
               @error('task_data.name') is-invalid @enderror" id="taskName">
        <label for="taskName">Имя задачи</label>
        @error('task_data.name')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="form-floating mb-3">
        <textarea wire:model="task_data.description" name="task_data.description" style="height: 200px"
                  class="form-control @isset($task_data['description']) @if($task_data['description'] != '') is-valid @else is-invalid @endif @endisset
                  @error('task_data.description') is-invalid @enderror" id="taskDeck"></textarea>
        <label for="taskDeck">Описание</label>
        @error('task_data.description')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="form-floating mb-3">
        <select wire:model="task_data.project_id" name="task_data.project_id"
                class="form-control @isset($task_data['project_id']) is-valid @endisset @error('task_data.project_id') is-invalid @enderror">
            <option selected="" value="">Выберите проект</option>
            @foreach($projects as $project)
                <option @if($task_data['project_id'] == $project->id) selected @endif
                    value="{{ $project->id }}"> {{ $project->name }}</option>
            @endforeach
        </select>
        <label>К какому проекту относится задача</label>
        @error('task_data.projects')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="form-floating mb-3">
        <select wire:model="task_data.status_id" name="task_data.status_id"
                class="form-control @isset($task_data['status_id']) is-valid @endisset @error('task_data.status_id') is-invalid @enderror">
            <option selected="" value="">Выберите статус задачи</option>
            @foreach($statuses as $status)
                <option @if($task_data['status_id'] == $status->id) selected @endif
                    value="{{ $status->id }}"> {{ $status->name }}</option>
            @endforeach
        </select>
        <label>Статус</label>
        @error('task_data.status_id')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="form-floating mb-3">
        <input wire:model="task_data.time_planned" name="task_data.time_planned" type="number"
               class="form-control @isset($task_data['time_planned']) is-valid @endisset @error('task_data.time_planned') is-invalid @enderror"
               id="taskPlan" min="0">
        <label for="taskPlan">Сколько времени планируется затратить</label>
        @error('task_data.time_planned')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="form-floating mb-3">
        <input wire:model="task_data.date_start" name="task_data.date_start" type="date"
               class="form-control @isset($task_data['date_start']) is-valid @endisset @error('task_data.date_start') is-invalid @enderror"
               id="taskStart">
        <label for="taskStart">Дата начала выполнения задачи</label>
        @error('task_data.date_start')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="form-floating mb-3">
        <input wire:model="task_data.date_end" name="task_data.date_end" type="date"
               class="form-control @isset($task_data['date_end']) is-valid @endisset @error('task_data.date_end') is-invalid @enderror"
               id="taskEnd">
        <label for="taskEnd">Дата конца выполнения задачи</label>
        @error('task_data.date_end')
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
            @if(session('success'))  @endif wire:click="editTask()" type="button" class="btn btn-primary">Сохранить задачу</button>
    </div>
</div>
