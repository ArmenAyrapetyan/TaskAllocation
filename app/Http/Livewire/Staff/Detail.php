<?php

namespace App\Http\Livewire\Staff;

use App\Models\User;
use Livewire\Component;

class Detail extends Component
{
    public $employee;
    public $employee_id;

    protected $listeners = [
        'refreshEmployeeInfo'
    ];

    public function mount($id)
    {
        $this->employee_id = $id;
        $this->employee = User::find($id);
    }

    public function refreshEmployeeInfo()
    {
        $this->employee = User::find($this->employee_id);
    }

    public function render()
    {
        return view('livewire.staff.detail');
    }
}
