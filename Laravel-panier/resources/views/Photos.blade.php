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
            <li ><a href= "create_event">Créer un évènement</a></li>
            <li ><a href= "create_idea">Créer une idée</a></li>
            <li ><a href= "hidden_events">Evènements cachés</a></li>
        </ul>
</div>


@foreach($Photos as $Photo)


<div class ="global_container">
<div class="container">
            <img class= "events" src="/pictures/cesi.jpg" alt="Photo Cesi"/></a>


            <form action="/like" method="post">
            {{ csrf_field() }}
                <button class="like" name="photo" value="{{$Photo->Id_photo}}"><img src="/pictures/like.png" alt="Like"/></button>
            </form>

            <form action="" method="post">
            {{ csrf_field() }}
                        <div> <input id="comment_text" type="text"  size= "30" name = "comment_comment" maxlenght="500" placeholder="Ajouter un commentaire"/>
                        <button class ="comment" type='submit' name='id_photo' value="{{$Photo->Id_photo}}">Commenter</button>

            </form>


            
            @foreach($Comments as $Comment)
                        @if($Comment->Id_photo==$Photo->Id_photo)
                     <p>{{$Comment->Comment_comment}}</p>

                        @endif
            @endforeach
</div>

</div>
@endforeach
@endsection


@section('script_link')

@endsection