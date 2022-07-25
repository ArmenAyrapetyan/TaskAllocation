<?php

namespace App\Http\Livewire\Task;

use App\Models\Messages;
use Livewire\Component;

class Message extends Component
{
    public $message;

    protected $rules = [
      'message' => 'required',
    ];

    protected $messages = [
        'message.required' => 'Заполните сообщение для его отправки',
    ];

    public function createMessage()
    {
        dd($this->message);
//        Messages::create([
//
//        ]);
    }

    public function render()
    {
        return view('livewire.task.message');
    }
}
