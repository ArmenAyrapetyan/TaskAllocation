<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('main')}}">TaskAllocation</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('notify.show')}}">Уведомления</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('project.show')}}">Проекты</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('task.show')}}">Задачи</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('report.show')}}">Отчеты</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="{{route('contact.show')}}">Контакты</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="{{route('counterparty.show')}}">Контрагенты</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('staff.show')}}">Сотрудники</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('password.show')}}">Пароли</a>
                    </li>
                </ul>
                @auth
                    <div class="ms-3">
                        <nav class="nav text-align-center">
                            @if(auth()->user()->avatar)
                                <img src="{{asset(auth()->user()->avatar->path)}}" width="45" height="45" class="mt-2">
                            @else
                                <img src="{{asset('storage/images/imguser.png')}}" width="45" height="45" class="mt-2">
                            @endif
                            <a href="{{route('staff.profile')}}" class="mt-2 p-2">{{auth()->user()->full_name}}</a>
                            <form action="{{route('logout')}}" method="POST">
                                @csrf
                                <button class="btn btn-primary mt-2 p-2">Выйти</button>
                            </form>
                        </nav>
                    </div>
                @endauth
            </div>
        </div>
    </nav>
</header>
