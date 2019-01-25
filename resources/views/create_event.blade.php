@extends('layout')

@section('css_link')
<link rel="stylesheet" type="text/css" href="/css/create_style.css">
@endsection

@section('header_content')
<h1>Créer un évènement</h1>
@endsection

@section('main_content')
<div id="form">
    <form>
    <input id="name" type="text" name="event_name" placeholder="Nom de lévènement">
    <input id="" type="text" name="event_name" placeholder="Date de lévènement">
    <input id="" type="text" name="comment" placeholder="Description de l'évènements">
    <input id="" type="text" name="recurence" placeholder="Nombre de récurence">
    <select id="country" name="country">
      <option value="public">Publique</option>
      <option value="private">Privée</option>
    <input id="" type="text" name="public_event" placeholder="Type de l'évènement">
    </form>
</div>

@endsection


@section('script_link')

@endsection