@extends('Layout')

@section('contenu')
    <!--Ici on a notre formulaire et on affiche les erreurs à notre utilisateurs -->
    <form method='post'>
        {{ csrf_field() }}
        <input type='text' name='name_user' placeholder='Name' value="{{old('name_user')}}">
        @if($errors->has('name_user'))
            {{$errors->first('name_user')}}
        @endif
        
        <input type='text' name='surname_user' placeholder='Surname' value="{{old('surname_user')}}">
        @if($errors->has('surname_user'))
            {{$errors->first('surname_user')}}
        @endif
        
        <input type='email' name='email_user' placeholer='Email' value="{{old('email_user')}}">
        @if($errors->has('email_user'))
            {{$errors->first('email_user')}}
        @endif
        
        <input type='password' name='password_user' placeholder='password'>
        @if($errors->has('password_user'))
            {{$errors->first('password_user')}}
        @endif
        
        <input type='password' name='password_user_confirmation' placeholder='confirmed password'>
        @if($errors->has('password_user_confirmation'))
            {{$errors->first('password_user_confirmation')}}
        @endif
        
        <select name='localisation_user' value="{{old('localisation_user')}}">
            <option value='Arras'>Arras</option>
            <option value='Rouen'>Rouen</option>
            <option value='Lille'>Lille</option>
            <option value='Paris'>Paris</option>
        </select>
        <input type='submit' name='validation' placeholder='OK'>
@endsection