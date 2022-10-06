<div class="ms-3">
    <h2>{{$dictionary->name}}</h2>
    <p>Клиент: @if($counterparty)
            <a href="#">{{$counterparty->name}}</a>
        @else
            Без клиента
        @endif</p>
    <p>Проект: @if($project)
            <a href="#">{{$project->name}}</a>
        @else
            Без проекта
        @endif</p>
    <p>{!! nl2br(e($info->information)) !!}</p>

    <div class="row m-0">
        @foreach($info->files as $file)
            <div class="kakoi">
                <button class="float-end btn-close" wire:click="deleteFile({{$file}})"></button>
                @if(@exif_imagetype($file->path))
                    <img src="{{asset($file->path)}}" alt="image_task" width="400" height="400"
                         style="object-fit: cover; min-width: 200px; min-height: 200px"
                         class="m-2 img-thumbnail nibud">
                @else
                    <button wire:click="downloadFile('{{$file->path}}')" class="btn border d-block"
                            style="min-width: 200px; min-height: 200px;">
                        {{pathinfo($file->path)['extension']}}
                    </button>
                @endif
            </div>
        @endforeach
    </div>

    <!-- Кнопка-триггер модального окна -->
    <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Редактировать информацию
    </button>

    <!-- Модальное окно -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Заголовок модального окна</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>
                <div class="modal-body">
                    @livewire('passwords.edit-info', ['id' => $info->id])
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                    <button type="button" class="btn btn-primary">Сохранить изменения</button>
                </div>
            </div>
        </div>
    </div>

</div>
