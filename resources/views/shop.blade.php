@extends('layout')

@section('css_link')
<link rel="stylesheet" type="text/css" href="/css/shop_style.css">
<link rel="stylesheet" href="vendor/bootstrap/bootstrap.min.css">
@endsection

@section('header_content')
<h1>Boutique</h1>
@endsection

@section('main_content')
<input type="hidden" id="session_user" value="{{session()->get('Id_user')}}"/>

<div id="container_nav">
        <ul class="nav_bar">
            <li><a href="/shop">Boutique</a></li>
            @if(session()->get('Status_user')=='BDE')
            <li><a href="/create_product">Créer un produit</a></li>
            @endif
            <li><a href="/pannier">Mon panier</a></li>
        </ul>
</div>

<div id ="global_container">

    <h2>Bienvenue dans la boutique, ici tu peux trouver les goodies de notre bureau des élèves !</h2>
        <div class="research">
            <div class="category_bar">
                    <label for="category">Catégorie</label>
                    <select id="category" name="category">
                        <option value="0"></option>
                        @foreach($categories as $category)
                        <option value="{{$category->Id_ategory}}">{{$category->Category}}</option>
                        @endforeach
                    </select>
                    <button type="submit" onclick="categorie()">Valider</button>
            </div>
            <div class="research_name">
                <input id="search" name="search" type="text" placeholder="Rechercher" />
                <button id="search-btn" type="submit" onclick="search()">Valider</button>
            </div>
            <div class="price_order">
                <input id="price_min" name="price_min" type="number" placeholder="prix minimum" />
                <input id="price_max" name="price_max" type="number" placeholder="prix maximum" />
                <button type="submit" onclick="price()">Valider</button>
            </div>
        </div>

        <div class ="pannier">
            <a href="pannier"><img src="/pictures/panier.png" alt="Panier"></a> 
        </div>
        
        <h3>Les meilleurs ventes</h3>
        <section class="best_sale">
            <div class="best_sale_product">
                <h4>Sweats</h4>
                <img src="/pictures/shop.png" alt="Gourde">
                <p>Sweats sympa</p>
            </div>
            <div class="best_sale_product">
                <h4>Porte clés</h4>
                <img src="/pictures/keychain.png" alt="Gourde">
                <p>Porte clés cool</p>
            </div>
            <div class="best_sale_product">
                <h4>Gourde</h4>
                <img src="/pictures/gourde.jpg" alt="Gourde">
                <p>Gourde utile</p>
            </div>
        </section>

        <div id="products">

        </div>

        </div>
@endsection

@section('script_link')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="/js/shop1.js"></script>
@endsection