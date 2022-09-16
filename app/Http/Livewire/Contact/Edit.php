<?php

namespace App\Http\Livewire\Contact;

use App\Models\Contact;
use App\Models\Counterparty;
use App\Models\Source;
use App\Models\SpecialGroup;
use Livewire\Component;

class Edit extends Component
{
    public $contact_data;
    public $sources;
    public $special_groups;
    public $counterpaties;
    public $contact;

    protected $rules = [
        'contact_data.first_name' => 'required',
        'contact_data.last_name' => 'required',
        'contact_data.post' => 'nullable',
        'contact_data.counterparty_id' => 'nullable',
        'contact_data.source_id' => 'required',
        'contact_data.special_group_id' => 'required',
        'contact_data.phone' => 'required|integer',
        'contact_data.email' => 'required|email',
    ];

    protected $messages = [
        'contact_data.first_name.required' => 'Введите имя',
        'contact_data.last_name.required' => 'Введите фамилию',
        'contact_data.source_id.required' => 'Из какого ресурса контакт',
        'contact_data.special_group_id.required' => 'К какой группе относится контакт',
        'contact_data.phone.required' => 'Заполните номер телефона',
        'contact_data.phone.integer' => 'Телефон должен содержать только цифры',
        'contact_data.email.required' => 'Введите почту контакта',
        'contact_data.email.email' => 'Поле почта должно быть почтой',
    ];

    public function mount($id)
    {
        $this->contact = Contact::find($id);
        $this->contact_data = $this->contact->toArray();
        $this->sources = Source::all();
        $this->special_groups = SpecialGroup::all();
        $this->counterpaties = Counterparty::all();
    }

    public function editContact()
    {
        $this->validate();

        $this->contact->fill($this->contact_data);
        $this->contact->save();

        $this->dispatchBrowserEvent('closeModal');
        $this->emit('refreshContactInfo');
    }

    public function render()
    {
        return view('livewire.contact.edit');
    }
}
