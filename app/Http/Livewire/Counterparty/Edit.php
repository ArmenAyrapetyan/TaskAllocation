<?php

namespace App\Http\Livewire\Counterparty;

use App\Models\Counterparty;
use App\Models\Source;
use App\Models\SpecialGroup;
use Livewire\Component;

class Edit extends Component
{
    public $counterparty_data;
    public $counterparty;
    public $specialGroups;
    public $sources;

    public function rules()
    {
        return [
            'counterparty_data.name' => 'required',
            'counterparty_data.phone' => 'required|unique:counterparties,phone,' . $this->counterparty->id . ',id',
            'counterparty_data.email' => 'required|unique:counterparties,email,' . $this->counterparty->id . ',id',
            'counterparty_data.website_url' => 'nullable',
            'counterparty_data.vk_url' => 'nullable',
            'counterparty_data.telegram' => 'nullable',
            'counterparty_data.is_manufacturer' => 'required',
            'counterparty_data.special_group_id' => 'required',
            'counterparty_data.source_id' => 'required',
        ];
    }

    protected $messages = [
        'counterparty_data.name.required' => 'Вы не заполнили имя организации',
        'counterparty_data.phone.required' => 'Введите номер телефона организации',
        'counterparty_data.email.unique' => 'Данный номер уже зарегистрирован',
        'counterparty_data.website_url.required' => 'Заполните почту организации',
        'counterparty_data.vk_url.unique' => 'Почта уже зарегистрированна',
        'counterparty_data.telegram.required' => 'Организация является производителем?',
        'counterparty_data.is_manufacturer.required' => 'Выберите группу организации',
        'counterparty_data.special_group_id.required' => 'Из какого источника организация',
    ];

    public function mount($id)
    {
        $this->specialGroups = SpecialGroup::all();
        $this->sources = Source::all();
        $this->counterparty = Counterparty::find($id);
        $this->counterparty_data = $this->counterparty->toArray();
    }

    public function editCounterparty()
    {
        $this->validate();

        $this->counterparty->fill($this->counterparty_data);
        $this->counterparty->save();

        $this->dispatchBrowserEvent('closeModal');
        $this->emit('refreshCounterpartyInfo');
    }

    public function render()
    {
        return view('livewire.counterparty.edit');
    }
}
