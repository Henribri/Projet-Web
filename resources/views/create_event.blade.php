@extends('layout')

@section('css_link')
<link rel="stylesheet" type="text/css" href="/css/create_style.css">
@endsection

@section('header_content')
<h1>Créer un évènement</h1>
@endsection

@section('main_content')

<div id="container_nav">
        <ul>
            <li><a href="month_events">Evènements du mois</a></li>
            <li><a href="past_events">Evènements passés</a></li>
            <li ><a href= "create_event">Créer un évènement</a></li>
            <li ><a href= "create_idea">Créer une idée</a></li>
            <li ><a href= "hidden_events">Evènements cachés</a></li>
        </ul>
</div>

<div class="form">
    <form>
      <input class="field" type="text" name="event_name" placeholder="Nom de lévènement">
      <input class="field" id="type"type="text" name="public_event" placeholder="Type de l'évènement">
      <input class="field" type="text" name="event_date" placeholder="Date de l'évènement">
      <input class="field"id="number" type="text" name="recurence" placeholder="Nombre de récurence" rows="5" cols="40" >
      <textarea class="field" name="description" id="description" cols="30" rows="10"placeholder="Description de l'évènements"></textarea>
      <select class="field" id="state" name="state">
        <option value="public">Publique</option>
        <option value="private">Privée</option>
      </select>
      <label for="file" class="label-file">Choisir une image</label>
      <input id="file" class="input-file" type="file">  
      <input class="field" type="submit" value="Envoyer"/>
    </form>
    
</div>

@endsection


@section('script_link')

@endsection