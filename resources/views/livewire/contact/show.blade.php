<div>
    <!-- Кнопка-триггер модального окна -->
    <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Создать Контакт
    </button>

    <!-- Модальное окно -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Создание контакта</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>
                <div class="modal-body">
                    @livewire('contact.create')
                </div>
            </div>
        </div>
    </div>

    <div class="ps-2">
        <table class="table table-striped table-bordered">
            <tr>
                <th scope="col">
                    Имя
                </th>
                <th scope="col">
                    Компания - должность
                </th>
                <th scope="col">
                    Контакты
                </th>
            </tr>
            @foreach($contacts as $contact)
                <tr>
                    <th scope="row">
                        <a href="{{route('contact.detail', $contact->id)}}">
                            {{$contact->full_name}}
                        </a>
                    </th>
                    <td>
                        @if($contact->counterparty)
                            {{$contact->counterparty->name}}
                        @else
                            Компания не указана
                        @endif
                        -
                        @if($contact->post)
                            {{$contact->post}}
                        @else
                            Должность не указана
                        @endif
                    </td>
                    <td>
                        <p>Номер телефона: {{$contact->phone}}</p>
                        <p>Почта: {{$contact->email}}</p>
                    </td>
                </tr>
            @endforeach
            {{$contacts->links()}}
        </table>
    </div>
</div>
