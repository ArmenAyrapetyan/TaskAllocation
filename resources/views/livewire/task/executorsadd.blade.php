<div class="container">
    <div class="row">
        <div class="col">
            <p>Пользователи</p>
            @foreach($users as $user)
                <div class="row m-1 border">
                    <div class="col">
                        <p class="">{{$user->full_name}}</p>
                    </div>
                    <div class="col m-1">
                        <button @if($task->creator_id == $user->id) disabled @endif class="btn"
                                wire:click="addCreator({{$user->id}})">Сделать постановщиком
                        </button>
                        <button @if(in_array($user->id, $task->audit_id) || $task->creator_id == $user->id) disabled @endif class="btn"
                                wire:click="addAudit({{$user->id}})">Сделать аудитором
                        </button>
                        <button @if(in_array($user->id, $task->executors_id) || in_array($user->id, $task->audit_id) || $task->creator_id == $user->id)
                                    disabled @endif class="btn" wire:click="addExecutor({{$user->id}})">Сделать исполнителем
                        </button>
                    </div>
                </div>
            @endforeach

            {{$users->links()}}
        </div>
        <div class="col">
            <p>Группы</p>
            @foreach($groups as $group)
                <div class="row m-1 border">
                    <div class="col">
                        <p class="">{{$group->name}}
                        </p>
                    </div>
                    <div class="col m-1">
                        <button class="btn" @if(in_array($group->id, $task->groups->pluck('id')->toArray())) disabled @endif
                                wire:click="addGroupAsExecutor({{$group->id}})">Сделать исполнителем</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="modal-footer">
        <button class="btn" wire:click="refreshEmployeeInfo">Закрыть</button>
    </div>
</div>
