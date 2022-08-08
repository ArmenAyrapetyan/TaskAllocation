<?php

namespace App\Http\Livewire\Counterparty;

use App\Models\Counterparty;
use App\Models\Source;
use App\Models\SpecialGroup;
use Livewire\Component;

class Edit extends Component
{
    public $counterparty;
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

    public function mount($id)
    {
        $this->specialGroups = SpecialGroup::all();
        $this->sources = Source::all();
        $this->counterparty = Counterparty::find($id);
        $this->name = $this->counterparty->name;
        $this->phone = $this->counterparty->phone;
        $this->email = $this->counterparty->email;
        $this->web_site = $this->counterparty->website_url;
        $this->vk = $this->counterparty->vk_url;
        $this->telegram = $this->counterparty->telegram;
        $this->is_manufacturer = $this->counterparty->is_manufacturer;
        $this->special_group_id = $this->counterparty->special_group_id;
        $this->source_id = $this->counterparty->source_id;
    }

    public function editCounterparty()
    {
        if ($this->counterparty->name != $this->name) $this->counterparty->name = $this->name;
        if ($this->counterparty->phone != $this->phone) $this->counterparty->phone = $this->phone;
        if ($this->counterparty->email != $this->email) $this->counterparty->email = $this->email;
        if ($this->counterparty->website_url != $this->web_site) $this->counterparty->website_url = $this->web_site;
        if ($this->counterparty->vk_url != $this->vk) $this->counterparty->vk_url = $this->vk;
        if ($this->counterparty->telegram != $this->telegram) $this->counterparty->telegram = $this->telegram;
        if ($this->counterparty->is_manufacturer != $this->is_manufacturer) $this->counterparty->is_manufacturer = $this->is_manufacturer;
        if ($this->counterparty->special_group_id != $this->special_group_id) $this->counterparty->special_group_id = $this->special_group_id;
        if ($this->counterparty->source_id != $this->source_id) $this->counterparty->source_id = $this->source_id;
        $this->counterparty->save();

        $this->dispatchBrowserEvent('closeModal');
        $this->emit('refreshCounterpartyInfo');
    }

    public function render()
    {
        return view('livewire.counterparty.edit');
    }
}
