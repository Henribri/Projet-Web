@extends('layout')

@section('css_link')
<link rel="stylesheet" type="text/css" href="/css/month_events_style.css">
@endsection

@section('header_content')
<h1>Evènements du mois</h1>
@endsection

@section('main_content')

<div id="container_nav">
    <ul class="nav_bar">    
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
@if($errors->has('info'))
                    <div class="information" name="info">
                        <p>{{$errors->first('info')}}</p>
                    </div>
                    @endif
@foreach($Events as $Event)


<div class ="global_container"><!--global_container allow to place event -->

<div class="container"> <!--container allow to put informations of event -->
                    <h2>{{$Event->Name_event}}</h2>

                    <img class= "events" src="{{$Event->Image}}" alt="Photo Cesi"/></a>

                    <div class="informations"><!--container of informations -->
                    
                    <div class ="price"><p>{{$Event->Cost_event}}</p></div>
                    <div class="date"><p>{{$Event->Date_event}}</p></div>
                    <div class="recurent">
                    @if($Event->Recurent_event==1)
                    <p>Récurent</p>
                    
                    @else
                    <p>Ponctuel</p>
                    @endif
                    </div>
                    </div>


                     <p>{{$Event->Description_event}}</p>
                     
                     <div class="button">
                     <form action="" method="post">
                        {{ csrf_field() }}
                        <button class="form" name="id_event" value="{{$Event->Id_event}}"> <img src="/pictures/form.png" alt="Photo Cesi"/></button>
                    </form>





                    @if(session()->get('Status_user')=='Tuteur')
                    <form action="/notify" method="post">
                         {{ csrf_field() }}
                        <button class="notify" name='id_event' value='{{$Event->Id_event}}'><img src="/pictures/bell.png" alt="Cloche notifié"/></button>
                    </form>
                    @endif

                    @if(session()->get('Status_user')=='BDE')
                    <form action="/pdf_event" method="post">
                    {{ csrf_field() }}
                    <button class ="pdf" name="id_event" value="{{$Event->Id_event}}"><img src="/pictures/pdf.png" alt="Télécharger pdf"/></button>
                    </form>
                    @endif
                    </div>
                    

</div>

</div>
@endforeach
@endsection


@section('script_link')

@endsection