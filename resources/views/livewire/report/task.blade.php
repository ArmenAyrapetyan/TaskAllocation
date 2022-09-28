<div class="m-2">
    @if($tasks)
        <table class="table">
            <tr>
                <th>Название задачи</th>
                <th>Планируемые затраты времени мин.</th>
                <th>Фактические затраты времени мин.</th>
                <th>Излишек</th>
                <th>Трекнутые сообщения</th>
            </tr>
            <tr class="table-primary">
                <td>Кол-во задач: {{count($tasks[0])}}</td>
                <td>Времение по плану: {{$resultReport['sum_time_planned']}}</td>
                <td>Времение потраченно: {{$resultReport['sum_time_spend']}}</td>
                <td>
                    @if((double) $resultReport['sum_time_planned'] < (double) $resultReport['sum_time_spend'])
                        {{(double) $resultReport['sum_time_spend'] - (double) $resultReport['sum_time_planned']}}
                    @else
                        -
                    @endif
                </td>
                <td>

                </td>
            </tr>
            @foreach($taskInfos as $task)
                <tr>
                    <td><a href="{{route('task.detail', $task['task']['id'])}}">{{$task['task']['name']}}</a></td>
                    <td>{{$task['task']['time_planned']}}</td>
                    <td>{{$task['time_spend']}}</td>
                    <td>
                        @if((double) $task['task']['time_planned'] < (double) $task['time_spend'])
                            {{(double) $task['time_spend'] - (double) $task['task']['time_planned']}}
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        @foreach($task['task_time_spends'] as $time)
                            <p class="mb-0">{{$time['message']}} -> {{number_format($time['time_spend']/60, 2, '.', '')}} мин.</p>
                        @endforeach
                    </td>
                </tr>
            @endforeach
            {{$taskInfos->links()}}
        </table>
    @else
        Задайте параметры фильтра и нажмине кнопку "Применить"
    @endif
</div>
