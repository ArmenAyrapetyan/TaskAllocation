<div @if($time_start != null) wire:poll.1000ms @endif>
    <input wire:model="message" name="message" @if($time_start != null) disabled @endif type="text">
    <select @if($time_start != null) disabled @endif wire:model="task_id" name="task_id" class="form-select-sm me-1 is-invalid">
        <option value="">Выбор задачи</option>
        @foreach(auth()->user()->tasks as $task)
            <option value="{{$task->id}}">{{$task->name}}</option>
        @endforeach
    </select>
    Время: @if($time_start != null) {{gmdate("H:i:s", time() - $time_start)}} @else {{gmdate("H:i:s", 0)}} @endif
    <button wire:click="timerGoAndStop" type="button" class="btn btn-primary ms-1 me-1">
        @if($time_start != null)
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pause-fill"
                 viewBox="0 0 16 16">
                <path
                    d="M5.5 3.5A1.5 1.5 0 0 1 7 5v6a1.5 1.5 0 0 1-3 0V5a1.5 1.5 0 0 1 1.5-1.5zm5 0A1.5 1.5 0 0 1 12 5v6a1.5 1.5 0 0 1-3 0V5a1.5 1.5 0 0 1 1.5-1.5z"></path>
            </svg>
        @else
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-play-fill"
                 viewBox="0 0 16 16">
                <path
                    d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z"></path>
            </svg>
        @endif
    </button>
</div>
