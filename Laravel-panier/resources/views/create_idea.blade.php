@extends('layout')

@section('css_link')
<link rel="stylesheet" type="text/css" href="/css/create_style.css">
@endsection

@section('header_content')
<h1>Créer une idée</h1>
@endsection

@section('main_content')

<div id="container_nav">
        <ul>
            <li><a href="events_month">Evènements du mois</a></li>
            <li><a href="events_past">Evènements passés</a></li>
            <li ><a href= "create_events">Créer un évènement</a></li>
            <li ><a href= "create_events_idea">Créer une idée</a></li>
            <li ><a href= "hidden_events">Evènements cachés</a></li>
            <li ><a href= "events_idea">Idea Box</a></li>
        </ul>
</div>
<div class="form">
    <form action="" method=post>
    {{ csrf_field() }}
      <input class="field" type="text" name="name_event" placeholder="Nom de l'idée">
      <textarea class="field" name="description_event" id="description" cols="30" rows="10"placeholder="Description de l'idée"></textarea>
      <input class="field" type="submit" value="Envoyer"/> 
    </form>
</div>

@endsection


@section('script_link')

@endsection