<div>
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <label for="changeAvatar">
                            @if($user->avatar)
                                <img src="{{asset($user->avatar->path)}}" alt="avatar" width="150" height="150"
                                     class="rounded-circle" style="object-fit: cover;">
                            @else
                                <img src="{{asset('storage/images/imguser.png')}}" alt="avatar" width="150" height="150"
                                     class="rounded-circle" style="object-fit: cover;">
                            @endif
                        </label>
                        <h5 class="my-3">{{$user->full_name}}</h5>
                        <p class="text-muted mb-1">{{$user->email}}</p>
                        <p class="text-muted mb-4">{{$user->phone}}</p>
                        <div class="d-flex justify-content-center mb-2">
                            <form>
                                <input id="changeAvatar" class="d-none m-2 form-control" type="file" wire:model="avatar">
                                @error('avatar') <span class="text-danger">{{$message}}</span> @enderror
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card mb-4 mb-lg-0">
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush rounded-3">
                            <li class="list-group-item d-flex justify-content-center align-items-center p-3">
                                <i class="fas fa-globe fa-lg text-warning"></i>
                                @if($user->telegram)
                                    <p class="mb-0">{{$user->telegram}}</p>
                                @else
                                    <p class="mb-0">Телеграм не указан</p>
                                @endif
                            </li>
                            <li class="list-group-item d-flex justify-content-center align-items-center p-3">
                                <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                                @if($user->vk_url)
                                    <a href="{{$user->vk_url}}" class="mb-0">Вконтакте</a>
                                @else
                                    <p class="mb-0">Вконтакте не указан</p>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Полное имя</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{$user->first_name . ' ' . $user->last_name . ' ' . $user->third_name}}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Почта</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{$user->email}}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Номер</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{$user->phone}}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop">Изменить профиль
                            </button>

                            <!-- Модальное окно -->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                 data-bs-keyboard="false" tabindex="-1"
                                 aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Редактирование профиля</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Закрыть"></button>
                                        </div>
                                        <div class="modal-body">
                                            @livewire('staff.modify', ['id' => $user->id])
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-4 mb-md-0">
                            <div class="card-body">
                                <p class="mb-4"><span class="text-primary font-italic me-1">участвует в </span>Задачах
                                </p>
                                @foreach($user->tasks as $task)
                                    <hr>
                                    <a href="{{route('task.detail', $task->id)}}">{{$task->name}}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-4 mb-md-0">
                            <div class="card-body">
                                <p class="mb-4"><span class="text-primary font-italic me-1">созданые</span>Проекты</p>
                                @foreach($user->projects as $project)
                                    <hr>
                                    <a href="{{route('project.detail', $project->id)}}">{{$project->name}}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
