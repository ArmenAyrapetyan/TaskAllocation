<?php

namespace App\Http\Livewire\Task;

use App\Models\Messages;
use App\Models\Task;
use Livewire\Component;
use Livewire\WithPagination;

class Message extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $task;
    public $message;
    public $taskId;
    public $response;

    protected $rules = [
        'message' => 'required',
    ];

    protected $messages = [
        'message.required' => 'Заполните сообщение для его отправки',
    ];

    protected $listeners = [
        'refreshMessages',
    ];

    public function mount($id)
    {
        $this->task = Task::find($id);
        $this->response = null;
        $this->taskId = $id;
    }

    public function refreshMessages()
    {
        return Messages::where('task_id', $this->taskId)
            ->orderBy('created_at', 'desc')
            ->paginate(3);
    }

    public function createMessage()
    {
        Messages::create([
            'text' => $this->message,
            'user_id' => auth()->user()->id,
            'task_id' => $this->taskId,
        ]);
        $this->message = null;
        $this->refreshMessages();
    }

    public function render()
    {
        return view('livewire.task.message', [
            'task_messages' => $this->refreshMessages()
        ]);
    }
}
