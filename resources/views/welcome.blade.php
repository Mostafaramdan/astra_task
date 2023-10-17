<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astra Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <ul class="nav nav-pills nav-justified">
        <li class="nav-item">
            <a class="nav-link {{ request()->is('main_data') ? 'active' : '' }}" href="/main_data">main_data</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('mapping_data') ? 'active' : '' }}" href="/mapping_data">mapping_data</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('matching_data') ? 'active' : '' }}" href="/matching_data">matching_data</a>
        </li>
    </ul>
    @yield('content')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
