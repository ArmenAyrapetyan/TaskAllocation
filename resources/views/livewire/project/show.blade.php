<div>
    <!-- Кнопка-триггер модального окна -->
    <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Создать проект
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
                    @livewire('project.create')
                </div>
            </div>
        </div>
    </div>

    <table class="table table-striped table-bordered ms-2">
        <tr>
            <th scope="col">
                Проект
            </th>
            <th scope="col">
                Задач
            </th>
            <th scope="col">
                Контрагент
            </th>
            <th scope="col">
                Статус
            </th>
            <th scope="col">
                Автор
            </th>
        </tr>
        @foreach($projects as $project)
            <tr data-bs-toggle="modal" data-bs-target="#projectInfo" data-bs-whatever="{{json_encode($project->get_info)}}">
                <th scope="row">
                    {{ $project->name }}
                </th>
                <td>
                    {{ $project->count_tasks }}
                </td>
                <td>
                    @if($project->counterparty)
                        {{ $project->counterparty->name }}
                    @else
                        null
                    @endif
                </td>
                <td>
                    {{ $project->status->name }}
                </td>
                <td>
                    {{ $project->user->full_name }}
                </td>
            </tr>
        @endforeach
    </table>

    <!-- Модальное окно -->
    <div class="modal fade" id="projectInfo" tabindex="-1" aria-labelledby="projectInfoLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="projectInfoLabel">Подробнее о проекте</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Закрыть"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row border-bottom">
                            <div class="col-sm border-end">
                                Задача
                            </div>
                            <div class="col-sm border-end">
                                Контрагент
                            </div>
                            <div class="col-sm border-end">
                                Статус
                            </div>
                            <div class="col-sm border-end">
                                Дата создания
                            </div>
                            <div class="col-sm border-end">
                                Участники
                            </div>
                            <div class="col-sm">
                                Затраченное время
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var projectInfo = document.getElementById('projectInfo')
        projectInfo.addEventListener('show.bs.modal', function (event) {
            // Кнопка, запускающая модальное окно
            var button = event.relatedTarget
            var body = document.querySelector('.container')
            while (body.firstChild){
                body.removeChild(body.lastChild)
            }

            // Извлекаю инфу
            var project = JSON.parse(button.getAttribute('data-bs-whatever'))

            var modalTitle = projectInfo.querySelector('.modal-title')
            modalTitle.textContent = 'Подробнее о проекте ' + project['project_name']

            var cont = document.createElement('div')
            cont.className = "row border-bottom cont"

            var divNameColumn = document.createElement('div')
            divNameColumn.className = "col border-end"
            divNameColumn.textContent = "Имя"
            cont.append(divNameColumn)

            var divCounterpartyColumn = document.createElement('div')
            divCounterpartyColumn.className = "col border-end"
            divCounterpartyColumn.textContent = "Контрагент"
            cont.append(divCounterpartyColumn)

            var divTaskStatusNameColumn = document.createElement('div')
            divTaskStatusNameColumn.className = "col border-end"
            divTaskStatusNameColumn.textContent = "Статус"
            cont.append(divTaskStatusNameColumn)

            var divTaskCreatedAtColumn = document.createElement('div')
            divTaskCreatedAtColumn.className = "col border-end"
            divTaskCreatedAtColumn.textContent = "Дата создания"
            cont.append(divTaskCreatedAtColumn)

            var divTaskUsersColumn = document.createElement('div')
            divTaskUsersColumn.className = "col-3 border-end"
            divTaskUsersColumn.textContent = "Участники"
            cont.append(divTaskUsersColumn)

            var divTaskTimeSpendColumn = document.createElement('div')
            divTaskTimeSpendColumn.className = "col border-end"
            divTaskTimeSpendColumn.textContent = "Времени потраченно"
            cont.append(divTaskTimeSpendColumn)

            body.append(cont)

            for (let i = 0; i < project['tasks'].length; i++) {
                var content = document.createElement('div')
                content.className = "row border-bottom cont"

                var divName = document.createElement('div')
                divName.className = "col border-end"
                divName.textContent = project['tasks'][i]['task_name']
                content.append(divName)

                var divCounterparty = document.createElement('div')
                divCounterparty.className = "col border-end"
                divCounterparty.textContent = project['counterparty_name']
                content.append(divCounterparty)

                var divTaskStatusName = document.createElement('div')
                divTaskStatusName.className = "col border-end"
                divTaskStatusName.textContent = project['tasks'][i]['task_status']
                content.append(divTaskStatusName)

                var divTaskCreatedAt = document.createElement('div')
                divTaskCreatedAt.className = "col border-end"
                divTaskCreatedAt.textContent = project['tasks'][i]['task_date_create']
                content.append(divTaskCreatedAt)

                var divTaskUsers = document.createElement('div')
                divTaskUsers.className = "col-3 border-end"
                for (let j = 0; j < project['tasks'][i]['task_users'].length; j++) {
                    var users = document.createElement('p')
                    users.textContent = project['tasks'][i]['task_users'][j]['user_name'] + ' '
                        + project['tasks'][i]['task_users'][j]['user_role'] + '\n'
                    divTaskUsers.append(users)
                }
                content.append(divTaskUsers)

                var divTaskTimeSpend = document.createElement('div')
                divTaskTimeSpend.className = "col border-end"
                divTaskTimeSpend.textContent = project['tasks'][i]['task_time_spend']
                content.append(divTaskTimeSpend)

                body.append(content)
            }
        })
    </script>

</div>
