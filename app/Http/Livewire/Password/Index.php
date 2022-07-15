<?php

namespace App\Http\Livewire\Password;

use Livewire\Component;

class Index extends Component
{
    public $types = [
      'pass1',
      'pass2',
      'pass3',
      'pass4',
    ];

    public function render()
    {
        return view('livewire.password.index');
    }
}
