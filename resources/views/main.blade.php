@extends('layouts.app')

@section('content')
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="notification" role="tabpanel" aria-labelledby="notification-tab">
            @livewire('notify.index')
        </div>
        <div class="tab-pane fade" id="chart" role="tabpanel" aria-labelledby="chart-tab">
            @livewire('cart.index')
        </div>
        <div class="tab-pane fade" id="projects" role="tabpanel" aria-labelledby="projects-tab">
            @livewire('project.index')
        </div>
        <div class="tab-pane fade" id="tasks" role="tabpanel" aria-labelledby="tasks-tab">
            @livewire('task.index')
        </div>
        <div class="tab-pane fade" id="report" role="tabpanel" aria-labelledby="report-tab">
            @livewire('report.index')
        </div>
        <div class="tab-pane fade" id="passwords" role="tabpanel" aria-labelledby="passwords-tab">
            @livewire('password.index')
        </div>
        <div class="tab-pane fade" id="contacts" role="tabpanel" aria-labelledby="contacts-tab">
            @livewire('contacts.index')
        </div>
        <div class="tab-pane fade" id="staff" role="tabpanel" aria-labelledby="staff-tab">
            @livewire('staff.index')
        </div>
    </div>
@endsection
