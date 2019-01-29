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
                    <img src="pictures/disconnected.png" alt="Connected">
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
                                <li><a href="subscribe">Inscription</a></li>
                                <li><a href="login">Connexion</a></li>
                                <li><a href="#">Déconnexion</a></li>
                                <li><a href="cesi">Cesi</a></li>
                                <li><a href="bde">BDE</a></li>
                                <li><a href="associations">Associations</a></li>
                                <li><a href="month_events">Evènements</a></li>
                                <li><a href="#">Mettre à jour évènements</a></li>
                                <li><a href="suggestion_box">Boîte à idées</a></li>
                                <li><a href="shop">Boutique</a></li>
                                <li><a href="pannier">Mon panier</a></li>
                                <li><a href="legal_notice">Mentions légales</a></li>
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
