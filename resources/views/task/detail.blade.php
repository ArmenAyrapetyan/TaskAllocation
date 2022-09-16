@extends('layouts.app')

@section('content')

    @livewire('task.detail', ['id' => $id])

@endsection
