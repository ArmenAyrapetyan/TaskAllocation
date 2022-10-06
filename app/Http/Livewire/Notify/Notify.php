<?php

namespace App\Http\Livewire\Notify;

use Livewire\Component;

class Notify extends Component
{
    public $user;
    public $notifications;

    public function mount()
    {
        $this->user = auth()->user();
        $this->notifications = $this->user->unreadNotifications;
    }

    protected $listeners = [
        'getNotify'
    ];

    public function getNotify()
    {
        $this->notifications = $this->user->unreadNotifications;
        foreach ($this->user->unreadNotifications as $notification){
            $this->dispatchBrowserEvent('sendNotify', $notification->data['message'] . 'В задаче' . $notification->data['task_name']);
        }
    }

    public function readNotify($not)
    {
        $note = $this->user->notifications->where('id', $not['id']);
        $note->markAsRead();
    }

    public function render()
    {
        return view('livewire.notify.notify');
    }
}
