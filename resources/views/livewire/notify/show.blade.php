<div>
    <div class="row">
        @foreach($notify as $not)
            <div class="col-xl-6 col-lg-7 col-md-12">
                <div class="m-1 card border-0 profile-header">
                    <div class="body">
                        <div class="row">
                            <div class="d-flex">
                                @if($users->where('id', $not->data['user_id'])->first()->avatar)
                                    <img style="object-fit: cover" width="80" height="80" class="rounded-circle m-2"
                                         src="{{asset($users->where('id', $not->data['user_id'])->first()->avatar->path)}}"
                                         alt="avatar">
                                @else
                                    <img style="object-fit: cover" width="80" height="80" class="rounded-circle m-2"
                                         src="{{asset('storage/images/imguser.png')}}" alt="avatar">
                                @endif
                                <div class="m-2">
                                    <p class="h5"><a
                                            href="{{route('staff.detail', $users->where('id', $not->data['user_id'])->first()->id)}}">
                                            {{$users->where('id', $not->data['user_id'])->first()->full_name}}</a></p>
                                    <p class="h4">Сообщение: {{$not->data['message']}} в задаче
                                        <a href="{{route('task.detail', $tasks->where('id', $not->data['task_id'])->first()->id)}}">
                                            {{$tasks->where('id', $not->data['task_id'])->first()->name}}</a></p>
                                </div>
                                <button wire:click="markAsRead({{$not}})" type="button" class="btn-close"></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
