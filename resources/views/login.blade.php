@extends('layout')

@section('css_link')
<link rel="stylesheet" type="text/css" href="/css/login_style.css">
@endsection

@section('header_content')
<h1>Se connecter</h1>
@endsection

@section('main_content')

<div id="container_nav">
        <ul>
            <li><a href="/connexion">Se connecter</a></li>
            <li><a href="/subscribe">S'inscrire</a></li>
        </ul>
</div>

<div class="form">
    <form action="/connexion" method="post">
    {{ csrf_field() }}  
      <input class="field" type="email" name="email_user" placeholder="Adresse mail">
      @if($errors->has('email_user'))
            {{$errors->first('email_user')}}
        @endif

      <input class="field" type="password" name="password_user" placeholder="Mot de passe">
      @if($errors->has('password_user'))
            {{$errors->first('password_user')}}
        @endif
      
      <input class="field" type="submit" value="Se connecter"/> 
    </form>
</div>

@endsection


@section('script_link')

@endsection