<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title', 'Domyślny tytuł')</title>
        <meta name="description" content="Programista aplikacji webowych, student, pasjonat informatyki. Chcesz dowiedzieć się czegoś więcej o mnie i moich projektach? Zapraszam!">
        <meta name="keywords" content="HTML,CSS,JavaScript,PHP,web,design,michalski,bootstrap,purecss">
        <meta name="author" content="Michał Michalski">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">

        <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
        <link type="text/css" rel="stylesheet" href="css/style.css"/>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row topmenu sticky-top">
                <div class="col sticky-top">
                        <nav class="navbar navbar-expand-lg sticky-top"> 
                            <a class="navbar-brand" href="#">Navbar</a>                 
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon">toggle</span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarMenu"> 
                                <div class="navbar-nav">      
                                    <a class="nav-link active" href="index.html">Strona Główna</a>
                                    <a class="nav-link" href="o-mnie.html">O Mnie</a>
                                    <a class="nav-link" href="moje-projekty.html">Moje Projekty</a>
                                    <a class="nav-link" href="moje-cele.html">Moje cele</a>
                                    <a class="nav-link" href="kontakt.html">Kontakt</a>
                                </div>
                            </div>
                         </nav>
                </div>
            </div>
            <div class="row content">
                <div class="col">
            @yield('content')
            <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
        <!-- <script type="text/javascript" src="js/functions.js"></script> -->
    </body>
</html>