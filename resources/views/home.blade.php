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
    <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, in ipsa. Adipisci at et, illo inventore iste minus, mollitia nobis odit placeat praesentium quae sunt. Cumque debitis error placeat possimus!
    </p>
    <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. A autem deserunt dolor, ea eum id in non quo saepe voluptate. Asperiores consequuntur excepturi harum itaque minus quibusdam repellendus voluptates! Obcaecati?
    </p>
    <ul>
        @foreach($tenants as $tenant)
        <li><a href="{{ $tenant->login_url }}">{{ $tenant->domain }}</a></li>
        @endforeach
    </ul>
</body>
</html>
