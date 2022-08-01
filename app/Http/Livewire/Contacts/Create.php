<?php

namespace App\Http\Livewire\Contacts;

use App\Models\Contact;
use App\Models\Counterparty;
use App\Models\CounterpartyContact;
use App\Models\Source;
use App\Models\SpecialGroup;
use Livewire\Component;

class Create extends Component
{
    public $first_name, $last_name, $post, $phone, $email, $telegram, $vk_url, $source_id, $group_id, $counterparty_id;
    public $sources, $special_groups, $counterpaties;

    protected $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'post' => 'nullable',
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

    public function mount()
    {
        $this->sources = Source::all();
        $this->special_groups = SpecialGroup::all();
        $this->counterpaties = Counterparty::all();
    }

    public function saveContact()
    {
        $this->validate();

        $newContact = Contact::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'post' => $this->post,
            'source_id' => $this->source_id,
            'special_group_id' => $this->group_id,
            'user_id' => auth()->user()->id,
            'phone' => $this->phone,
            'email' => $this->email,
            'telegram' => $this->telegram,
            'vk_url' => $this->vk_url,
        ]);

        if ($this->counterparty_id && $newContact)
            CounterpartyContact::create([
                'contact_id' => $newContact->id,
                'counterparty_id' => $this->counterparty_id,
            ]);

        $this->clearAll();
        $this->dispatchBrowserEvent('closeContactCreate');
        $this->emit('refreshContact');
    }

    public function clearAll()
    {
        $this->first_name = null;
        $this->last_name = null;
        $this->post = null;
        $this->source_id = null;
        $this->group_id = null;
        $this->phone = null;
        $this->email = null;
        $this->telegram = null;
        $this->vk_url = null;
    }

    public function render()
    {
        return view('livewire.contacts.create');
    }
}
