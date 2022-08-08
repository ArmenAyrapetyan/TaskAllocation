<?php

namespace App\Http\Livewire\Staff;

use App\Models\Group;
use App\Models\User;
use Livewire\Component;
use function PHPUnit\Framework\isEmpty;

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
        'getNewStaff',
    ];

    public function getNewStaff()
    {
        $users = User::all();
        foreach ($users as $key => $user){
            if (count($user->groups) != 0){
                $users->forget($key);
            }
        }
        $this->staff = $users;
    }

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
