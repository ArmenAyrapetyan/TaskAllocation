@extends('layouts.app')

@section('content')

    @livewire('staff.profile', ['id' => $id])

@endsection
