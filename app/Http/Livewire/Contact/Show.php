<?php

namespace App\Http\Livewire\Contact;

use App\Models\Contact;
use Livewire\Component;

class Show extends Component
{
    public $contacts;
    public $isSortAll;
    public $idSort;

    protected $listeners = [
        'filterContactsByGroup',
        'getAllContacts',
        'refreshContact',
    ];

    public function mount()
    {
        $this->getAllContacts();
    }

    public function refreshContact()
    {
        $this->isSortAll
            ? $this->getAllContacts()
            : $this->sortContactsByGroup($this->idSort);
    }

    public function filterContactsByGroup($id)
    {
        $this->idSort = $id;
        $this->isSortAll = false;
        $this->contacts = Contact::where('special_group_id', $id)
            ->where('user_id', auth()->id())
            ->get();
    }

    public function deleteContact($id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        $this->refreshContact();
    }

    public function getAllContacts()
    {
        $this->isSortAll = true;
        $this->contacts = Contact::where('user_id', auth()->id())->get();
    }

    public function render()
    {
        return view('livewire.contact.show');
    }
}
