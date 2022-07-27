<div>
    <div class="container profile-page">
        <div class="row">
            @foreach($staff as $employee)
                <div class="col-xl-6 col-lg-7 col-md-12">
                    <div class="card profile-header">
                        <div class="body">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="profile-image float-md-right">
                                        @if($employee->avatar)
                                            <img width="180" height="180" src="{{ $employee->avatar->path }}" alt="">
                                        @else
                                            <img width="180" height="180" src="storage/images/imguser.png" alt="">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-8 col-12">
                                    <h4 class="m-t-0 m-b-0">{{ $employee->first_name }} {{ $employee->last_name }}</h4>
                                    <ul>
                                        <p>Состоит в группах:</p>
                                        @foreach($employee->groups as $group)
                                            <li>{{ $group->name }}</li>
                                        @endforeach
                                    </ul>
                                    {{--                                    <p>Номер телефона: {{$employee->phone}}</p>--}}
                                    <p>Почта: {{$employee->email}}</p>
                                    <p>Заработок в час: {{$employee->rate_per_hour}}</p>
                                    <div>
                                        <button class="btn btn-primary btn-round">Редактировать</button>
                                        <button class="btn btn-danger btn-round btn-simple">Удалить</button>
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
