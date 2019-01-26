@extends('layout')

@section('css_link')
<link rel="stylesheet" type="text/css" href="/css/hidden_events_style.css">
@endsection

@section('header_content')
<h1>Evènements cachés</h1>
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

@foreach($Events as $Event)


<div class ="global_container">
<div class="container">
            <img class= "events" src="/pictures/cesi.jpg" alt="Photo Cesi"/></a>
                     <p>{{$Event->Description_event}}</p>
                    <button class="form"> <img src="/pictures/form.png" alt="Photo Cesi"/></button>
                    <button class ="comment">Commenter</button>
                    <button class="like"><img src="/pictures/like.png" alt="Like"/></button>
</div>
@endforeach
</div>
@endsection


@section('script_link')

@endsection