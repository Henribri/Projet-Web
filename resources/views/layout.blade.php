<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BDE | Cesi Arras</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Cantarell" rel="stylesheet"/>
        <link rel="icon" type="image/ico" href="pictures/favicon.ico"/>
        <link rel="stylesheet" type="text/css" href="css/main_style.css"/>
        @yield('css_link')
    </head>

    <body>
        <header>
            <div class="header_bar">
                <div> 
                   <a href="home"><img src="pictures/logo_cesi.png" alt="Logo de CESI"  /></a>
                </div>
                <div id="statut">
                @if(session()->get('Status_user'))
                    <img src="pictures/connected.png" alt="Connected">
                @else
                <img src="pictures/disconnected.png" alt="Connected">
                @endif
                </div>
                    <div id="banner">
                        @yield('header_content')
            </div>
                <nav>
                        <div id="menuToggle">
                            <input type="checkbox" />
                            <span></span>
                            <span></span>
                            <span></span>
                            <ul id="menu">
                                <li><a href="/subscribe">Inscription</a></li>
                                <li><a href="/connexion">Connexion</a></li>
                                <li><a href="/deconnexion">Déconnexion</a></li>
                                <li><a href="/events_month">Evènements</a></li>
                                <li><a href="/maj_events">Mettre à jour évènements</a></li>
                                <li><a href="/events_idea">Boîte à idées</a></li>
                                <li><a href="shop">Boutique</a></li>
                                <li><a href="/legal_notice">Mentions légales</a></li>
                                <li><a href="/change_status">Administration</a></li>
                            </ul>
                        </div>
                    </nav> 
            </div>
        </header>

        <main>
             @yield('main_content')
        </main>

        <footer>
            <p> © BDE CESI Arras | Tous droits réservés </p>
        </footer> 
        @yield('script_link')
    </body>

</html>
