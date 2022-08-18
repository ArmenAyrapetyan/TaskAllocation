<div @if($isTimerActive) wire:poll.1000ms @endif>
    <h3>
        @if($time_passed)
            Время: {{gmdate("H:i:s", $time_passed)}}
        @else
            Время: {{gmdate("H:i:s", 0)}}
        @endif
        <button class="btn btn-primary" wire:click="goTimerActive">
            @if(!$isTimerActive)
                Запустить таймер
            @else
                Остановить таймер
            @endif
        </button>
        <button @if($isTimerActive) disabled @endif class="btn btn-primary" wire:click="pushTime({{auth()->id()}})">
            Запушить время в задачу
        </button>
    </h3>
</div>
