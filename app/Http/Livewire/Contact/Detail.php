<?php

namespace App\Http\Livewire\Contact;

use App\Models\Contact;
use Livewire\Component;

class Detail extends Component
{
    public $contact;
    public $contact_id;

    protected $listeners = [
      'refreshContactInfo'
    ];

    public function mount($id)
    {
        $this->contact_id = $id;
        $this->refreshContactInfo();
    }

    public function refreshContactInfo()
    {
        $this->contact = Contact::find($this->contact_id);
    }

    public function render()
    {
        return view('livewire.contact.detail');
    }
}
