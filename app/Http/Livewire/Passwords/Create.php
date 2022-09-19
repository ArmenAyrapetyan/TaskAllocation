<?php

namespace App\Http\Livewire\Passwords;

use App\Models\Dictionary;
use App\Models\SubDictionary;
use Livewire\Component;

class Create extends Component
{
    public $dictionaries;

    public $dictionary_id;
    public $name;

    protected $rules = [
        'name' => 'required',
    ];

    protected $messages = [
        'name.required' => 'Поле :attribute должно быть заполненно',
    ];

    public function mount()
    {
        $this->dictionaries = Dictionary::select('id', 'name')->orderBy('name')->get();
    }

    public function createDictionary()
    {
        if ($this->dictionary_id > 0)
            SubDictionary::create([
                'name' => $this->name,
                'dictionary_id' => $this->dictionary_id,
            ]);
        else
            Dictionary::create([
                'name' => $this->name,
            ]);
        $this->name = null;
        $this->dictionary_id = 0;
    }

    public function render()
    {
        return view('livewire.passwords.create');
    }
}
