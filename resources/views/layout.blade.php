<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title', 'Domyślny tytuł')</title>
        <meta name="description" content="Programista aplikacji webowych, student, pasjonat informatyki. Chcesz dowiedzieć się czegoś więcej o mnie i moich projektach? Zapraszam!">
        <meta name="keywords" content="HTML,CSS,JavaScript,PHP,web,design,michalski,bootstrap,purecss">
        <meta name="author" content="Michał Michalski">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">

        <style type="text/css">
            body {
                background:grey;
            }
        </style>

        <!-- <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
        <link type="text/css" rel="stylesheet" href="css/style.css"/> -->
    </head>
    <body>
    {{-- To jest przykładowy komentarz w Blade, używamy go, jeśli komentujemy coś co może zostać przetworzone jak np. @ --}}
    {{-- @yield oznacza nazwę bloku, która zostanie wstawiona w tym miejscu --}}
    @yield('content')

    </body>
</html>