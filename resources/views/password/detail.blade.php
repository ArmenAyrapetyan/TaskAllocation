@extends('layouts.app')

@section('content')



    @livewire('passwords.detail', ['info_id' => $info_id])

@endsection
