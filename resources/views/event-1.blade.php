@extends('layout')

@section('css_link')
<link rel="stylesheet" type="text/css" href="/css/event-1_style.css">
@endsection

@section('header_content')
<h1>Evènements</h1>
@endsection

@section('main_content')

<div id="container_nav">
    <div id="nav_bar">
        <ul>
            <li><a href="month_events">Evènements du mois</a></li>
            <li><a href="past_events">Evènements passés</a></li>
            <li id="hidden_tab"><a href= "hidden_events">Evènements cachés</a></li>
        </ul>
    </div>
</div>

<div class ="global_container">
    <div class="container">
        <h2>Titre de lévènement</h2>
            <img class= "events" src="/pictures/cesi.jpg" alt="Photo Cesi"/></a>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua.
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat.
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                    nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                    mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua.
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat.
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                    nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                    mollit anim id est laborum.</p>

                        <div class="container_button"></div>
                            <button id ="comment">Commenter</button>
                            <button id ="like"><img src="/pictures/like.png" alt="Like"/></button>
                            <div> <input id="comment_text" type="text" id= "comment" size= "30" name = "Comment" maxlenght="500" placeholder="Ajouter un commentaire"/>
                        </div>
                        
</div>
</div>
@endsection


@section('script_link')

@endsection