<?php

namespace App\Http\Livewire\Contact;

use App\Models\Contact;
use App\Models\Counterparty;
use App\Models\Source;
use App\Models\SpecialGroup;
use Livewire\Component;

class Create extends Component
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
            'counterparty_id' => $this->counterparty_id,
        ]);

        $this->clearAll();
        $this->dispatchBrowserEvent('closeModal');
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
        return view('livewire.contact.create');
    }
}
