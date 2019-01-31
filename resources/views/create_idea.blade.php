@extends('layout')

@section('css_link')
<link rel="stylesheet" type="text/css" href="/css/create_style.css">
@endsection

@section('header_content')
<h1>Créer une idée</h1>
@endsection

@section('main_content')
<!--Navigation bar-->
<div id="container_nav">
        <ul class="nav_bar">
            <li><a href="month_events">Evènements du mois</a></li>
            <li><a href="past_events">Evènements passés</a></li>
            <li><a href= "create_event">Créer un évènement</a></li>
            <li><a href= "create_idea">Créer une idée</a></li>
            <li><a href= "hidden_events">Evènements cachés</a></li>
        </ul>
</div>

<!--Form for the create idea -->
<div class="form">
    <form>
        <div class="input">
            <input class="field" type="text" name="idea_name" placeholder="Nom de l'idée" required>
            <input class="field" type="text" name="idea_date" placeholder="Date de l'idée"required>
            <textarea class="field" name="description" id="description"  placeholder="Description de l'idée" required></textarea>
            <input class="field"id="number" type="text" name="recurence" placeholder="Nombre de récurence" required >
            <select class="field" id="state" name="state">
                <option value="public">Publique</option>
                <option value="private">Privée</option>
            </select>
            <input class="field" id="type"type="text" name="public_event" placeholder="Type d'idée" required>
        </div>
        <input class="field" type="submit" value="Envoyer"/> 
    </form>
</div>

@endsection


@section('script_link')

@endsection