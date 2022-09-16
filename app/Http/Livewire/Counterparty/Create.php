<?php

namespace App\Http\Livewire\Counterparty;

use App\Models\Counterparty;
use App\Models\Source;
use App\Models\SpecialGroup;
use Livewire\Component;

class Create extends Component
{
    public $counterparty_data;
    public $specialGroups;
    public $sources;

    protected $rules = [
        'counterparty_data.name' => 'required',
        'counterparty_data.phone' => 'required|unique:counterparties,phone',
        'counterparty_data.email' => 'required|unique:counterparties,email',
        'counterparty_data.website_url' => 'nullable',
        'counterparty_data.vk_url' => 'nullable',
        'counterparty_data.telegram' => 'nullable',
        'counterparty_data.is_manufacturer' => 'required',
        'counterparty_data.special_group_id' => 'required',
        'counterparty_data.source_id' => 'required',
    ];

    protected $messages = [
        'counterparty_data.name.required' => 'Вы не заполнили имя организации',
        'counterparty_data.phone.required' => 'Введите номер телефона организации',
        'counterparty_data.phone.unique' => 'Данный номер уже зарегистрирован',
        'counterparty_data.email.required' => 'Заполните почту организации',
        'counterparty_data.email.unique' => 'Почта уже зарегистрированна',
        'counterparty_data.is_manufacturer.required' => 'Организация является производителем?',
        'counterparty_data.special_group_id.required' => 'Выберите группу организации',
        'counterparty_data.source_id.required' => 'Из какого источника организация',
    ];

    public function mount()
    {
        $this->specialGroups = SpecialGroup::all();
        $this->sources = Source::all();
    }

    public function createCounterparty()
    {
        Counterparty::create($this->counterparty_data);
        $this->counterparty_data = null;
        $this->dispatchBrowserEvent('closeModal');
        $this->emit('refreshCounterparty');
    }

    public function render()
    {
        return view('livewire.counterparty.create');
    }
}
