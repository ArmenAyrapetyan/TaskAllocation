<?php

namespace App\Http\Livewire\Notify;

use Livewire\Component;

class Index extends Component
{
    public $types = [
        'all',
        'unread',
        'other',
    ];

    public function render()
    {
        return view('livewire.notify.index');
    }
}
