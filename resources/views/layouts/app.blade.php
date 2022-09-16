<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TaskAllocation</title>

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
</script>

</body>
</html>
