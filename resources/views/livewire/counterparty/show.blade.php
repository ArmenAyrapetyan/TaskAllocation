<div>
    <!-- Кнопка-триггер модального окна -->
    <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Создать контрагента
    </button>

    <!-- Модальное окно -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Создание контрагента</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>
                <div class="modal-body">
                    @livewire('counterparty.create')
                </div>
            </div>
        </div>
    </div>

    <div class="ps-2">
        <table class="table table-striped table-bordered">
            <tr>
                <th scope="col">
                    Название
                </th>
                <th scope="col">
                    Почта
                </th>
                <th scope="col">
                    Телефон
                </th>
                <th scope="col">
                    Производитель
                </th>
            </tr>
            @foreach($counterparties as $counterparty)
                <tr>
                    <th scope="row">
                        <a href="{{route('counterparty.detail', $counterparty->id)}}">{{$counterparty->name}}</a>
                    </th>
                    <td>
                        <p>{{$counterparty->email}}</p>
                    </td>
                    <td>
                        {{$counterparty->phone}}
                    </td>
                    <td>
                        @if($counterparty->is_manufacturer)
                            <p>Да</p>
                        @else
                            <p>Нет</p>
                        @endif
                    </td>
            @endforeach
            {{$counterparties->links()}}
        </table>
    </div>
</div>
