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
            @if(session()->get('Status_user')=='BDE')
            <li ><a href= "create_events">Créer un évènement</a></li>
            @endif
            <li ><a href= "create_events_idea">Créer une idée</a></li>
            @if(session()->get('Status_user')=='BDE')
            <li ><a href= "events_private">Evènements cachés</a></li>
            @endif

        </ul>
</div>
<div class="form">
    <form action="" method=post>
    {{ csrf_field() }}
      <input class="field" type="text" name="name_event" placeholder="Nom de l'idée">
        @if($errors->has('name_event'))
            {{$errors->first('name_event')}}
        @endif
      <textarea class="field" name="description_event" id="description" cols="30" rows="10"placeholder="Description de l'idée"></textarea>
        @if($errors->has('description_event'))
            {{$errors->first('description_event')}}
        @endif
      <input class="field" type="submit" value="Envoyer"/> 
    </form>
</div>

@endsection


@section('script_link')

@endsection