@extends('Layout')

@section('contenu')
    <!--Ici on a notre formulaire et on affiche les erreurs à notre utilisateurs -->
    <form method='post'>
        {{ csrf_field() }}
        <p><input type='text' name='name_user' placeholder='Nom' value="{{old('name_user')}}"></p>
        @if($errors->has('name_user'))
            {{$errors->first('name_user')}}
        @endif
        
        <p><input type='text' name='surname_user' placeholder='Prénom' value="{{old('surname_user')}}"></p>
        @if($errors->has('surname_user'))
            {{$errors->first('surname_user')}}
        @endif
        
        <p><input type='email' name='email_user' placeholer='Email' value="{{old('email_user')}}"></p>
        @if($errors->has('email_user'))
            {{$errors->first('email_user')}}
        @endif
        
        <p><input type='password' name='password_user' placeholder='Mot de passe'></p>
        @if($errors->has('password_user'))
            {{$errors->first('password_user')}}
        @endif
        
        <p><input type='password' name='password_user_confirmation' placeholder='Confirmation du mot de passe'></p>
        @if($errors->has('password_user_confirmation'))
            {{$errors->first('password_user_confirmation')}}
        @endif
        
        <p><select name='localisation_user' value="{{old('localisation_user')}}">
            <option value='Arras'>Arras</option>
            <option value='Rouen'>Rouen</option>
            <option value='Lille'>Lille</option>
            <option value='Paris'>Paris</option>
        </select><p>
        <input type='submit' name='validation' placeholder='Inscription'>
@endsection