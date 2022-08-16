<?php

namespace App\Http\Livewire\Notify;

use App\Models\Task;
use App\Models\User;
use Livewire\Component;

class Show extends Component
{
    public $notify;
    public $users;
    public $tasks;

    public function markAsRead($not)
    {
        $note = auth()->user()->notifications->where('id', $not['id']);
        $note->markAsRead();
        $this->getNoifyInfo();
    }

    public function getNoifyInfo()
    {
        $this->notify = auth()->user()->unreadNotifications;
        $notifyInfo = [];
        foreach ($this->notify as $not) {
            $notifyInfo['users_id'][] = $not->data['user_id'];
            $notifyInfo['task_id'][] = $not->data['task_id'];
        }
        $this->users = User::select('id', 'first_name', 'last_name')->whereIn('id', $notifyInfo['users_id'] ?? [])->get();
        $this->tasks = Task::select('id', 'name')->whereIn('id', $notifyInfo['task_id'] ?? [])->get();
    }

    public function mount()
    {
        $this->getNoifyInfo();
    }

    public function render()
    {
        return view('livewire.notify.show');
    }
}
