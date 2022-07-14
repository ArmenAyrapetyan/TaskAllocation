@extends('layouts.app')

@section('content')
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="notification" role="tabpanel" aria-labelledby="notification-tab">
            @livewire('notify.index')
        </div>
        <div class="tab-pane fade" id="chart" role="tabpanel" aria-labelledby="chart-tab">График</div>
        <div class="tab-pane fade" id="projects" role="tabpanel" aria-labelledby="projects-tab">Проекты</div>
        <div class="tab-pane fade" id="tasks" role="tabpanel" aria-labelledby="tasks-tab">Задачи</div>
        <div class="tab-pane fade" id="report" role="tabpanel" aria-labelledby="report-tab">Отчеты</div>
        <div class="tab-pane fade" id="passwords" role="tabpanel" aria-labelledby="passwords-tab">Пароли</div>
        <div class="tab-pane fade" id="contacts" role="tabpanel" aria-labelledby="contacts-tab">Контакты</div>
        <div class="tab-pane fade" id="staff" role="tabpanel" aria-labelledby="staff-tab">Сотрудники</div>
    </div>
@endsection
