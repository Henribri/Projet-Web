@extends('layout')

@section('contenu')
    <h1>Produits</h1>

    <ul>
        @foreach($products as $product)
            <li>
            {{ $product->Name_product }} : {{ $product->Description_product }} : {{ $product->Price_product }}
            <input type='button' value='acheter'>
            </li>
        @endforeach
    </ul>
@endsection