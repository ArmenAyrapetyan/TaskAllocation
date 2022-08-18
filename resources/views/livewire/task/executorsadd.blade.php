<div>
    <p>Пользователи</p>
    @foreach($users as $user)
        <div class="mb-3 form-check">
            <input type="checkbox" @if($task->isUserInTask($user->id)) checked @endif
            class="form-check-input" wire:click="exectAddOrDel({{$user->id}})">
            <label class="form-check-label" for="exampleCheck1">{{$user->full_name}}</label>
        </div>
    @endforeach

    <div class="modal-footer">
        <button class="btn" wire:click="refreshEmployeeInfo">Закрыть</button>
    </div>
</div>
