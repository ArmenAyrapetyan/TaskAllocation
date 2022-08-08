@extends('layouts.app')

@section('content')

    @livewire('contact.detail', ['id' => $id])

@endsection
