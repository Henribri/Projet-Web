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
        @foreach($orders as $order)
            <div class="informations">
                <h2>Nom:</h2>
                <p>{{ $order->Name_product }}</p>
            </div>

            <div class="informations">
                <h2>Quantité:</h2>
                <p>{{ $order->Quantity }}</p>
            </div>

            <div class="informations">
                <h2>Prix:</h2>
                <p>{{ $order->Price_product }}</p>
            </div>
        @endforeach
    </div>

            <div class="total_price">
                <h2>Prix total:</h2>
            </div>
    </div>
@endsection


@section('script_link')

@endsection