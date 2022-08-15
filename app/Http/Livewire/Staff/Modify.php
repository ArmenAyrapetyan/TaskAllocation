<?php

namespace App\Http\Livewire\Staff;

use App\Models\User;
use Livewire\Component;

class Modify extends Component
{
    public $staff_data;
    public $user;

    public function rules()
    {
        return [
            'staff_data.first_name' => 'required',
            'staff_data.last_name' => 'required',
            'staff_data.third_name' => 'required',
            'staff_data.phone' => 'required|unique:users,phone,' . $this->user->id . ',id',
            'staff_data.email' => 'required|email|unique:users,email,' . $this->user->id . ',id',
        ];
    }

    protected $messages = [
        'staff_data.first_name.required' => 'Имя не должно быть пустым',
        'staff_data.last_name.required' => 'Заполните поле фамилия',
        'staff_data.third_name.required' => 'Отчество не может быть пустым',
        'staff_data.phone.required' => 'Номер телефона не может быть пустым',
        'staff_data.email.required' => 'Введите почту',
        'staff_data.email.email' => 'Введите почту корректно',
        'staff_data.phone.unique' => 'Данный телефон уже зарегестрирован у другого пользователя',
        'staff_data.email.unique' => 'Данная почта уже зарегестрирована у дрегого пользователя',
    ];

    public function mount($id)
    {
        $this->user = User::find($id);
        $this->staff_data = $this->user->toArray();
    }

    public function editProfile()
    {
        $this->validate();

        $this->user->fill($this->staff_data);
        $this->user->save();

        $this->dispatchBrowserEvent('closeModal');
        $this->emit('refreshProfileInfo');
    }

    public function render()
    {
        return view('livewire.staff.modify');
    }
}
