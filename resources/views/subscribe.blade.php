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
            <li><a href="/connexion">Se connecter</a></li>
            <li><a href="/subscribe">S'inscrire</a></li>
        </ul>
</div>

<div class="form"  >
    <form method="post" action="">
    {{ csrf_field() }}  
      <input class="field" type="text" name="name_user" placeholder="Nom">
      @if($errors->has('name_user'))
            {{$errors->first('name_user')}}
        @endif

      <input class="field" type="text" name="surname_user" placeholder="Prénom">
      @if($errors->has('surname_user'))
            {{$errors->first('surname_user')}}
        @endif

      <select name="localisation_user">
            <option value="Arras">Arras</option>
            <option value="Rouen">Rouen</option>
            <option value="Lyon">Lyon</option>
            <option value="Paris">Paris</option>
            <option value="Lille">Lille</option>
        </select>
       <p> @if($errors->has('localisation_user'))
            {{$errors->first('localisation_user')}}
            @endif
        </p>

      <input class="field" type="email" name="email_user" placeholder="Adresse mail">
      @if($errors->has('email_user'))
            {{$errors->first('email_user')}}
        @endif

      <input class="field" type="password" name="password_user" placeholder="Mot de passe">
      @if($errors->has('password_user'))
            {{$errors->first('password_user')}}
        @endif

      <input class="field" type="password" name="password_user_confirmation" placeholder="Confirmation">
      @if($errors->has('password_user_confirmation'))
            {{$errors->first('password_user_confirmation')}}
        @endif
        
      <input class="field" id ="blocked" type="submit" value="S'inscrire"/> 
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