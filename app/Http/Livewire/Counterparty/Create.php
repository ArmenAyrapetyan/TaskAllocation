<?php

namespace App\Http\Livewire\Counterparty;

use App\Models\Counterparty;
use App\Models\Source;
use App\Models\SpecialGroup;
use Livewire\Component;

class Create extends Component
{
    public $specialGroups;
    public $sources;
    public $name;
    public $phone;
    public $email;
    public $web_site;
    public $vk;
    public $telegram;
    public $is_manufacturer;
    public $special_group_id;
    public $source_id;

    protected $rules = [
        'name' => 'required',
        'phone' => 'required|unique:counterparties,phone',
        'email' => 'required|unique:counterparties,email',
        'web_site' => 'nullable',
        'vk' => 'nullable',
        'telegram' => 'nullable',
        'is_manufacturer' => 'required',
        'special_group_id' => 'required',
        'source_id' => 'required',
    ];

    protected $messages = [
        'name.required' => 'Вы не заполнили имя организации',
        'phone.required' => 'Введите номер телефона организации',
        'phone.unique' => 'Данный номер уже зарегистрирован',
        'email.required' => 'Заполните почту организации',
        'email.unique' => 'Почта уже зарегистрированна',
        'is_manufacturer.required' => 'Организация является производителем?',
        'special_group_id.required' => 'Выберите группу организации',
        'source_id.required' => 'Из какого источника организация',
    ];

    public function mount()
    {
        $this->specialGroups = SpecialGroup::all();
        $this->sources = Source::all();
    }

    public function createCounterparty()
    {
        Counterparty::create([
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'website_url' => $this->web_site,
            'vk_url' => $this->vk,
            'telegram' => $this->telegram,
            'is_manufacturer' => $this->is_manufacturer,
            'special_group_id' => $this->special_group_id,
            'source_id' => $this->source_id,
        ]);

        $this->dispatchBrowserEvent('closeModal');
        $this->emit('refreshCounterparty');
    }

    public function render()
    {
        return view('livewire.counterparty.create');
    }
}
