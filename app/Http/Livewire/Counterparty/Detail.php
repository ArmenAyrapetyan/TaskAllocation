<?php

namespace App\Http\Livewire\Counterparty;

use App\Models\Counterparty;
use Livewire\Component;

class Detail extends Component
{
    public $counterparty;
    public $counterparty_id;

    protected $listeners = [
      'refreshCounterpartyInfo'
    ];

    public function mount($id)
    {
        $this->counterparty_id = $id;
        $this->refreshCounterpartyInfo();
    }

    public function refreshCounterpartyInfo()
    {
        $this->counterparty = Counterparty::find($this->counterparty_id);
    }

    public function render()
    {
        return view('livewire.counterparty.detail');
    }
}
