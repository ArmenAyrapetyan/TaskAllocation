<?php

namespace App\Http\Livewire\Staff;

use Livewire\Component;

class Index extends Component
{
    public $types = [
        'staff1',
        'staff2',
        'staff3',
        'staff4',
    ];

    public function render()
    {
        return view('livewire.staff.index');
    }
}
