@extends('layouts.app')

@section('content')

    @livewire('project.detail', ['id' => $id])

@endsection
