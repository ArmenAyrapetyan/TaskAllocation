<?php

namespace App\Http\Livewire\Staff;

use App\Models\Group;
use App\Models\User;
use Livewire\Component;

class Show extends Component
{
    public $staff;

    public function mount()
    {
        $this->staff = User::all();
    }

    protected $listeners = [
      'getAllStaff',
      'getGroupStaff',
    ];

    public function getAllStaff()
    {
        $this->staff = User::all();
    }

    public function getGroupStaff($id)
    {
        $group = Group::find($id);
        $this->staff = $group->users;
    }

    public function render()
    {
        return view('livewire.staff.show');
    }
}
