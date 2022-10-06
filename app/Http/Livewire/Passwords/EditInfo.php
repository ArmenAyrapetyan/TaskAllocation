<?php

namespace App\Http\Livewire\Passwords;

use App\Models\ProjectAccesses;
use Livewire\Component;

class EditInfo extends Component
{
    public $info;
    public $information;

    public function mount($id)
    {
        $this->info = ProjectAccesses::find($id);
        $this->information = $this->info->information;
    }

    public function render()
    {
        return view('livewire.passwords.edit-info');
    }
}
