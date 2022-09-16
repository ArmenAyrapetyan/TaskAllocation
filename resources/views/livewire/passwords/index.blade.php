<div class="ms-2">

    <!-- Кнопка-триггер модального окна -->
    <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Создать папку/подпапку или словарь
    </button>

    <!-- Модальное окно -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Создание проекта</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>
                <div class="modal-body">
                    @livewire('passwords.create')
                </div>
            </div>
        </div>
    </div>

    <div class="accordion m-3">
        @foreach($dictionaries as $dictionary)
            <div class="accordion-item">
                <h4 class="accordion-header" id="headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse{{$dictionary->name}}"
                            aria-expanded="true" aria-controls="collapse{{$dictionary->name}}">{{$dictionary->name}}
                    </button>
                </h4>
                <div id="collapse{{$dictionary->name}}" class="accordion-collapse collapse" aria-labelledby="headingOne"
                     data-bs-parent="#accordionExample" style="">
                    <div class="accordion-body">
                        <div class="accordion m-1">
                            @foreach($dictionary->subDictionaries as $subDictionary)
                                <div class="accordion-item">
                                    <h4 class="accordion-header" id="SubheadingOne">
                                        <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#Subcollapse{{$subDictionary->name}}"
                                                aria-expanded="true"
                                                aria-controls="Subcollapse{{$subDictionary->name}}">{{$subDictionary->name}}
                                        </button>
                                    </h4>
                                    <div id="Subcollapse{{$subDictionary->name}}" class="accordion-collapse collapse"
                                         aria-labelledby="SubheadingOne"
                                         data-bs-parent="#SubaccordionExample">
                                        <div class="accordion-body">
                                            @foreach($subDictionary->projectInformation as $projectInfo)
                                                <a href="{{route('password.detail', $projectInfo->id)}}">{{$projectInfo->object->name}}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @foreach($dictionary->projectInformation as $projectInfo)
                            <a href="{{route('password.detail', $projectInfo->id)}}">{{$projectInfo->object->name}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
