@extends('layouts.app')

@section('content')

    @livewire('counterparty.detail', ['id' => $id])

@endsection
