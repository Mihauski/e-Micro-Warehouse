@php
    use Illuminate\Http\Request;
        //Importy dla modeli poszczególnych tabel
        use App\alarm;
        use App\stock;
        use App\User;

        if (Auth::check()) {
            $alarms = stock::where('alarm',1)->count();
            $id = Auth::id();
            $role = \App\User::find($id)->role;
        }
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

        <link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"/>
        <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}"/>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row topmenu sticky-top">
                <div class="col sticky-top">
                        <nav class="navbar navbar-expand-lg sticky-top"> 
                            <a class="navbar-brand" href="{{ url('panel') }}">Logo :: eMicro Warehouse</a>                 
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon">toggle</span>
                            </button>
                            <div class="collapse navbar-collapse justify-content-end nav-pills" id="navbarMenu"> 
                                <div class="navbar-nav">
                                    @if(Auth::check())
                                        <a class="nav-link @if (strstr($_SERVER['REQUEST_URI'], 'panel')) active @endif" href="{{ url('panel') }}">Panel Kontrolny</a>
                                        <a class="nav-link @if (strstr($_SERVER['REQUEST_URI'], 'stock')) active @endif" href="{{ url('stock') }}">Magazyn</a>
                                        <a class="nav-link @if (strstr($_SERVER['REQUEST_URI'], 'reminders')) active @endif" href="{{ url('reminders') }}">Alarmy @if(isset($alarms) && ($alarms > 0) && (Auth::check()))<sup class="menualarm">{{$alarms}}</sup>@endif</a>
                                       @if($role == 'admin') <a class="nav-link @if (strstr($_SERVER['REQUEST_URI'], 'users')) active @endif" href="{{ url('users') }}">Użytkownicy</a> @endif
                                        <a class="nav-link @if (strstr($_SERVER['REQUEST_URI'], 'myaccount')) active @endif" href="{{ url('myaccount')}}">Moje Konto</a>
                                    @endif
                                    @guest
                                    <a class="nav-link @if (strstr($_SERVER['REQUEST_URI'], 'login')) active @endif" href="{{ url('login') }}">Zaloguj</a>
                                    @endguest
                                    @if(Auth::check())
                                        <a class="nav-link" href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Wyloguj</a>
                                    @endif
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                         </nav>
                </div>
            </div>
            <div class="row content">
                <div class="col">
                    @yield('content')
                    <div id="footer">
                        {{ date('Y') }} &copy; eMicro Warehouse by <a href="https://michalski.xyz" target="_blank">Michał Michalski</a>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script type="text/javascript" src="{{ asset('js/functions.js') }}"></script>
    </body>
</html>