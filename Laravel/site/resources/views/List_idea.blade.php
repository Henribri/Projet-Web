@extends('layout')

@section('contenu')
    <h1>Boite à idées</h1>

    <ul>
        @foreach($event as $event)
            <li>
            {{ $event->Name_event }} : {{ $event->Description_event }}
            <input type='button' value='voter'>
            </li>
        @endforeach
    </ul>
@endsection