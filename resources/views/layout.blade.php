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
               <div> <a href="home"><img src="pictures/logo_cesi.png" alt="Logo de CESI"  /></a></div>
                    <div id="statut"><img src="pictures/disconnected.png" alt="Connected"></div>
                    <div id="banner">
                        @yield('header_content')
            </div>
                <nav role="navigation">
                    <div id="menuToggle">
                        <input type="checkbox" />
                        <span></span>
                        <span></span>
                        <span></span>
                        <ul id="menu">
                            <a href="subscribe"><li>Inscription</li></a>
                            <a href="login"><li>Connexion</li></a>
                            <a href=""><li>Déconnexion</li></a>
                            <a href="cesi"><li>Cesi</li></a>
                            <a href="bde"><li>BDE</li></a>
                            <a href="associations"><li>Associations</li></a>
                            <a href="month_events"><li>Evènements</li></a>
                            <a href="#"><li>Mettre à jour évènements</li></a>
                            <a href="suggestion_box"><li>Boîte à idées</li></a>
                            <a href="shop"><li>Boutique</li></a>
                            <a href="pannier"><li>Mon panier</li></a>
                            <a href="legal_notice"><li>Mentions légales</li></a>
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
        <script src ="js\subscribe.js"></script>
    </body>

</html>
