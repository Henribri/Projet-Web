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
                     <button id ="Subscribe" onclick="open_subscribe()"> <img src="/pictures/inscription.png" alt="Photo Cesi"/></button>
                </div>
            </div>


        </header>

        <main>
        <div class ="bg-modal">
            <div class ="modal-content">
                <div class="close">+</div>
                    <p>Inscription</p>
                <form method='post' action="/inscription">
                {{ csrf_field() }}
                    <input class ="text" type ="email" name = "email_user" maxlength="255" placeholder = "E-mail">
                    @if($errors->has('email_user'))
                        {{$errors->first('email_user')}}
                    @endif
                    <input class ="text" type ="text" name = "name_user" maxlength="25" placeholder = "Nom">
                    @if($errors->has('name_user'))
                        {{$errors->first('name_user')}}
                    @endif
                    <input class ="text" type ="text" name = "surname_user" maxlength="25" placeholder = "Prénom">
                    @if($errors->has('surname_user'))
                        {{$errors->first('surname_user')}}
                    @endif
                    <input class ="text" type ="text" name = "localisation_user" maxlength="25" placeholder = "Campus">
                    @if($errors->has('localisation_user'))
                        {{$errors->first('localisation_user')}}
                    @endif
                    <input class ="text" type ="password" name = "password_user" maxlength="100" placeholder = "Mot de passe">
                    @if($errors->has('password_user'))
                        {{$errors->first('password_user')}}
                    @endif
                    <input class ="text" type ="password" name = "password_user_confirmation" maxlength="100" placeholder = "Mot de passe">
                    @if($errors->has('password_user_confirmation'))
                        {{$errors->first('password_user_confirmation')}}
                    @endif
                    <input id="submit"type = "submit" value="M'inscrire">
                    <input id="submit"type = "submit" value="Se connecter">
                </form>
            </div>
        </div>

             @yield('main_content')
        </main>

        <footer>
            <p> © BDE CESI Arras | Tous droits réservés </p>
        </footer> 
        @yield('script_link')
        <script type="text/javascript" src ="js\subscribe.js"></script>
    </body>

</html>
