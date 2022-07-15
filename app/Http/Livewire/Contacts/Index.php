<?php

namespace App\Http\Livewire\Contacts;

use Livewire\Component;

class Index extends Component
{
    public $types = [
        'contact1',
        'contact2',
        'contact3',
        'contact4',
    ];

    public function render()
    {
        return view('livewire.contacts.index');
    }
}
