<div>
    <div class="float-start bg-light p-2 h-100 w-25 mw-25">
        <ul class="list-group nav-tabs" id="myTab" role="tablist">
            @for($i = 0; $i < count($types); $i++)
                <li class="nav-item list-group-item d-flex justify-content-between align-items-start"
                    role="presentation">
                    <button class="btn w-100 p-1 @if($i == 0) active @endif" id="{{$types[$i]}}-tab" data-bs-toggle="tab" data-bs-target="#{{$types[$i]}}"
                            type="button" role="tab" aria-controls="home" aria-selected="true">
                        <div class="d-flex">
                            <p class="col-10 m-0">{{$types[$i]}}</p>
                            <div class="col-2">
                                <span class="badge bg-primary rounded-pill">14</span>
                            </div>
                        </div>
                    </button>
                </li>
            @endfor
        </ul>
    </div>
    <div class="float-end bg-white w-75 mw-75 h-100 position-relative">
        @for($i = 0; $i < count($types); $i++)
            <div class="tab-pane fade @if($i == 0) show active @endif position-absolute" id="{{$types[$i]}}" role="tabpanel" aria-labelledby="{{$types[$i]}}-tab">
                {{ $types[$i] }}</div>
        @endfor
    </div>
</div>
