@extends('layouts.app')

@section('content')

    <div class="m-1">
        <p>Управление временем</p>
        @foreach($spended_times as $time)
            @livewire('task.time-detail', [$time])
        @endforeach
    </div>
    <script>
        var element = document.getElementsByClassName('time');
        var maskOptions = {mask: '00:00:00'};
        [...element].forEach((el) => {
            IMask(el, maskOptions);
        })
    </script>

@endsection
