<?php

namespace App\Http\Livewire\Staff;

use App\Models\User;
use Livewire\Component;

class Modify extends Component
{
    public $user;
    public $first_name;
    public $last_name;
    public $third_name;
    public $telegram;
    public $vk_url;
    public $phone;
    public $email;

    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'third_name' => 'required',
            'phone' => 'required|unique:users,phone,' . $this->user->id . ',id',
            'email' => 'required|email|unique:users,email,' . $this->user->id . ',id',
        ];
    }

    protected $messages = [
        'first_name.required' => 'Имя не должно быть пустым',
        'last_name.required' => 'Заполните поле фамилия',
        'third_name.required' => 'Отчество не может быть пустым',
        'phone.required' => 'Номер телефона не может быть пустым',
        'email.required' => 'Введите почту',
        'email.email' => 'Введите почту корректно',
        'phone.unique' => 'Данный телефон уже зарегестрирован у другого пользователя',
        'email.unique' => 'Данная почта уже зарегестрирована у дрегого пользователя',
    ];

    public function mount($id)
    {
        $this->user = User::find($id);
        $this->first_name = $this->user->first_name;
        $this->last_name = $this->user->last_name;
        $this->third_name = $this->user->third_name;
        $this->telegram = $this->user->telegram;
        $this->vk_url = $this->user->vk_url;
        $this->phone = $this->user->phone;
        $this->email = $this->user->email;
    }

    public function editProfile()
    {
        $this->validate();

        if ($this->user->first_name != $this->first_name) $this->user->first_name = $this->first_name;
        if ($this->user->last_name != $this->last_name) $this->user->last_name = $this->last_name;
        if ($this->user->third_name != $this->third_name) $this->user->third_name = $this->third_name;
        if ($this->user->telegram != $this->telegram) $this->user->telegram = $this->telegram;
        if ($this->user->vk_url != $this->vk_url) $this->user->vk_url = $this->vk_url;
        if ($this->user->phone != $this->phone) $this->user->phone = $this->phone;
        if ($this->user->email != $this->email) $this->user->email = $this->email;
        $this->user->save();

        $this->dispatchBrowserEvent('closeModal');
        $this->emit('refreshProfileInfo');
    }

    public function render()
    {
        return view('livewire.staff.modify');
    }
}
