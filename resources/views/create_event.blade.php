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
            <li><a href="events_month">Evènements du mois</a></li>
            <li><a href="events_past">Evènements passés</a></li>
            <li ><a href= "create_events">Créer un évènement</a></li>
            <li ><a href= "create_events_idea">Créer une idée</a></li>
            <li ><a href= "hidden_events">Evènements cachés</a></li>
            <li ><a href= "events_idea">Idea Box</a></li>
        </ul>
</div>

<div class="form">
@if($Ideas)
    <form action='/upgrade_event' method='post'>
    {{ csrf_field() }}
      <input class="field" type="text" name="name_event" placeholder="{{$Ideas[0]->Name_event}}" value="{{$Ideas[0]->Name_event}}">
      <input class="field" type="number" name="cost_event" placeholder="Prix de lévènement">
      <input class="field" type="date" name="date_event" placeholder="Date de l'évènement">
      <textarea class="field" name="description_event" id="description_event" cols="30" rows="10"placeholder="{{$Ideas[0]->Description_event}}" value="{{$Ideas[0]->Description_event}}">{{$Ideas[0]->Description_event}}</textarea>
      <select class="field" id="state" name="recurent_event">
        <option value="1">Récurent</option>
        <option value="0">Ponctuel</option>
      </select>

      <select class="field" id="state" name="public_event">
        <option value="1">Publique</option>
        <option value="0">Privée</option>
      </select>

      <!-- Rajouter import d'image -->

      <button class="field" type="submit" name='id_event' value="{{$Ideas[0]->Id_event}}">Envoyer </button>
    </form>
  @else

  <form action='' method='post'>
    {{ csrf_field() }}
      <input class="field" type="text" name="name_event" placeholder="Nom de lévènement">
      <input class="field" type="number" name="cost_event" placeholder="Prix de lévènement">
      <input class="field" type="date" name="date_event" placeholder="Date de l'évènement">
      <textarea class="field" name="description_event" id="description" cols="30" rows="10"placeholder="Description de l'évènements"></textarea>
      <select class="field" id="state" name="recurent_event">
        <option value="1">Récurent</option>
        <option value="0">Ponctuel</option>
      </select>

      <select class="field" id="state" name="public_event">
        <option value="1">Publique</option>
        <option value="0">Privée</option>
      </select>

      <!-- Rajouter import d'image -->

      <input class="field" type="submit" value="Envoyer"/> 
    </form>


  @endif




</div>



@endsection


@section('script_link')

@endsection