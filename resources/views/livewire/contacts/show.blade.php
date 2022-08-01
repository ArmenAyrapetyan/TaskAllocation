<div>
    <!-- Кнопка-триггер модального окна -->
    <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#createContact">
        Создать Контакт
    </button>

    <!-- Модальное окно -->
    <div class="modal fade" id="createContact" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="createContactLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createContactLabel">Создание контакта</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>
                <div class="modal-body">
                    @livewire('contacts.create')
                </div>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener('closeContactCreate', event => {
            $("#createContact").modal('hide');
        })
    </script>

    <div class="container profile-page">
        <div class="row">
            @foreach($contacts as $contact)
            <div class="col-xl-6 col-lg-7 col-md-12">
                <div class="m-1 card profile-header">
                    <div class="body">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="profile-image float-md-right m-1">
                                    <img width="160" height="160" src="storage/images/imguser.png" alt="">
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 col-12">
                                <h5 class="m-t-0 m-b-0">{{ $contact->first_name }} {{ $contact->last_name }}</h5>
                                <span class="mb-1 job_post">Должность:
                                    @if($contact->post)
                                        {{$contact->post}}
                                    @else
                                        Должность не указана
                                    @endif
                                </span>
                                <p class="mb-1">Был добавлен из {{ $contact->source->name }}</p>
                                <p class="mb-1">Номер телефона: {{$contact->phone}}</p>
                                <p class="mb-1">{{$contact->email}}</p>
                                @if($contact->telegram)
                                    <p class="mb-1">Телеграмм &commat;{{$contact->telegram}}</p>
                                @endif
                                @if($contact->vk_url)
                                    <a class="mb-1" href="{{$contact->vk_url}}">Ссылка на вконтакте</a>
                                @endif
                                <div>
                                    <button class="mb-1 btn btn-primary btn-round">Редактировать</button>
                                    <button wire:click="deleteContact({{$contact->id}})" class="mb-1 btn btn-danger btn-round btn-simple">Удалить</button>
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
