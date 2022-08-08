<?php

namespace App\Http\Livewire\Staff;

use App\Models\User;
use App\Services\FileStorage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;

    public $user;
    public $user_id;
    public $avatar;

    protected $listeners = [
        'refreshProfileInfo'
    ];

    public function mount($id)
    {
        $this->user_id = $id;
        $this->user = User::find($id);
    }

    protected $rules = [
        'avatar' => 'required|mimes:jpg,jpeg,png'
    ];

    protected $messages = [
        'avatar.mimes' => 'Аватар не соответствует нужному типу',
        'avatar.required' => 'Вберите аватар'
    ];

    public function changeAvatar()
    {
        $this->validate();
        if ($this->user->avatar) {
            FileStorage::fileDelete($this->user->avatar->path);
            $this->user->avatar->delete();
        }
        $files = [
            $this->avatar
        ];
        FileStorage::saveFiles($files, $this->user->id, User::class, true);
        $this->refreshProfileInfo();
    }

    public function refreshProfileInfo()
    {
        $this->user = User::find($this->user_id);
    }

    public function render()
    {
        return view('livewire.staff.profile');
    }
}
