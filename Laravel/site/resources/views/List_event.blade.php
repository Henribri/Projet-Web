@extends('layout')

@section('contenu')
    <h1>Les événements</h1>

    <ul>
        @foreach($event as $event)
            <li>
            {{ $event->Name_event }} : {{ $event->Description_event }}
            <input type='button' value="s'inscrire">
            </li>
        @endforeach
    </ul>
@endsection