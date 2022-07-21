<header>
    <div class="navbar navbar-light bg-white shadow-sm">
        <nav>
            <ul class="nav nav-tabs" id="myTab" role="tablist">

                @foreach($pages as $key => $page)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link  @if($page['view']  == $curPage) active @endif" id="{{$key}}-tab" data-bs-toggle="tab" data-bs-target="#{{$key}}"
                                type="button" role="tab" aria-controls="home" aria-selected="true">{{ $page['title'] }}
                        </button>
                    </li>
                @endforeach
            </ul>
        </nav>
    </div>
</header>
