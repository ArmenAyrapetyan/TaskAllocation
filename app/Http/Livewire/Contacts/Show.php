<?php

namespace App\Http\Livewire\Contacts;

use App\Models\Contact;
use Livewire\Component;

class Show extends Component
{
    public $contacts;

    protected $listeners = [
      'sortContactsByGroup',
      'getAllContacts',
    ];

    public function mount()
    {
        $this->contacts = Contact::where('user_id', auth()->user()->id)->get();
    }

    public function sortContactsByGroup($id)
    {
        $this->contacts = Contact::where('special_group_id', $id)
            ->where('user_id', auth()->user()->id)
            ->get();
    }

    public function getAllContacts()
    {
        $this->contacts = Contact::where('user_id', auth()->user()->id)->get();
    }

    public function render()
    {
        return view('livewire.contacts.show');
    }
}
