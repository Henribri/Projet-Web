@extends('layout')

@section('css_link')
<link rel="stylesheet" type="text/css" href="/css/month_events_style.css">
@endsection

@section('header_content')
<h1>Evènements du mois</h1>
@endsection

@section('main_content')

<div id="container_nav">


    <div id="nav_bar">
        <ul>
            <li><a href="events_month">Evènements du mois</a></li>
            <li><a href="events_past">Evènements passés</a></li>
            <li ><a href= "create_event">Créer un évènement</a></li>
            <li ><a href= "create_idea">Créer une idée</a></li>
            <li ><a href= "hidden_events">Evènements cachés</a></li>
        </ul>
    </div>
</div>

@foreach($Events as $Event)


<div class ="global_container">
<div class="container">
                    <h2>{{$Event->Name_event}}</h2>
                    <div class ="price"><p>5€</p></div>
                    <div class="date"><p>12/5/2018</p></div>
                    <div class="recurent"><p>Une fois par mois</p></div>

            <img class= "events" src="/pictures/cesi.jpg" alt="Photo Cesi"/></a>
                     <p>{{$Event->Description_event}}</p>
                     <form action="" method="post">
                        {{ csrf_field() }}
                        <button class="form" name="id_event" value="{{$Event->Id_event}}"> <img src="/pictures/form.png" alt="Photo Cesi"/></button>
                    </form>


</div>
@endforeach
</div>
@endsection


@section('script_link')

@endsection