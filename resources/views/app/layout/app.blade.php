<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Super Gestão - @yield('titulo')</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>

<body>
    @include('app.layout._partes.topo')
    @yield('conteudo')

</body>

</html>
