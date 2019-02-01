@extends('layout')

@section('css_link')
<link rel="stylesheet" type="text/css" href="/css/home_style.css">
@endsection

@section('header_content')
<h1>Accueil</h1>

@endsection

@section('main_content')

<h2>Tu y trouveras toutes les informations que tu cherches sur le CESI Arras
      et sa vie
      étudiante.</h2>
      
      <div class="container"><!--Contain each button menu -->
      <div class="image">
            <a href="/connexion"><img src="/pictures/bde.jpg"alt="BDE"/></a>
      </div>
     
      <div class="image">
            <a href="/events_month"><img src="/pictures\Events-Whats-on-in-Farnham-Surrey.jpg"alt="Cesi"/></a>
      </div>

</div>

<div class="container"><!--Contain each button menu -->
      <div class="image">
            <a href="/shop"><img src="\pictures\12-512.png"alt="Associations"/></a>
      </div>       
      <div class="image">
            <a href="/events_idea"><img src="/pictures/boite_a_idees.jpg"alt="Boîte à idées"/></a>
      </div>
</div>
                  

@endsection


@section('script_link')

@endsection