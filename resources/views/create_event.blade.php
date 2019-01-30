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
            <li ><a href= "events_private">Evènements cachés</a></li>
            <li ><a href= "events_idea">Idea Box</a></li>
        </ul>
</div>

<div class="form">
@if($Idea)
    <form action='/upgrade_event' method='post' enctype="multipart/form-data">
    {{ csrf_field() }}
      <input class="field" type="text" name="name_event" placeholder="{{$Idea->Name_event}}" value="{{$Idea->Name_event}}">
            @if($errors->has('name_event'))
              {{$errors->first('name_event')}}
            @endif
      <input class="field" type="number" name="cost_event" placeholder="Prix de lévènement">
            @if($errors->has('cost_event'))
              {{$errors->first('cost_event')}}
            @endif
      <input class="field" type="date" name="date_event" placeholder="Date de l'évènement">
      @if($errors->has('date_event'))
              {{$errors->first('date_event')}}
            @endif
      
      <textarea class="field" name="description_event" id="description_event" cols="30" rows="10"placeholder="{{$Idea->Description_event}}" value="{{$Idea->Description_event}}">{{$Idea->Description_event}}</textarea>
      @if($errors->has('description_event'))
              {{$errors->first('description_event')}}
            @endif

      <select class="field" id="state" name="recurent_event">
        <option value="1">Récurent</option>
        <option value="0">Ponctuel</option>
      </select>
            @if($errors->has('recurent_event'))
              {{$errors->first('recurent_event')}}
            @endif

      <select class="field" id="state" name="public_event">
        <option value="1">Publique</option>
        <option value="0">Privée</option>
      </select>
            @if($errors->has('public_event'))
              {{$errors->first('public_event')}}
            @endif

      <input class="field" type="file" name="image_event" value="">
      @if($errors->has('image_event'))
              {{$errors->first('image_event')}}
            @endif


      <!-- Rajouter import d'image -->

      <button class="field" type="submit" name='id_event' value="{{$Idea->Id_event}}">Envoyer </button>
    </form>
  @else

  <form action='' method='post'  enctype="multipart/form-data">
    {{ csrf_field() }}
      <input class="field" type="text" name="name_event" placeholder="Nom de lévènement">
      @if($errors->has('name_event'))
              {{$errors->first('name_event')}}
            @endif

      <input class="field" type="number" name="cost_event" placeholder="Prix de lévènement">
      @if($errors->has('cost_event'))
              {{$errors->first('cost_event')}}
            @endif

      <input class="field" type="date" name="date_event" placeholder="Date de l'évènement">
      @if($errors->has('date_event'))
              {{$errors->first('date_event')}}
            @endif

      <textarea class="field" name="description_event" id="description" cols="30" rows="10"placeholder="Description de l'évènements"></textarea>
      @if($errors->has('description_event'))
              {{$errors->first('description_event')}}
            @endif

      
      <select class="field" id="state" name="recurent_event">
        <option value="1">Récurent</option>
        <option value="0">Ponctuel</option>
      </select>
      @if($errors->has('recurent_event'))
              {{$errors->first('recurent_event')}}
            @endif


      <select class="field" id="state" name="public_event">
        <option value="1">Publique</option>
        <option value="0">Privée</option>
      </select>
      @if($errors->has('public_event'))
              {{$errors->first('public_event')}}
            @endif


      <input class="field" type="file" name="image_event" value="">
      @if($errors->has('image_event'))
              {{$errors->first('image_event')}}
            @endif


      <!-- Rajouter import d'image -->

      <input class="field" type="submit" value="Envoyer"/> 
    </form>


  @endif




</div>



@endsection


@section('script_link')

@endsection