@extends('Layout')

@section('contenu')
    <!--Ici on a notre formulaire et on affiche les erreurs à notre utilisateurs -->
    <form method='post'>
        {{ csrf_field() }}
        <p><input type='text' name='name_event' placeholder='Nom' value="{{old('name_event')}}"></p>
        @if($errors->has('name_event'))
            {{$errors->first('name_event')}}
        @endif

        <p><input type='text' name='description_event' placeholder='Description' value="{{old('description_event')}}"></p>
        @if($errors->has('description_event'))
            {{$errors->first('description_event')}}
        @endif

        <p><input type='text' name='date_event' placeholder='Date (format YYYY-MM-DD)' value="{{old('date_event')}}"></p>
        @if($errors->has('date_event'))
            {{$errors->first('date_event')}}
        @endif

        <p><input type='text' name='cost_event' placeholder='Prix' value="{{old('cost_event')}}"></p>
        @if($errors->has('cost_event'))
            {{$errors->first('cost_event')}}
        @endif

        <p><input type='submit' name='validation' placeholder='Valider'></p>
@endsection