@extends('layout')

@section('css_link')
<link rel="stylesheet" type="text/css" href="/css/login_style.css">
@endsection

@section('header_content')
<h1>S'inscrire</h1>
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
            <input class="field" type="text" name="name" placeholder="Nom" required>
            <input class="field" type="text" name="first_name" placeholder="Prénom" required>
            <input class="field" type="Text" name="campus" placeholder="Campus" required>
            <input class="field" type="email" name="email" placeholder="Adresse mail" required>
            <input class="field" type="password" name="password" placeholder="Mot de passe" required>
            <input class="field" type="password" name="password" placeholder="Confirmation de mot de passe" required>
        </div>
      <input class="field" id ="blocked" type="button" value="S'inscrire" onclick="submit();" required/> 
    </form>
</div>


<div class="Legal_Notice">
            <a href="legal_notice">Mentions légales</a>
           <div id="accept"> 
              <p><input id="checkbox" class = "checkbox" type ="checkbox" name ="accept" onclick="submit();" value ="accept"  required/>J'accepte les conditions d'utilsation</p>
        </div>
</div>

@endsection


@section('script_link')
<script src="js/legal_notice.js"></script>

@endsection