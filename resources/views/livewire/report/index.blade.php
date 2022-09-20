<div>
    <div class="d-flex align-items-center">
        <label class="m-1"> Дата начала
            <input class="form-control" wire:model="date_start" type="date">
        </label>
        <label class="m-1"> Дата конца
            <input class="form-control" wire:model="date_end" type="date">
        </label>
        <div class="form-check m-1">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="Task"
                   checked wire:model="report_type">
            <label class="form-check-label" for="exampleRadios1">
                Отчет по задачам
            </label>
        </div>
        <div class="form-check m-1">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="Project"
                   wire:model="report_type">
            <label class="form-check-label" for="exampleRadios2">
                Отчет по проектам
            </label>
        </div>
        <div class="form-check m-1">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="Staff"
                   wire:model="report_type">
            <label class="form-check-label" for="exampleRadios3">
                Отчет по сотрудникам
            </label>
        </div>
        <button class="btn btn-primary m-1" wire:click="generateReport">Применить</button>
    </div>
    <div class="">
        @switch($report_type)
            @case("Task")
                @livewire('report.task')
                @break
            @case("Staff")
                @livewire('report.staff')
                @break
            @case('Project')
                @livewire('report.project')
                @break
        @endswitch
    </div>
</div>
