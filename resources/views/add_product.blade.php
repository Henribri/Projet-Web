@extends('layout')

@section('css_link')
<link rel="stylesheet" type="text/css" href="/css/create_style.css">
@endsection

@section('header_content')
<h1>Ajouter un produit</h1>
@endsection

@section('main_content')

<div id="container_nav">
        <ul>
            <li><a href="shop">Boutique</a></li>
            <li><a href="create_product">Ajouter un produit</a></li>
        </ul>
</div>

<div class="form">
    <form>
      <div class="input">
      <input class="field" type="text" name="event_name" placeholder="Nom du produit" required>
      <input class="field" type="text" name="event_name" placeholder="Prix" required>
      <select class="field" id="state" name="state">
        <option value="public">Vêtements</option>
        <option value="private">Accessoires</option>
      </select>
      <textarea class="field" name="description" id="description" cols="30" rows="10"placeholder="Description du produit"required></textarea>
      </div> 
      <input class="field" type="submit" value="Ajouter"/>
    </form> 
</div>

@endsection


@section('script_link')

@endsection