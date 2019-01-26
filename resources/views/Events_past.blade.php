@extends('layout')

@section('css_link')
<link rel="stylesheet" type="text/css" href="/css/past_events_style.css">
@endsection

@section('header_content')
<h1>Evènements passés</h1>
@endsection

@section('main_content')
<div id="container_nav">
    <div id="nav_bar">
        <ul>
            <li><a href="events_month">Evènements du mois</a></li>
            <li><a href="events_past">Evènements passés</a></li>
            <li id="hidden_tab"><a href= "hidden_events">Evènements cachés</a></li>
        </ul>
    </div>
</div>

@foreach($Events as $Event)


<div class ="global_container">
<div class="container">
            <p>{{$Event->Name_event}}</p>
            <img class= "events" src="/pictures/cesi.jpg" alt="Photo Cesi"/></a>

            
                     <p>{{$Event->Description_event}}</p>
                     <form action="/photos" method="get">
                     {{ csrf_field() }}   
                     <button class ="comment" name="id_event" value="{{$Event->Id_event}}" type="submit">Commenter</button>
                     </form>



                    <form action="/photos" method="post">
                    {{ csrf_field() }}
                    <button class="like"><img src="/pictures/like.png" alt="Like"/></button>
                    </form>
</div>
@endforeach
</div>
@endsection


@section('script_link')

@endsection