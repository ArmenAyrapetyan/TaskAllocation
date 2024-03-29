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

    public function booted()
    {
        $this->resetPage();
    }

    public function mount()
    {
        $this->getAllContacts();
    }

    public function refreshContact()
    {
        if ($this->isSortAll)
            return $this->getAllContacts();
        else
            return $this->filterContactsByGroup($this->idSort);
    }

    public function filterContactsByGroup($id)
    {
        $this->idSort = $id;
        $this->isSortAll = false;
        return Contact::where('special_group_id', $id)
            ->orderBy('first_name')
            ->paginate(10);
    }

    public function getAllContacts()
    {
        $this->isSortAll = true;
        return Contact::orderBy('first_name')
            ->paginate(10);
    }

    public function render()
    {
        return view('livewire.contact.show', [
            'contacts' => $this->refreshContact()
        ]);
    }
}
