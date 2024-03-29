<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TaskAllocation</title>

    <!-- PUSHER -->
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('136721bd092910ea63a0', {
            cluster: 'eu'
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function (data) {
            window.livewire.emit(data['event'])
        });

        var notify = pusher.subscribe('notify-channel');
        notify.bind('my-notify', function (data) {
            window.livewire.emit(data['event'])
        })
    </script>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
            crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://unpkg.com/imask"></script>
    <link rel="stylesheet" href="{{ URL::asset('/css/style.css') }}">
    @livewireStyles
</head>
<body>

@include('layouts.inc.header')

<main>
    @yield('content')
</main>
@livewireScripts

<script>
    window.addEventListener('closeModal', event => {
        $("#staticBackdrop").modal('hide');
    })
    window.addEventListener('closeModal2', event => {
        $("#staticBackdrop2").modal('hide');
    })
    window.addEventListener('sendNotify', function (message) {
        var not = new Notification("TaskAllocation", {
            body: message
        });

        Notification.requestPermission().then(function (permission) {
            if (permission = "granted") {
                sendNotify();
            } else Notification.requestPermission()
        });
    });
</script>

</body>
</html>
