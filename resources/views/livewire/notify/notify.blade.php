<div>
    @foreach($notifications as $notify)
        <div class="alert alert-success alert-dismissible fade show" style="max-width: 350px" role="alert">
            <p>
                {{$notify->data['message']}} в задаче
                <a href="{{route('task.detail', $notify->data['task_id'])}}" class="alert-link">
                    {{$notify->data['task_name']}}
                </a>
            </p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"
                    wire:click="readNotify({{$notify}})"></button>
        </div>
    @endforeach
</div>
