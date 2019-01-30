@extends('layout')

@section('css_link')
<link rel="stylesheet" type="text/css" href="/css/pannier_style.css">
@endsection

@section('header_content')
<h1>Mon panier</h1>
@endsection

@section('main_content')
    <div class ="container">
        <div class="container_bill">
            <div class="informations">
                <h2>Nom:</h2>
                <p>Pour DK</p>
            </div>

            <div class="informations">
                <h2>Quantité:</h2>
                <p>Pour DK</p>
            </div>

            <div class="informations">
                <h2>Prix:</h2>
                <p>Pour DK</p>
            </div>
    </div>

            <div class="total_price">
                <h2>Prix total:</h2>
            </div>
    </div>

    <div class="button">
        <button class ="validate">Valider la commande</button>
    </div>
@endsection


@section('script_link')

@endsection