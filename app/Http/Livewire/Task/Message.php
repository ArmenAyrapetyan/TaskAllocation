<?php

namespace App\Http\Livewire\Task;

use App\Models\Messages;
use Livewire\Component;

class Message extends Component
{
    public $task_messages;
    public $message;
    public $taskId;
    public $response;

    protected $rules = [
        'message' => 'required',
    ];

    protected $messages = [
        'message.required' => 'Заполните сообщение для его отправки',
    ];

    public function mount($id)
    {
        $this->task_messages = Messages::where('task_id', $id)->get();
        $this->response = null;
        $this->taskId = $id;
    }

    public function refreshMessages()
    {
        $this->message = 'Введите сообщение';
        $this->task_messages = Messages::where('task_id', $this->taskId)->get();
    }

    public function createMessage()
    {
        $newMessage = Messages::create([
            'text' => $this->message,
            'user_id' => auth()->user()->id,
            'task_id' => $this->taskId,
        ]);

        $this->refreshMessages();
    }

    public function render()
    {
        return view('livewire.task.message');
    }
}
