<div>
    <p>Группы сотрудника</p>
    @foreach($groups as $group)
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" @if(in_array($group->id, $employee_groups)) checked @endif
                   wire:click="editEmployeeGroups({{$group->id}})">
            <label class="form-check-label" for="exampleCheck1">{{$group->name}}</label>
        </div>
    @endforeach

    <div class="modal-footer">
        <button class="btn" wire:click="refreshEmployeeInfo">Закрыть</button>
    </div>

</div>
