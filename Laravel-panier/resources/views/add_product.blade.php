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
    <form method='post'>
    {{ csrf_field() }}
      <div class="input">
      <input class="field" type="text" name='name_product' placeholder="Nom du produit" value="{{old('name_product')}}" required>
      <input class="field" type="text" name='price_product' placeholder="Prix" value="{{old('price_product')}}" required>
      <select class="field" id="state" name="id_category">
        <option value="1">Vêtements</option>
        <option value="2">Goodies</option>
        <option value="3">Fournitures</option>
      </select>
      <textarea class="field" name='description_product' id="description" cols="30" rows="10"placeholder="Description du produit" value="{{old('description_product')}}" required></textarea>
      </div> 
      <input class="field" type="submit" value="Ajouter"/>
    </form> 
</div>

@endsection


@section('script_link')

@endsection