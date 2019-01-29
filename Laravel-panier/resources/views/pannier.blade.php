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

            <form method="post" action="">
                 {{ csrf_field() }}  

                <input class="field" id ="blocked" type="hidden" name="id_product" value="{{$order->Id_product}}"/>
                <input class="field" id ="blocked" type="submit" value="supprimer"/>  
            </form>
        @endforeach
    </div>

            <div class="total_price">
                <h2>Prix total:</h2>
            </div>
    </div>
@endsection


@section('script_link')

@endsection