<div class="m-2">
    @if($project_inform)
        <table class="table">
            <tr>
                <th>Название проекта</th>
                <th>Задачи</th>
                <th>Клиент</th>
                <th>Планируемое время (мин.)</th>
                <th>Затраченное время (мин.)</th>
                <th>Излишек (мин.)</th>
            </tr>
            <tr class="table-primary">
                <td>Активных проектов {{$project_inform ? count($project_inform) : 0}}</td>
                <td>Планируется затратить времени {{$time_planned}} мин.</td>
                <td>Всего затраченно времени {{$time_spend}} мин.</td>
                <td>Излишек {{$time_planned < $time_spend ? $time_spend - $time_planned : 0}} мин.</td>
                <td></td>
                <td></td>
            </tr>
            @foreach($projects as $project)
                <tr>
                    <td><a href="{{route('project.detail', $project->id)}}">{{$project->name}}</a></td>
                    <td>
                        @foreach($project->tasks as $task)
                            <p class="mb-0"><a href="{{route('task.detail', $task->id)}}">{{$task->name}}</a> {{$task->timeSpend()}} мин.</p>
                        @endforeach
                    </td>
                    <td>{{$project->counterparty->name}}</td>
                    <td>{{$project->time()[0]}}</td>
                    <td>{{$project->time()[1]}}</td>
                    <td>
                        @if($project->time()[0] < $project->time()[1])
                            {{$project->time()[1] - $project->time()[0]}}
                        @else
                            -
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
        {{$projects->links()}}
    @else
        Для генерации отчета нжмине кнопку "Применить"
    @endif
</div>
