<div>
    <div class="float-start bg-light p-2 h-100 w-25 mw-25">
        <ul class="list-group nav-tabs" id="myTab" role="tablist">
            @foreach($projects as $project)
                <li class="nav-item list-group-item d-flex justify-content-between align-items-start"
                    role="presentation">
                    <button class="btn w-100 p-1" id="{{$project->name}}-tab"
                            data-bs-toggle="tab" data-bs-target="#{{$project->name}}"
                            type="button" role="tab" aria-controls="home" aria-selected="true">
                        <div class="d-flex">
                            <p class="col-10 m-0">{{$project->name}}</p>
                            <div class="col-2">
                                <span class="badge bg-primary rounded-pill">{{ count($project->tasks) }}</span>
                            </div>
                        </div>
                    </button>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="float-end bg-white w-75 mw-75 h-100 position-relative">
        @foreach($projects as $project)
                <div class="tab-pane fade position-absolute" id="{{$project->name}}"
                     role="tabpanel" aria-labelledby="{{$project->name}}-tab">
                    @foreach($project->tasks as $task)
                    <p>{{$task->name}}</p>
                    @endforeach
                </div>
        @endforeach
    </div>
</div>
