<?php

namespace App\Http\Livewire\Contact;

use App\Models\Contact;
use App\Models\Counterparty;
use App\Models\Source;
use App\Models\SpecialGroup;
use Livewire\Component;

class Edit extends Component
{
    public $first_name;
    public $last_name;
    public $post;
    public $phone;
    public $email;
    public $telegram;
    public $vk_url;
    public $source_id;
    public $group_id;
    public $counterparty_id;
    public $sources;
    public $special_groups;
    public $counterpaties;
    public $contact;

    protected $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'post' => 'nullable',
        'counterparty_id' => 'nullable',
        'source_id' => 'required',
        'group_id' => 'required',
        'phone' => 'required|integer',
        'email' => 'required|email',
    ];

    protected $messages = [
        'first_name.required' => 'Введите имя',
        'last_name.required' => 'Введите фамилию',
        'source_id.required' => 'Из какого ресурса контакт',
        'group_id.required' => 'К какой группе относится контакт',
        'phone.required' => 'Заполните номер телефона',
        'phone.integer' => 'Телефон должен содержать только цифры',
        'email.required' => 'Введите почту контакта',
        'email.email' => 'Поле почта должно быть почтой',
    ];

    public function mount($id)
    {
        $this->contact = Contact::find($id);
        $this->first_name = $this->contact->first_name;
        $this->last_name = $this->contact->last_name;
        $this->post = $this->contact->post;
        $this->phone = $this->contact->phone;
        $this->email = $this->contact->email;
        $this->telegram = $this->contact->telegram;
        $this->vk_url = $this->contact->vk_url;
        $this->source_id = $this->contact->source_id;
        $this->group_id = $this->contact->special_group_id;
        $this->counterparty_id = $this->contact->counterparty_id;
        $this->sources = Source::all();
        $this->special_groups = SpecialGroup::all();
        $this->counterpaties = Counterparty::all();
    }

    public function editContact()
    {
        $this->validate();

        if ($this->contact->first_name != $this->first_name) $this->contact->first_name = $this->first_name;
        if ($this->contact->last_name != $this->last_name) $this->contact->last_name = $this->last_name;
        if ($this->contact->post != $this->post) $this->contact->post = $this->post;
        if ($this->contact->phone != $this->phone) $this->contact->phone = $this->phone;
        if ($this->contact->email != $this->email) $this->contact->email = $this->email;
        if ($this->contact->telegram != $this->telegram) $this->contact->telegram = $this->telegram;
        if ($this->contact->vk_url != $this->vk_url) $this->contact->vk_url = $this->vk_url;
        if ($this->contact->source_id != $this->source_id) $this->contact->source_id = $this->source_id;
        if ($this->contact->special_group_id != $this->group_id) $this->contact->special_group_id = $this->group_id;
        if ($this->contact->counterparty_id != $this->counterparty_id) $this->contact->counterparty_id = $this->counterparty_id;
        $this->contact->save();

        $this->dispatchBrowserEvent('closeModal');
        $this->emit('refreshContactInfo');
    }

    public function render()
    {
        return view('livewire.contact.edit');
    }
}
