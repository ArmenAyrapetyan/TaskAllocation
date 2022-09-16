<?php

namespace App\Http\Livewire\Contact;

use App\Models\SpecialGroup;
use Livewire\Component;

class Index extends Component
{
    public $contactsGroup;

    public function mount()
    {
        $this->contactsGroup = SpecialGroup::all();
    }

    public function getAllContacts()
    {
        $this->emit('getAllContacts');
    }

    public function filterContactsByGroup($id)
    {
        $this->emit('filterContactsByGroup', $id);
    }

    public function render()
    {
        return view('livewire.contact.index');
    }
}
