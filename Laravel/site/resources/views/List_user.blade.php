@extends('layout')

@section('contenu')
    <h1>Utilisateurs</h1>

    <ul>
        @foreach($users as $user)
            <li>
            {{ $user->Name_user }} {{ $user->Surname_user }} : {{ $user->Localisation_user }}
            </li>
        @endforeach
    </ul>
@endsection