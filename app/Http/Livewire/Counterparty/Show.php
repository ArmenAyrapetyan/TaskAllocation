<?php

namespace App\Http\Livewire\Counterparty;

use App\Models\Counterparty;
use Livewire\Component;

class Show extends Component
{
    public $counterparties;
    public $isLastSortAll;
    public $idForSort;

    protected $listeners = [
        'allCounterparties',
        'sortCounterparty',
        'refreshCounterparty'
    ];

    public function mount()
    {
        $this->isLastSortAll = true;
        $this->counterparties = Counterparty::all();
    }

    public function allCounterparties()
    {
        $this->isLastSortAll = true;
        $this->counterparties = Counterparty::all();
    }

    public function refreshCounterparty()
    {
        $this->isLastSortAll
            ? $this->allCounterparties()
            : $this->sortCounterparty($this->idForSort);
    }

    public function sortCounterparty($id)
    {
        $this->isLastSortAll = false;
        $this->idForSort = $id;
        $this->counterparties = Counterparty::where('special_group_id', $id)->get();
    }

    public function render()
    {
        return view('livewire.counterparty.show');
    }
}
