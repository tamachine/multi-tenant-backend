<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nave Homepage</title>
</head>
<body>
    <h2>Acceso paneles de administración de la Nave</h2>
    <ul>
        @foreach($tenants as $tenant)
        <li><a href="{{ $tenant->login_url }}">{{ $tenant->domain }}</a></li>
        @endforeach
    </ul>
</body>
</html>
