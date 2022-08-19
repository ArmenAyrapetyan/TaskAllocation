<?php

namespace App\Http\Livewire\Contact;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

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
        if ($this->isSortAll)
            return $this->getAllContacts();
        else
            return $this->sortContactsByGroup($this->idSort);
    }

    public function filterContactsByGroup($id)
    {
        $this->idSort = $id;
        $this->isSortAll = false;
        return Contact::where('special_group_id', $id)
            ->where('user_id', auth()->id())
            ->paginate(10);
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
        return Contact::where('user_id', auth()->id())->paginate(10);
    }

    public function render()
    {
        return view('livewire.contact.show', [
            'contacts' => $this->refreshContact()
        ]);
    }
}
