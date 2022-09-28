<div class="m-2">
    @if(count($resultInfo['result']) > 0)
        {{$result->links()}}
        <table class="table">
            <tr>
                <th>Сотрудник</th>
                <th>Задачи и сообщения</th>
                <th>Планируемое время (мин.)</th>
                <th>Затраченное время (мин.)</th>
                <th>План-факт%</th>
            </tr>
            <tr class="table-primary">
                <td></td>
                <td></td>
                <td>{{$resultInfo['all_time_planned']}}</td>
                <td>{{$resultInfo['all_time_spended']}}</td>
                <td>{{number_format($resultInfo['all_time_spended']/$resultInfo['all_time_planned'], 4, '.', '')*100}}</td>
            </tr>
            @foreach($result as $res)
                <tr>
                    <td>{{$res['user']['first_name']}} {{$res['user']['last_name']}} {{$res['user']['third_name']}}</td>
                    <td>
                        @if(key_exists('task', $res))
                            @foreach($res['task'] as $task)
                                <a href="">{{$task['info']['name']}}</a>
                                <ul class="mb-0">
                                    @foreach($task['messages'] as $message)
                                        <li>{{$message['message']}}</li>
                                    @endforeach
                                </ul>
                            @endforeach
                        @else
                            Нет треков
                        @endif
                    </td>
                    <td>{{$res['time_planned']}}</td>
                    <td>{{$res['time_spend']}}</td>
                    <td>{{number_format($res['time_spend']/$res['time_planned'], 4, '.', '')*100}}</td>
                </tr>
            @endforeach
        </table>
    @else
        Задайте параметры и нажмите применить
    @endif
</div>
