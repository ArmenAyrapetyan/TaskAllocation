<?php

namespace App\Http\Livewire\Counterparty;

use App\Models\Counterparty;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $isLastSortAll;
    public $idForSort;

    protected $listeners = [
        'allCounterparties',
        'sortCounterparty',
        'refreshCounterparty'
    ];

    public function mount()
    {
        $this->allCounterparties();
    }

    public function allCounterparties()
    {
        $this->isLastSortAll = true;
        return Counterparty::paginate(10);
    }

    public function refreshCounterparty()
    {
        if ($this->isLastSortAll)
            return $this->allCounterparties();
        else
            return $this->sortCounterparty($this->idForSort);
    }

    public function sortCounterparty($id)
    {
        $this->isLastSortAll = false;
        $this->idForSort = $id;
        return Counterparty::where('special_group_id', $id)->paginate(10);
    }

    public function render()
    {
        return view('livewire.counterparty.show', [
            'counterparties' => $this->refreshCounterparty()
        ]);
    }
}
