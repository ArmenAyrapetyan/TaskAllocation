<div class="ms-1">
    <h2>{{$info->dictionary->name}}</h2>
    <p>Клиент: @if($counterparty) <a href="#">{{$counterparty->name}}</a> @else Без клиента @endif</p>
    <p>Проект: @if($project)<a href="#">{{$project->name}}</a>@elseБез проекта @endif</p>
    <p>{{$info->information}}</p>
</div>
