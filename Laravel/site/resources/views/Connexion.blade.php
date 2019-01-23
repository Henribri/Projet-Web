@extends('Layout')

@section('contenu')
    <!--Ici on a notre formulaire et on affiche les erreurs à notre utilisateurs -->
    <form method='post'>
        {{ csrf_field() }}
    
        <p><input type='email' name='email_user' placeholer='Email' value="{{old('email_user')}}"></p>
        @if($errors->has('email_user'))
            {{$errors->first('email_user')}}
        @endif
        
        <p><input type='password' name='password_user' placeholder='Mot de passe'></p>
        @if($errors->has('password_user'))
            {{$errors->first('password_user')}}
        @endif
        
        <p><input type='submit' name='validation' placeholder='OK'></p>
@endsection