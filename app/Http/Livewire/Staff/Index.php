<?php

namespace App\Http\Livewire\Staff;

use App\Models\Group;
use Livewire\Component;

class Index extends Component
{
    public $staffGroup;
    public $test;

    public function mount()
    {
        $this->staffGroup = Group::all();
    }

    public function getNewStaff()
    {
        $this->emit('getNewStaff');
    }

    public function getAllStaff()
    {
        $this->emit('getAllStaff');
    }

    public function getGroupStaff($id)
    {
        $this->emit('getGroupStaff', $id);
    }

    public function render()
    {
        return view('livewire.staff.index');
    }
}
