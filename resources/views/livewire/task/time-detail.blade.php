<div>
    <div class="d-flex">
        <p class="ms-auto me-auto text-success">{{$result}}</p>
    </div>
    <div class="row g-3 border border-1 border-primary rounded m-1">
        <div class="col">
            <label for="validationServer01" class="form-label">Задача:
                <a href="{{route('task.detail', $time->userAccess->accessable_id)}}">
                    {{$task_name}}</a>. Сообщение:</label>
            <input type="text" class="form-control" wire:model="message">
        </div>
        <div class="col">
            <label class="form-label">Трекнутое время</label>
            <input type="text" class="form-control" wire:model="time_input">
            <button class="m-1 float-end btn btn-primary" wire:click="editTime">Изменить</button>
        </div>
    </div>
</div>
