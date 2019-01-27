@extends('layout')

@section('css_link')
<link rel="stylesheet" type="text/css" href="/css/month_events_style.css">
@endsection

@section('header_content')
<h1>Evènements du mois</h1>
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

@foreach($Events as $Event)


<div class ="global_container">
<div class="container">
                    <h2>{{$Event->Name_event}}</h2>
                    <div class ="price"><p>{{$Event->Cost_event}}</p></div>
                    <div class="date"><p>{{$Event->Date_event}}</p></div>
                    <div class="recurent">
                    @if($Event->Recurent_event==1)
                    <p>Récurent</p>
                    
                    @else
                    <p>Ponctuel</p>
                    @endif
                    </div>

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