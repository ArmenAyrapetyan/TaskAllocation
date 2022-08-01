<div>

    <!-- Кнопка-триггер модального окна -->
    <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#createTask">
        Создать задачу
    </button>

    <!-- Модальное окно -->
    <div class="modal fade" id="createTask" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="createTaskLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createTaskLabel">Создание задачи</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>
                <div class="modal-body">
                    @livewire('task.create')
                </div>
            </div>
        </div>
    </div>

    <table class="table table-striped table-bordered ms-2">
        <tr>
            <th scope="col">
                Название
            </th>
            <th scope="col">
                Проект
            </th>
            <th scope="col">
                Начало
            </th>
            <th scope="col">
                Окончание
            </th>
            <th scope="col">
                Участники
            </th>
            <th scope="col">
                Затраченное время
            </th>
        </tr>
        @foreach($tasks as $task)
            <tr data-bs-toggle="modal" data-bs-target="#taskDetail" data-bs-task="{{json_encode($task->get_details)}}">
                <th scope="row">
                    @if($task->project)
                        {{$task->project->name}} -
                    @endif {{ $task->name }}
                </th>
                <td>
                    @if($task->project)
                        {{ $task->project->name }}
                    @endif
                </td>
                <td>
                    {{$task->date_start}}
                </td>
                <td>
                    {{$task->date_end}}
                </td>
                <td>
                    @if($task->users)
                        @foreach($task->users as $user)
                            <p>{{$user->user->full_name . ' ' . $user->role->name}}</p>
                        @endforeach
                    @endif
                </td>
                <td>
                    @if($task->time_spend)
                        {{$task->time_spend . ' мин.'}}
                    @else
                        0 мин.
                    @endif
                </td>
            </tr>

        @endforeach
    </table>

    <div class="modal fade" id="taskDetail" tabindex="-1" aria-labelledby="taskDetailLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="taskDetailLabel">Подробнее о задаче</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Закрыть"></button>
                </div>
                <div class="modal-body">
                    <div class="task-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var taskDetail = document.getElementById('taskDetail')
        taskDetail.addEventListener('show.bs.modal', function (event) {
            // Кнопка, запускающая модальное окно
            var button = event.relatedTarget
            var body = document.querySelector('.task-body')
            while (body.firstChild){
                body.removeChild(body.lastChild)
            }

            // Извлекаю инфу
            var task = JSON.parse(button.getAttribute('data-bs-task'))

            var modalTitle = taskDetail.querySelector('.modal-title')
            modalTitle.textContent = task['task_name']

            var task_head = document.createElement('div')
            task_head.className = "d-flex flex-row mt-1"

            var  image_creator_div = document.createElement('div')
            image_creator_div.className = "image"
            var image_creator = document.createElement('img')
            image_creator.src = task['task_creator']['creator_avatar']
            image_creator.className = "rounded-circle m-1"
            image_creator.width = 100
            image_creator.height = 100
            image_creator.alt = "creator avatar"
            image_creator_div.append(image_creator)
            task_head.append(image_creator_div)

            var info_creator_div = document.createElement('div')
            info_creator_div.className = "ps-2"

            var info_div = document.createElement('div')
            info_div.className = "d-flex flex-row"
            var span_info = document.createElement('span')
            span_info.textContent = task['task_creator']['creator_name'] + ' ' + task['task_date_create']
            info_div.append(span_info)
            info_creator_div.append(info_div)

            var btn_div = document.createElement('div')
            var btn_open = document.createElement('button')
            btn_open.className = "btn btn-outline-dark btn-sm"
            btn_open.textContent = "Открыть профиль"
            btn_div.append(btn_open)
            info_creator_div.append(btn_div)

            task_head.append(info_creator_div)
            body.append(task_head)

            var description = document.createElement('p')
            description.textContent = task['task_description']
            body.append(description)

            var chat_label = document.createElement('p')
            chat_label.textContent = "Чат по задаче"
            body.append(chat_label)

            for (let i = 0; i < task['task_messages'].length; i++){
                var message_body = document.createElement('div')
                message_body.className = "d-flex flex-row mt-1"

                var user_avatar_div = document.createElement('div')
                user_avatar_div.className = "image"
                var user_avatar = document.createElement('img')
                user_avatar.src = task['task_messages'][i]['user']['avatar']
                user_avatar.className = "rounded-circle"
                user_avatar.width = 100
                user_avatar.height = 100
                user_avatar_div.append(user_avatar)
                message_body.append(user_avatar_div)

                var message_info = document.createElement('div')
                message_info.className = "ps-2"
                var user_info = document.createElement('div')
                user_info.className = "d-flex flex-row"
                var user_info_text = document.createElement('p')
                user_info_text.textContent = task['task_messages'][i]['user']['user_name'] + ' '
                    + task['task_messages'][i]['date_create']
                user_info.append(user_info_text)
                message_info.append(user_info)

                var message_text = document.createElement('div')
                message_text.className = "ps-1"
                var text = document.createElement('p')
                text.textContent = task['task_messages'][i]['text']
                message_text.append(text)
                message_info.append(message_text)
                message_body.append(message_info)
                body.append(message_body)
            }
        })
    </script>

</div>
