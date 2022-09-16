<?php

namespace App\Http\Livewire\Passwords;

use App\Models\Dictionary;
use Livewire\Component;

class Index extends Component
{
    public $dictionaries;

    public function mount()
    {
        $this->dictionaries = Dictionary::all();
    }

    public function render()
    {
        return view('livewire.passwords.index');
    }
}
