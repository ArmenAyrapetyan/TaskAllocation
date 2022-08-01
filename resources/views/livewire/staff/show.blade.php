<div>
    <!-- Кнопка-триггер модального окна -->
    <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#createToken">
        Создать Токен
    </button>

    <!-- Модальное окно -->
    <div class="modal fade" id="createToken" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="createTokenLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createTokenLabel">Создание токена</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>
                <div class="modal-body">
                    @livewire('staff.create-token')
                </div>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener('closeTokenCreate', event => {
            $("#createToken").modal('hide');
        })
    </script>

    <div class="container profile-page">
        <div class="row">
            @foreach($staff as $employee)
                <div class="col-xl-6 col-lg-7 col-md-12">
                    <div class="m-1 card profile-header">
                        <div class="body">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="m-1 profile-image float-md-right">
                                        @if($employee->avatar)
                                            <img width="160" height="160" src="{{ $employee->avatar->path }}" alt="">
                                        @else
                                            <img width="160" height="160" src="storage/images/imguser.png" alt="">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-8 col-12">
                                    <h5 class="m-t-0 m-b-0">{{ $employee->first_name }} {{ $employee->last_name }}</h5>
                                    <p class="m-0">Состоит в группах:</p>
                                    <ul class="mb-1">
                                        @foreach($employee->groups as $group)
                                            <li class="mb-1">{{ $group->name }}</li>
                                        @endforeach
                                    </ul>
                                    {{--                                    <p>Номер телефона: {{$employee->phone}}</p>--}}
                                    <p class="mb-1">{{$employee->email}}</p>
                                    <p class="mb-1">Заработок в час: {{$employee->rate_per_hour}}</p>
                                    <div>
                                        <button class="mb-1 btn btn-primary btn-round">Редактировать</button>
                                        <button class="mb-1 btn btn-danger btn-round btn-simple">Удалить</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
