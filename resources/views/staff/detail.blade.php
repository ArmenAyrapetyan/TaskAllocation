@extends('layouts.app')

@section('content')

    @livewire('staff.detail', ['id' => $id])

@endsection
