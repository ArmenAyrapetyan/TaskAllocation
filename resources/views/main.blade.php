@extends('layouts.app')

@section('content')
    <div class="tab-content" id="myTabContent">
        @foreach($pages as $key => $page)
        <div class="tab-pane fade @if($page['view'] == $curPage) show active @endif" id="{{$key}}" role="tabpanel" aria-labelledby="{{$key}}-tab">
            @livewire($page['view'])
        </div>
        @endforeach
    </div>
@endsection
