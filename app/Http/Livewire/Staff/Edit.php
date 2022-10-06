<?php

namespace App\Http\Livewire\Staff;

use App\Models\Group;
use App\Models\User;
use App\Models\UserGroup;
use Livewire\Component;

class Edit extends Component
{
    public $groups;
    public $employee;
    public $employee_groups = [];

    public function mount($id)
    {
        $this->groups = Group::all();
        $this->employee = User::find($id);
        foreach ($this->employee->groups as $group) {
            $this->employee_groups[] = $group->id;
        }
    }

    public function refreshEmployeeInfo()
    {
        $this->dispatchBrowserEvent('closeModal');
        $this->emit('refreshEmployeeInfo');
    }

    public function editEmployeeGroups($group_id)
    {
        $addGroup = true;
        foreach ($this->employee->groups as $group){
            if ($group->id == $group_id){
                UserGroup::where('user_id', $this->employee->id)
                    ->where('group_id', $group_id)
                    ->delete();
                $addGroup = false;
            }
        }
        if ($addGroup){
            UserGroup::create([
                'user_id' => $this->employee->id,
                'group_id' => $group_id
            ]);
        }
    }

    public function render()
    {
        return view('livewire.staff.edit');
    }
}
