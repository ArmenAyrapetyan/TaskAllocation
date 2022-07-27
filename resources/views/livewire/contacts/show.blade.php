<div>
    <div class="container profile-page">
        <div class="row">
            @foreach($contacts as $contact)
            <div class="col-xl-6 col-lg-7 col-md-12">
                <div class="card profile-header">
                    <div class="body">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="profile-image float-md-right">
                                    <img width="180" height="180" src="storage/images/imguser.png" alt="">
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 col-12">
                                <h4 class="m-t-0 m-b-0">{{ $contact->first_name }} {{ $contact->last_name }}</h4>
                                <span class="job_post">Должность:
                                    @if($contact->post)
                                        {{$contact->post}}
                                    @else
                                        Должность не указана
                                    @endif
                                </span>
                                <p>Был добавлен из {{ $contact->source->name }}</p>
                                <p>Номер телефона: {{$contact->phone}}</p>
                                <p>Почта: {{$contact->email}}</p>
                                @if($contact->telegram)
                                    <p>Телеграмм &commat;{{$contact->telegram}}</p>
                                @endif
                                @if($contact->vk_url)
                                    <a href="{{$contact->vk_url}}">Ссылка на вконтакте</a>
                                @endif
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
