<div>
    <div class="accordion m-3">
        @foreach($notify as $not)
            <div class="accordion-item">
                <h4 class="accordion-header" id="headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne"
                            aria-expanded="true" aria-controls="collapseOne">
                        Событие в задаче: {{$tasks->where('id', $not->data['task_id'])->first()->name}}
                    </button>
                </h4>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                     data-bs-parent="#accordionExample" style="">
                    <div class="accordion-body">
                        <div class="m-0 p-0">
                            <div class="row">
                                <div class="col-md-8 d-flex">
                                    <div>
                                        @if($users->where('id', $not->data['user_id'])->first()->avatar)
                                            <img style="object-fit: cover" width="80" height="80"
                                                 class="rounded-circle m-2"
                                                 src="{{asset($users->where('id', $not->data['user_id'])->first()->avatar->path)}}"
                                                 alt="avatar">
                                        @else
                                            <img style="object-fit: cover" width="80" height="80"
                                                 class="rounded-circle m-2"
                                                 src="{{asset('storage/images/imguser.png')}}" alt="avatar">
                                        @endif
                                    </div>
                                    <div class="m-2">
                                        <p class="h5"><a
                                                href="{{route('staff.detail', $users->where('id', $not->data['user_id'])->first()->id)}}">
                                                {{$users->where('id', $not->data['user_id'])->first()->full_name}}</a>
                                        </p>
                                        <p class="h4">{{$not->data['message']}}</p>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 d-flex flex-column align-items-end">
                                    <button wire:click="markAsRead({{$not}})" type="button"
                                            class="btn btn-primary m-1">
                                        Прочитано
                                    </button>
                                    <a href="{{route('task.detail', $tasks->where('id', $not->data['task_id'])->first()->id)}}">
                                        <button class="btn btn-primary m-1">Перейти к задаче</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
