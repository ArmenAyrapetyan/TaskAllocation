<?php

namespace App\Http\Livewire\Staff;

use App\Jobs\DisactivateRegisterToken;
use App\Models\RegisterToken;
use Illuminate\Support\Str;
use Livewire\Component;

class Create extends Component
{
    public $token, $rate_per_hour, $responce;

    protected $rules = [
        'rate_per_hour' => 'required|numeric',
    ];

    protected $messages = [
        'rate_per_hour.required' => 'Заполните поле оплаты за час',
        'rate_per_hour.numeric' => 'Содержимое поля должно быть цифрой',
    ];

    public function mount()
    {
        $this->responce = "Токен не активирован";
        $this->token = Str::random(10);
    }

    public function activateToken()
    {
        $this->validate();

        $newToken = RegisterToken::create([
            'token' => $this->token,
            'isActive' => true,
            'rate_per_hour' => $this->rate_per_hour,
        ]);

        $this->responce = "Токен активирован";

        DisactivateRegisterToken::dispatch($newToken)->delay(now()->addMinutes(100));
    }

    public function newToken()
    {
        $this->responce = "Токен не активирован";
        $this->clear();
        $this->token = Str::random(10);
    }

    public function clear()
    {
        $this->token = null;
        $this->rate_per_hour = null;
    }

    public function render()
    {
        return view('livewire.staff.create');
    }
}
