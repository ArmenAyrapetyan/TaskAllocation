<?php

namespace App\Http\Livewire\Task;

use App\Models\AccessUser;
use App\Models\Task;
use App\Models\TimeSpend;
use App\Models\User;
use Livewire\Component;

class TimeDetail extends Component
{
    public $time;
    public $time_input;
    public $message;
    public $task_name;
    public $result;

    public function mount($time)
    {
        $this->time = $time;
        $this->time_input = gmdate('H:i:s', $time->time_spend);
        $this->task_name = Task::where('id', $time->userAccess->accessable_id)->first()->name;
        $this->message = $time->message;
        $this->result = null;
    }

    public function editTime()
    {
        if ($this->time->time_spend != $this->time_input) {
            $this->time->time_spend = $this->convertHisToSecond($this->time_input);
        }
        if ($this->time->message != $this->message) {
            $this->time->message = $this->message;
        }
        $this->time->save();
        $this->refresh();
    }

    public function refresh()
    {
        $this->time_input = gmdate('H:i:s', $this->time->time_spend);
        $this->result = "Изменено $this->task_name";
    }

    public function convertHisToSecond($time_to_parse)
    {
        $parse_time = explode(':', $time_to_parse);
        $second = 0;
        if (count($parse_time) == 3) {
            if ($parse_time[0] != 0)
                $second += (int)$parse_time[0] * 60 * 60;
            if ($parse_time[1] != 0)
                $second += (int)$parse_time[1] * 60;
            if ($parse_time[2] != 0)
                $second += (int)$parse_time[2];
        }
        return $second;
    }

    public function render()
    {
        return view('livewire.task.time-detail');
    }
}
