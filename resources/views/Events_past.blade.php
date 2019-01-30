@extends('layout')

@section('css_link')
<link rel="stylesheet" type="text/css" href="css/past_events_style.css">
@endsection

@section('header_content')
<h1>Evènements passés</h1>
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



<div class ="global_container">
@foreach($Events as $Event)

<div class="container">

            @if(session()->get('Status_user')=='BDE')
            <div class="delete">
            <form action="/delete_past" method="post">
            {{ csrf_field() }}  
                <button class="delete_button" name="id_event" value="{{$Event->Id_event}}"> <img src="/pictures/delete.png" alt="Supprimer l'événement"/></button>
            </form>
            </div>
            <p>{{$Event->Name_event}}</p>


            @endif
            <img class= "events" src="{{$Event->Image}}" alt="Photo Cesi"/></a>

            
                     <p>{{$Event->Description_event}}</p>
                     <div class="button">
                     <form action="/photos" method="get">
                     {{ csrf_field() }}   
                     <button class ="event-1" name="id_event" value="{{$Event->Id_event}}" type="submit">Voir les photos</button>
                     </form>

                     @if(session()->get('Status_user')=='Tuteur')
                     <form action="/notify" method="post">
                         {{ csrf_field() }}

                        <button class="notify" name='id_event' value='{{$Event->Id_event}}'> <img src="/pictures/bell.png" alt="Cloche notifié"/></button>
                    </form>
                    @endif
                    </div>
</div>
@endforeach
</div>
@endsection


@section('script_link')

@endsection