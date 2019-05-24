@php
    use Illuminate\Http\Request;
    //Importy dla modeli poszczególnych tabel
    use App\alarm;
    use App\stock;

    $alarms = stock::where('alarm',1)->count();
@endphp

<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title', 'eMicro Warehouse')</title>
        <meta name="description" content="Programista aplikacji webowych, student, pasjonat informatyki. Chcesz dowiedzieć się czegoś więcej o mnie i moich projektach? Zapraszam!">
        <meta name="keywords" content="HTML,CSS,JavaScript,PHP,web,design,michalski,bootstrap,purecss">
        <meta name="author" content="Michał Michalski">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
        <link type="text/css" rel="stylesheet" href="css/style.css"/>
        <link rel="stylesheet" href="css/fontawesome.css"/>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row topmenu sticky-top">
                <div class="col sticky-top">
                        <nav class="navbar navbar-expand-lg sticky-top"> 
                            <a class="navbar-brand" href="/">Logo :: eMicro Warehouse</a>                 
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon">toggle</span>
                            </button>
                            <div class="collapse navbar-collapse justify-content-end nav-pills" id="navbarMenu"> 
                                <div class="navbar-nav">
                                    <a class="nav-link @if ($_SERVER['REQUEST_URI'] === '/') active @endif" href="/">Panel Kontrolny</a>
                                    <a class="nav-link @if ($_SERVER['REQUEST_URI'] == '/stock') active @endif" href="/stock">Magazyn</a>
                                    <a class="nav-link @if ($_SERVER['REQUEST_URI'] == '/reminders') active @endif" href="/reminders">Alarmy @if(isset($alarms) && ($alarms > 0))<sup class="menualarm">{{$alarms}}</sup>@endif</a>
                                    <a class="nav-link @if ($_SERVER['REQUEST_URI'] == '/users') active @endif" href="/users">Użytkownicy</a>
                                    <a class="nav-link @if ($_SERVER['REQUEST_URI'] == '/myaccount') active @endif" href="/myaccount">Moje Konto</a>
                                    <a class="nav-link @if ($_SERVER['REQUEST_URI'] == '/login') active @endif" href="/login">Zaloguj</a>
                                </div>
                            </div>
                         </nav>
                </div>
            </div>
            <div class="row content">
                <div class="col">
                    @yield('content')
                </div>
            </div>
        </div>

        <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="js/functions.js"></script>
    </body>
</html>