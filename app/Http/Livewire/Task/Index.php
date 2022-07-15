<?php

namespace App\Http\Livewire\Task;

use Livewire\Component;

class Index extends Component
{
    public $types = [
        'task1',
        'task2',
        'task3',
        'task4',
        'task5',
        'task6',
    ];

    public function render()
    {
        return view('livewire.task.index');
    }
}
