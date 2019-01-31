@extends('layout')

@section('css_link')
<link rel="stylesheet" type="text/css" href="/css/pannier_style.css">
@endsection

@section('header_content')
<h1>Mon panier</h1>
@endsection

@section('main_content')
<div id="container_nav">
        <ul class="nav_bar">
            <li><a href="shop">Boutique</a></li>
            <li><a href="add_product">Ajouter un produit</a></li>
            <li><a href="pannier">Mon panier</a></li>
        </ul>
</div>
    <div class ="container">
        <div class="container_bill">
            <h2>Nom:</h2>
            <p>1234</p>
            <h2>Quantité:</h2>
            <p>1234</p>
            <h2>Prix:</h2>
            <p>1234</p>
        </div>
        <div class="container1">
                <button class ="delete">Supprimer</button>
            </div>
        <div class="total_price">
            <h2>Prix total:</h2>
        </div>
    </div>

    </div>
    <div class="container2">
        <button class ="validate">Valider la commande</button>
    </div>

@endsection


@section('script_link')

@endsection