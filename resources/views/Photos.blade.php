@extends('layout')

@section('css_link')
<link rel="stylesheet" type="text/css" href="/css/event-1_style.css">
@endsection

@section('header_content')
<h1>Photos</h1>
@endsection

@section('main_content')

<div id="container_nav">
        <ul>
            <li><a href="events_month">Evènements du mois</a></li>
            <li><a href="events_past">Evènements passés</a></li>
            @if(session()->get('Status_user')=='BDE')
            <li ><a href= "create_events">Créer un évènement</a></li>
            @endif
            <li ><a href= "create_idea">Créer une idée</a></li>
            @if(session()->get('Status_user')=='BDE')
            <li ><a href= "events_private">Evènements cachés</a></li>
            @endif
        </ul>
</div>


<div class="import">
<label for="file" class="label-file">Choisir une image</label>
            <form action="/post_photo" method='post' enctype="multipart/form-data">
            {{ csrf_field() }}
                <input id="file" class="input-file" type="file" name="photo">
                <button id="file2"type="submit" name="id_event" value="{{$Id_event}}">Poster</button>
            </form>
</div>
@foreach($Photos as $Photo)


<div class ="global_container">
<div class="container">
            <img class= "events" src="{{$Photo->Image}}" alt="Photo Cesi"/>


            <div class="button">

                <form method='post' action=''> 
                
                            <textarea name="comment_comment" cols="30" rows="3"placeholder="Taper votre commentaire"></textarea>
                            @if($errors->has('comment_comment'))
                                {{$errors->first('comment_comment')}}
                            @endif
                            <button class="comment" name="id_photo" value="{{$Photo->Id_photo}}">Commenter</button>
                            </form>
                        </div>


                        <div class="button">
                        <form method='post' action='/like'>
                        {{ csrf_field() }}
                            <button class="like" name='id_photo' value='{{$Photo->Id_photo}}'> <img src="/pictures/like.png" alt="Cloche notifié"/></button>
                        </form>





                        @if(session()->get('Status_user')=='Tuteur')
                        <form method='post' action='/notify_photo'>
                        {{ csrf_field() }}
                            <button class="notify" name='id_photo' value='{{$Photo->Id_photo}}'> <img src="/pictures/bell.png" alt="Cloche notifié"/></button>
                        </form>
                        @endif
                        </div>
                        
                        @if($errors->has('info'))
                    <div class="info" name="info">
                        <p>{{$errors->first('info')}}</p>
                    </div>
                    @endif
            
            @foreach($Comments as $Comment)
                        @if($Comment->Id_photo==$Photo->Id_photo)
                        <div class="button comments">
                        <p>{{$Comment->Comment_comment}}</p>

                        @if(session()->get('Status_user')=='Tuteur')
                        <form action="/delete_com" method="post">
                         {{ csrf_field() }}
                            <button class="notify" name='id_comment' value='{{$Comment->Id_comment}}'> <img src="/pictures/bell.png" alt="Cloche notifié"/></button>
                        </form>
                        @endif
                        </div>



                        @endif
            @endforeach
</div>

</div>
@endforeach
@endsection


@section('script_link')

@endsection