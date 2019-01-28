@extends('layout')

@section('css_link')
<link rel="stylesheet" type="text/css" href="/css/event-1_style.css">
@endsection

@section('header_content')
<h1>Evènements du mois</h1>
@endsection

@section('main_content')

<div id="container_nav">
        <ul>
            <li><a href="events_month">Evènements du mois</a></li>
            <li><a href="events_past">Evènements passés</a></li>
            <li ><a href= "create_event">Créer un évènement</a></li>
            <li ><a href= "create_idea">Créer une idée</a></li>
            <li ><a href= "hidden_events">Evènements cachés</a></li>
        </ul>
</div>

<div class="import">
                <label for="file" class="label-file">Choisir une image</label>
                <input id="file" class="input-file" type="file">
            </div>
@foreach($Photos as $Photo)


<div class ="global_container">
<div class="container">
            <img class= "events" src="/pictures/cesi.jpg" alt="Photo Cesi"/></a>
            <div class="import">
                <label for="file" class="label-file">Choisir une image</label>
                <input id="file" class="input-file" type="file">
            </div>

            <div class="button">

                <form method='post' action=''> 
                            <textarea name="comment_comment" cols="30" rows="3"placeholder="Taper votre commentaire"></textarea>
                            <button class="comment" name="id_photo" value="{{$Photo->Id_photo}}">Commenter</button>
                        </div>
                </form>
                <form method='post' action='/like'>
                        <div class="button">
                            <button class="like"> <img src="/pictures/like.png" alt="Cloche notifié"/></button>
                        </div>
                </form>

            
            @foreach($Comments as $Comment)
                        @if($Comment->Id_photo==$Photo->Id_photo)
                        <div class ="comments">


                        <p>{{$Comment->Comment_comment}}</p>
                        </div>
                        <form action="/notify" method="post">
                         {{ csrf_field() }}
                            <button class="notify" name='id_event' value='{{$Comment->Id_comment}}'> <img src="/pictures/bell.png" alt="Cloche notifié"/></button>
                        </form>
                        @endif
            @endforeach
</div>

</div>
@endforeach
@endsection


@section('script_link')

@endsection