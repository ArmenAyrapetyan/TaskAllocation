<?php

namespace App\Http\Livewire\Report;

use Livewire\Component;

class Index extends Component
{
    public $types = [
        'report1',
        'report2',
        'report3',
        'report4',
    ];

    public function render()
    {
        return view('livewire.report.index');
    }
}
