@extends('layout')

@section('css_link')
<link rel="stylesheet" type="text/css" href="/css/events_style.css">
@endsection

@section('header_content')
<h1>Photos de l'évènement</h1>
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

@foreach($Photos as $Photo)


<div class ="global_container">
<div class="container">
            <img class= "events" src="/pictures/cesi.jpg" alt="Photo Cesi"/></a>
            <button class="like"><img src="/pictures/like.png" alt="Like"/></button>

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