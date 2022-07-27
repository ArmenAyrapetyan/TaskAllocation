<?php

namespace App\Http\Livewire\Contacts;

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

    public function sortContactsBy($id)
    {
        $this->emit('sortContactsByGroup', $id);
    }

    public function render()
    {
        return view('livewire.contacts.index');
    }
}
