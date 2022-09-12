<?php

namespace App\Http\Livewire\Task;

use App\Models\File;
use App\Models\Messages;
use App\Models\Task;
use App\Services\FileStorage;
use App\Services\Notifications;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Message extends Component
{
    use WithFileUploads;

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $task;
    public $message;
    public $taskId;
    public $response;
    public $files;
    public bool $is_have_files;

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
        $this->files = null;
        $this->is_have_files = false;
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
        $text = $this->message ?? "Без сообщения";

        $message = Messages::create([
            'text' => $text,
            'user_id' => auth()->id(),
            'task_id' => $this->taskId,
        ]);

        if ($this->files)
            FileStorage::saveFiles($this->files, $message->id, Messages::class);

        $this->files = null;
        Notifications::sendTaskNotify(auth()->id(), $this->task->id, 'Сообщение - ' . $this->message);
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
