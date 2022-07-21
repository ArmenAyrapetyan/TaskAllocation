<div>
    <div class="form-floating mb-3">
        <input wire:model="name" name="name" type="text"
               class="form-control @isset($name) @if($name != '') is-valid @else is-invalid @endif @endisset
               @error('name') is-invalid @enderror"
               id="floatingInput">
        <label for="floatingInput">Имя задачи</label>
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
        <select wire:model="project_id" name="project_id"
                class="form-control @isset($project_id) is-valid @endisset @error('project_id') is-invalid @enderror">
            <option selected="" value="">Выберите проект</option>
            @foreach($projects as $project)
                <option value="{{ $project->id }}"> {{ $project->name }}</option>
            @endforeach
        </select>
        <label for="floatingInput">К какому проекту относится задача</label>
        @error('projects')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="form-floating mb-3">
        <select wire:model="status_id" name="status_id"
                class="form-control @isset($status_id) is-valid @endisset @error('status_id') is-invalid @enderror">
            <option selected="" value="">Выберите статус задачи</option>
            @foreach($statuses as $status)
                <option value="{{ $status->id }}"> {{ $status->name }}</option>
            @endforeach
        </select>
        <label for="floatingInput">Статус</label>
        @error('status_id')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="form-floating mb-3">
        <input wire:model="time_planned" name="time_planned" type="number"
               class="form-control @isset($time_planned) is-valid @endisset @error('time_planned') is-invalid @enderror"
               id="floatingInput" min="0">
        <label for="floatingInput">Сколько времени планируется затратить</label>
        @error('time_planned')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="form-floating mb-3">
        <input wire:model="time_spend" name="time_spend" type="number"
               class="form-control @isset($time_spend) is-valid @endisset @error('time_spend') is-invalid @enderror"
               id="floatingInput" min="0">
        <label for="floatingInput">Сколько времени было затрачено</label>
        @error('time_spend')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="form-floating mb-3">
        <input wire:model="date_start" name="date_start" type="date"
               class="form-control @isset($date_start) is-valid @endisset @error('date_start') is-invalid @enderror"
               id="floatingInput">
        <label for="floatingInput">Дата начала выполнения задачи</label>
        @error('date_start')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="form-floating mb-3">
        <input wire:model="date_end" name="date_end" type="date"
               class="form-control @isset($date_end) is-valid @endisset @error('date_end') is-invalid @enderror"
               id="floatingInput">
        <label for="floatingInput">Дата конца выполнения задачи</label>
        @error('date_end')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        <button @if(session('success'))  @endif wire:click="saveTask()" type="button" class="btn btn-primary">Сохранить проект</button>
    </div>
</div>
