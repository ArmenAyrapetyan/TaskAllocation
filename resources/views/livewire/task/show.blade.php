<div>
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
            <tr data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$task->id}}">
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

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop{{$task->id}}" data-bs-backdrop="static" data-bs-keyboard="false"
                 tabindex="-1" aria-labelledby="staticBackdrop{{$task->id}}Label" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdrop{{$task->id}}Label">
                                @if($task->project)
                                    {{$task->project->name}} -
                                @endif {{$task->name}}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
    </table>
</div>
