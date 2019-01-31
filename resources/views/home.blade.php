@extends('layout')

@section('css_link')
<link rel="stylesheet"type="text/css"href="/css/home_style.css">
@endsection

@section('header_content')
<h1>Accueil</h1>
@endsection

@section('main_content')
<h2>Tu y trouveras toutes les informations que tu cherches sur le CESI Arras et sa vie étudiante.</h2>
<div class="container"><!--Contain each button menu -->
      <div class="image">
            <a href="cesi"><img src="/pictures/cesi.jpg"alt="Cesi"/></a>
      </div>
      <div class="image">
            <a href="bde"><img src="/pictures/bde.jpg"alt="BDE"/></a>
      </div>
</div>

<div class="container"><!--Contain each button menu -->
      <div class="image">
            <a href="associations"><img src="/pictures/associations.jpg"alt="Associations"/></a>
      </div>       
      <div class="image">
            <a href="month_events"><img src="/pictures/evenements.jpg"alt="Evènements"/></a>
      </div>
</div>
                  
<div class="container"><!--Contain each button menu -->
      <div class="image">
            <a href="suggestion_box"><img src="/pictures/boite_a_idees.jpg"alt="Boîte à idées"/></a>
      </div>
      <div class="image">
            <a href="shop"><img src="/pictures/shop.png"alt="Boutique"/></a>
      </div>
</div>

@endsection


@section('script_link')

@endsection