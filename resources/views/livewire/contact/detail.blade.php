<div>
    <div class="mt-2 ms-2 d-flex">
        <div class="col">
            <p class="h2">
                <img src="{{asset('storage/images/imguser.png')}}" alt="contact avatar" width="100" height="100">
                @if($contact->post)
                    {{$contact->post . '-' . $contact->full_name . '-'}}
                @else
                    {{$contact->full_name}}
                @endif
                @if($contact->counterparty_id)
                    <a href="{{route('counterparty.detail', $contact->counterparty_id)}}">
                        {{$contact->counterparty->name}}
                    </a>
                @endif
            </p>
        </div>
        @if(auth()->id() == $contact->user_id)
            <div class="align-items-end m-3">
                <button wire:click="deleteContact"
                        class="btn btn-danger">Удалить
                </button>
            </div>
        @endif
    </div>

    <div class="mt-2 ms-2">
        <p>Источник: {{$contact->source->name}}</p>
        <p>Группа: {{$contact->group->name}}</p>
        <p>Телефон: {{$contact->phone}}</p>
        <p>Почта: {{$contact->email}}</p>
        @if($contact->telegram)
            <p>Телеграмм: {{$contact->telegram}}</p>
        @endif
        @if($contact->vk_url)
            <a href="{{$contact->vk_url}}">Вконтакте контакта</a>
        @endif
    </div>

    @if(auth()->id() == $contact->user_id)
        <div class="float-end me-2 mt-2 mb-3">
            <!-- Кнопка-триггер модального окна -->
            <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Редактировать контакт
            </button>

            <!-- Модальное окно -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                 aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Редактирование контакта</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Закрыть"></button>
                        </div>
                        <div class="modal-body">
                            @livewire('contact.edit', ['id' => $contact_id])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
