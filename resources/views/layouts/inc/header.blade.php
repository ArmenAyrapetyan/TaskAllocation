<header>
    <div class="navbar navbar-light bg-white shadow-sm">
        <nav>
            @auth
                @if(auth()->user()->email_verified_at)
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    @foreach($pages as $key => $page)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link  @if($page['view']  == $curPage) active @endif" id="{{$key}}-tab"
                                    data-bs-toggle="tab" data-bs-target="#{{$key}}"
                                    type="button" role="tab" aria-controls="home"
                                    aria-selected="true">{{ $page['title'] }}
                            </button>
                        </li>
                    @endforeach
                </ul>
                @endif
            @endauth
            @guest
                <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                    <h4 class="p-2">TaskAllocation</h4>
                </a>
            @endguest
        </nav>
        @auth
            <div class="justify-content-end">
                <nav class="nav">
                    @if(auth()->user()->avatar)
                        <img src="{{asset(auth()->user()->avatar->path)}}" width="100" height="75">
                    @else
                        <img src="storage/images/imguser.png" width="100" height="75">
                    @endif
                    <p class="mt-2 p-2">{{auth()->user()->full_name}}</p>
                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <button class="btn btn-primary mt-2 p-2">Выйти</button>
                    </form>
                </nav>
            </div>
        @endauth
    </div>
</header>
