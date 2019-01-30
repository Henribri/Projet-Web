@extends('layout')

@section('css_link')
<link rel="stylesheet" type="text/css" href="/css/login_style.css">
@endsection

@section('header_content')
<h1>Se connecter</h1>
@endsection

@section('main_content')

<div id="container_nav">
        <ul class="nav_bar">
            <li><a href="login">Se connecter</a></li>
            <li><a href="subscribe">S'inscrire</a></li>
        </ul>
</div>

<div class="form">
    <form>
    <div class="input">
        <input class="field" type="text" name="name" placeholder="Nom"required>
        <input class="field" type="text" name="first_name" placeholder="Prénom"required>
        <input class="field" type="email" name="email" placeholder="Adresse mail"required>
        <input class="field" type="password" name="password" placeholder="Mot de passe"required>
    </div>
        <input class="field" type="submit" value="Se connecter"/> 
    </form>
</div>

@endsection


@section('script_link')

@endsection