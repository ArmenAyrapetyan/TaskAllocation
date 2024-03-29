<div>
    <div class="mt-2 ms-2">
        <p class="h3">{{$project->group->name . ' - ' . $project->name . ' ' . $project->status->name}}
            @if($project->counterparty)
                <a href="{{route('counterparty.detail', $project->counterparty->id)}}">{{$project->counterparty->name}}</a>
            @else
                Без контрагента
            @endif
        </p>
    </div>

    <div class="ms-3 mt-3">
        <p class="h3">
            @if($project->users->first()->avatar)
                <img height="100" src="{{asset($project->users->first()->avatar->path)}}" alt="user avatar">
            @else
                <img height="100" src="{{asset('storage/images/imguser.png')}}" alt="user avatar">
            @endif
            {{$project->users->first()->full_name}}
        </p>
    </div>

    <div class="ms-3 mt-2">
        <p>Описание проекта:</p>
        @foreach(explode(' ', $project->description) as $word)
            @if(is_numeric(strpos($word, 'http')))
                <div class="d-none">
                    {{preg_match("~<title>(.*)</title>~",file_get_contents($word), $title)}}
                </div>
                <a href="{{$word}}">{{$title[1]}}</a>
            @else
                {{$word}}
            @endif
        @endforeach
        <div class="row">
            @foreach($project->files as $file)
                <div class="kakoi">
                    @if(in_array(auth()->id(), $project->users->pluck('id')->toArray()))
                        <button class="float-end btn-close" wire:click="deleteFile({{$file}})"></button>
                    @endif
                    @if(@exif_imagetype($file->path))
                        <img src="{{asset($file->path)}}" alt="image_task" width="400" height="400"
                             style="object-fit: cover; min-width: 200px; min-height: 200px"
                             class="nibud m-2 img-thumbnail">
                    @else
                        <button wire:click="downloadFile('{{$file->path}}')" class="btn border mt-auto d-block"
                                style="min-width: 200px;min-height: 200px;">
                            {{pathinfo($file->path)['extension']}}
                        </button>
                    @endif
                </div>
            @endforeach
        </div>
    </div>

    <div class="ms-2 mt-2 me-2">
        <table class="table table-hover">
            <tbody>
            <tr>
                <td>
                    Название задачи
                </td>
                <td>
                    Статус
                </td>
                <td>
                    Участники
                </td>
                <td>
                    Затраченное время
                </td>
                <td>
                    Планируемое время
                </td>
            </tr>
            @foreach($project->tasks as $task)
                <tr>
                    <td>
                        <a href="{{route('task.detail', $task->id)}}">
                            {{$task->name}}
                        </a>
                    </td>
                    <td>
                        {{$task->status->name}}
                    </td>
                    <td>
                        @if($task->users)
                            @foreach($task->users as $user)
                                <p>{{$user->getRoleName($user->pivot->role_id)}} <a
                                        href="{{route('staff.detail', $user->id)}}">{{$user->full_name}}</a>
                                </p>
                            @endforeach
                        @endif
                    </td>
                    <td>
                        {{$task->timeSpend()}} мин.
                    </td>
                    <td>
                        @if($task->time_planned)
                            {{$task->time_planned . ' мин.'}}
                        @else
                            - мин.
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    @if($project->users->first()->id == auth()->id())
        <div class="float-end me-2 mt-2 mb-3">
            <!-- Кнопка-триггер модального окна -->
            <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Редактировать проект
            </button>

            <!-- Модальное окно -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                 aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Создание проекта</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Закрыть"></button>
                        </div>
                        <div class="modal-body">
                            @livewire('project.edit', ['id' => $project_id])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
