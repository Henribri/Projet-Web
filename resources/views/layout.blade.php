<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BDE | Cesi Arras</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Cantarell" rel="stylesheet"/>
        <link rel="icon" type="image/ico" href="/pictures/favicon.ico"/>
        <link rel="stylesheet" type="text/css" href="/css/main_style.css"/>
        
        @yield('css_link')
    </head>

    <body>
        <header>
            <div class="header_bar">
               <div> <a href="home"><img src="/pictures/logo_cesi.png" alt="Logo de CESI" width=100px height=auto /></a></div>

                <div id="banner">
                    @yield('header_content')
                </div>
                <button>&#x2630;</button>
               <div class="container">
                     <button id ="Subscribe"> <img src="/pictures/inscription.png" alt="Photo Cesi"/></button>
                </div>
            </div>


        </header>

        <main>
             @yield('main_content')
        </main>

        <footer>
            <p> © BDE CESI Arras | Tous droits réservés </p>
        </footer> 
        @yield('script_link')
        <script type="text/javascript" src ="C:\Users\Louis\Desktop\Projet_web_laravel\web_project\public\js\subscribe.js"></script>
    </body>

</html>
