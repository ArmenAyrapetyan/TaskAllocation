<div>
    <div class="row m-0">
        <div class="col-md-3 border-primary border rounded m-2 p-2">
            <div class="list-group">
                <p>Новые задачи</p>
                @foreach($new_tasks as $ntask)
                <a href="{{route('task.detail', $ntask->id)}}" class="list-group-item list-group-item-action">{{$ntask->name . ' - ' . $ntask->status->name}}</a>
                @endforeach
            </div>
        </div>
        <div class="col-md-3 border-primary border rounded m-2 p-2">
            <div class="list-group">
                <p>Мои активные задачи</p>
                @foreach($active_tasks as $task)
                    <a href="{{route('task.detail', $task->id)}}" class="list-group-item list-group-item-action">{{$task->name . ' - ' . $task->status->name}}</a>
                @endforeach
            </div>
        </div>
        <div class="col-md-3 border-primary border rounded m-2 p-2">
            <div class="list-group">
                <p>Я аудирую</p>
                @foreach($audit_tasks as $atask)
                    <a href="{{route('task.detail', $atask->id)}}" class="list-group-item list-group-item-action">{{$atask->name . ' - ' . $atask->status->name}}</a>
                @endforeach
            </div>
        </div>
    </div>
</div>
