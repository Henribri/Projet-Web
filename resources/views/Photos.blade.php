@extends('layout')

@section('css_link')
<link rel="stylesheet" type="text/css" href="/css/events_style.css">
@endsection

@section('header_content')
<h1>Evènements du mois</h1>
@endsection

@section('main_content')
<div id="container_nav">
    <div id="nav_bar">
        <ul>
            <li><a href="month_events">Evènements du mois</a></li>
            <li><a href="past_events">Evènements passés</a></li>
            <li id="hidden_tab"><a href= "hidden_events">Evènements cachés</a></li>
        </ul>
    </div>
</div>

@foreach($Photos as $Photo)


<div class ="global_container">
<div class="container">
            <img class= "events" src="/pictures/cesi.jpg" alt="Photo Cesi"/></a>
                     <p>{{$Photo->Description_event}}</p>
                     <form action="" method="post">
                        {{ csrf_field() }}
                        <button class="form" name="id_event" value="{{$Event->Id_event}}"> <img src="/pictures/form.png" alt="Photo Cesi"/></button>
                    </form>
                    <button class ="comment">Commenter</button>
                    <button class="like"><img src="/pictures/like.png" alt="Like"/></button>
                  
                    @if($comments->Id_photo==$Photo->Id_photo)
                    <img class= "events" src="/pictures/cesi.jpg" alt="Photo Cesi"/></a>

                            <p>{{$comments->Comment_comment}}</p>

                        <div class="container_button"></div>
                            <button id ="comment">Commenter</button>
                            <button id ="like"><img src="/pictures/like.png" alt="Like"/></button>
                            <div> <input id="comment_text" type="text" id= "comment" size= "30" name = "Comment" maxlenght="500" placeholder="Ajouter un commentaire"/>
                        </div>
                               
                    @endif
</div>
@endforeach
</div>
@endsection


@section('script_link')

@endsection