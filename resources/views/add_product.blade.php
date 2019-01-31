@extends('layout')

@section('css_link')
<link rel="stylesheet" type="text/css" href="/css/create_style.css">
@endsection

@section('header_content')
<h1>Ajouter un produit</h1>
@endsection

@section('main_content')

@section('main_content')
<!--Navigation bar-->
<div id="container_nav">
        <ul class="nav_bar">
            <li><a href="/shop">Boutique</a></li>
            <li><a href="/create_product">Ajouter un produit</a></li>
            <li><a href="/pannier">Mon panier</a></li>
        </ul>
</div>
<!--Form for add a product-->

<div class="form">
    <form action="" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
      <div class="input">
      <input class="field" type="text" name="name_product" placeholder="Nom du produit" required>
            @if($errors->has('name_product'))
              {{$errors->first('name_product')}}
            @endif
      <input class="field" type="number" name="price_product" placeholder="Prix" required>
           @if($errors->has('price_product'))
              {{$errors->first('price_product')}}
            @endif
      <select class="field" id="state" name="id_category">
        @foreach($Categories as $Category)
        <option value="{{$Category->Id_category}}">{{$Category->Category}}</option>
        @endforeach
        <option value="Clothes">Clothes</option>
      </select>
            @if($errors->has('category'))
              {{$errors->first('category')}}
            @endif
      <textarea class="field" name="description_product" id="description" cols="30" rows="10"placeholder="Description du produit"required></textarea>
            @if($errors->has('description_product'))
              {{$errors->first('description_product')}}
            @endif
      </div> 
      <label for="file" class="label-file">Choisir une image</label>
      <input id="file" class="input-file" type="file" name="image_product">
            @if($errors->has('image_product'))
              {{$errors->first('image_product')}}
            @endif
      <input class="field" type="submit" value="Ajouter"/>
    </form> 
</div>

@endsection


@section('script_link')

@endsection