@extends('layouts.app')

@section('content')

    <div>
        <div class="float-start bg-light p-2 h-100 w-25 mw-25">
            @livewire('project.index')
        </div>

        <div class="float-end bg-white w-75 mw-75 h-100 position-relative">
            @livewire('project.show')
        </div>
    </div>

@endsection
