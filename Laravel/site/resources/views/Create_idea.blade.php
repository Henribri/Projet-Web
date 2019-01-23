@extends('Layout')

@section('contenu')
    <!--Ici on a notre formulaire et on affiche les erreurs à notre utilisateurs -->
    <form method='post'>
        {{ csrf_field() }}
        <p><input type='text' name='name_event' placeholder='Nom' value="{{old('name_event')}}"></p>
        @if($errors->has('name_event'))
            {{$errors->first('name_event')}}
        @endif

        <p><input type='text' name='description_event' placeholder='Nom' value="{{old('description_event')}}"></p>
        @if($errors->has('description_event'))
            {{$errors->first('description_event')}}
        @endif

        <input type='submit' name='validation' placeholder='Inscription'>
@endsection