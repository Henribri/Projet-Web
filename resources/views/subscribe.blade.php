@extends('layout')

@section('css_link')
<link rel="stylesheet" type="text/css" href="/css/login_style.css">
@endsection

@section('header_content')
<h1>S'inscrire</h1>
@endsection

@section('main_content')

<div id="container_nav">
        <ul>
            <li><a href="login">Se connecter</a></li>
            <li><a href="subscribe">S'inscrire</a></li>
        </ul>
</div>

<div class="form">
    <form>
      <input class="field" type="text" name="name" placeholder="Nom">
      <input class="field" type="text" name="first_name" placeholder="Prénom">
      <input class="field" type="Text" name="campus" placeholder="Campus">
      <input class="field" type="email" name="email" placeholder="Adresse mail">
      <input class="field" type="password" name="password" placeholder="Mot de passe">
      <input class="field" id ="blocked" type="submit" value="S'inscrire"/> 
    </form>
</div>


<div class="Legal_Notice">
    <h2>Mentions légales</h2>
   <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet id ad quos et. 
    Aut fugiat excepturi quos. LEIn id nesciunt quo, reiciendis enim, ratione laboriosam facere dolor ad, molestiae illum?</p>

        <h3>Conditions d'utilisation</h3>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet id ad quos et. 
    Aut fugiat excepturi quos. LEIn id nesciunt quo, reiciendis enim, ratione laboriosam facere dolor ad, molestiae illum?</p>

        <h3>Cookies</h3>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet id ad quos et. 
    Aut fugiat excepturi quos. LEIn id nesciunt quo, reiciendis enim, ratione laboriosam facere dolor ad, molestiae illum?</p>

        <h3> Limitation contractuelles sur les données</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet id ad quos et. 
    Aut fugiat excepturi quos. LEIn id nesciunt quo, reiciendis enim, ratione laboriosam facere dolor ad, molestiae illum?</p>

        <h3> Déclaration à la CNIL</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet id ad quos et. 
    Aut fugiat excepturi quos. LEIn id nesciunt quo, reiciendis enim, ratione laboriosam facere dolor ad, molestiae illum?</p>

        <div id="accept"> <input class = "checkbox" type ="checkbox" name ="accept" value ="accept">
            <label for="accept">J'accepte les conditions d'utilsation</label>
        </div>
</div>

@endsection


@section('script_link')

@endsection