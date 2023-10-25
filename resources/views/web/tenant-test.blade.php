<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ app('currentTenant')->long_name }}</title>

</head>
<body>
<ul>
    <li>Name: {{ app('currentTenant')->name }}</li>
    <li>Long name: {{ app('currentTenant')->long_name }}</li>
    <li>Domain: {{ app('currentTenant')->domain }}</li>
    <li>Database: {{ app('currentTenant')->database }}</li>
</ul>
<a href="{{ (app('currentTenant')->login_url) }}">Login</a>
</body>
</html>
