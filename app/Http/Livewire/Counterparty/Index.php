<?php

namespace App\Http\Livewire\Counterparty;

use App\Models\SpecialGroup;
use Livewire\Component;

class Index extends Component
{
    public $specialGroups;

    public function mount()
    {
        $this->specialGroups = SpecialGroup::all();
    }

    public function allCounterparty()
    {
        $this->emit('allCounterparties');
    }

    public function sortCounterparty($id)
    {
        $this->emit('sortCounterparty', $id);
    }

    public function render()
    {
        return view('livewire.counterparty.index');
    }
}
