<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="shortcut icon" href="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg" type="image/x-icon">
    <title>@yield('title')</title>
</head>
<body>
    @yield('content')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('js')
</body>
</html>
