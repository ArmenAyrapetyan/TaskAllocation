<div class="ms-2">
    <div class="accordion m-3">
        @foreach($dictionaries as $key => $dictionary)
            <div class="accordion-item">
                <h4 class="accordion-header" id="headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse{{$key}}"
                            aria-expanded="true" aria-controls="collapse{{$key}}">Тык
                    </button>
                </h4>
                <div id="collapse{{$key}}" class="accordion-collapse collapse" aria-labelledby="headingOne"
                     data-bs-parent="#accordionExample" style="">
                    <div class="accordion-body">
                        <div class="accordion m-1">
                            @foreach($dictionary->subDictionaries as $sub_key => $subDictionary)
                                <div class="accordion-item">
                                    <h4 class="accordion-header" id="SubheadingOne">
                                        <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#Subcollapse{{$sub_key}}"
                                                aria-expanded="true" aria-controls="Subcollapse{{$sub_key}}">Тык
                                        </button>
                                    </h4>
                                    <div id="Subcollapse{{$sub_key}}" class="accordion-collapse collapse"
                                         aria-labelledby="SubheadingOne"
                                         data-bs-parent="#SubaccordionExample">
                                        <div class="accordion-body">
                                            <p>aaaaaaaaaaaaaa</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @foreach($dictionary->projectInformation as $projectInfo)
                            <p>{{$projectInfo->information}}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
