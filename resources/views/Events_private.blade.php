@extends('layout')

@section('css_link')
<link rel="stylesheet" type="text/css" href="/css/hidden_events_style.css">
@endsection

@section('header_content')
<h1>Evènements cachés</h1>
@endsection

@section('main_content')
<!--Navigation bar-->
<div id="container_nav">
        <ul class="nav_bar">
        <li><a href="events_month">Evènements du mois</a></li>
            <li><a href="events_past">Evènements passés</a></li>
            <li ><a href= "create_events">Créer un évènement</a></li>
            <li ><a href= "create_events_idea">Créer une idée</a></li>
            <li ><a href= "hidden_events">Evènements cachés</a></li>

        </ul>
</div>

@foreach($Events as $Event)


<div class ="global_container"><!--global_container allow to seperate hidden event -->
<div class="container"><!--container allow to put informations hidden event -->
                        <h3>{{$Event->Name_event}}</h3>
            <img class= "events" src="{{$Event->Image}}" alt="Photo Cesi"/></a>
                     <p>{{$Event->Description_event}}</p>

                     </div>
@endforeach

@endsection


@section('script_link')

@endsection