@extends('layout')

@section('css_link')
<link rel="stylesheet" type="text/css" href="/css/pannier_style.css">
@endsection

@section('header_content')
<h1>Mon panier</h1>
@endsection

@section('main_content')

    <div class ="container">


    <?php $Total_price=0; ?>
    @foreach($Orders as $Order)

        <div class="container_bill">
            <div class="informations">
                <h2>Nom:</h2>
                <p>{{$Order->Name_product}}</p>
            </div>

            <div class="informations">
                <h2>Quantité:</h2>
                <p>{{$Order->Quantity}}</p>
            </div>

            <div class="informations">
                <h2>Prix:</h2>
                <p>{{$Order->Price_product}}</p>
            </div>
    </div>
    <?php $Total_price=$Total_price+($Order->Price_product*$Order->Quantity);?>
    @endforeach
            <div class="total_price">
                <h2>Prix total:</h2>
                <p>{{$Total_price}}</p>
            </div>
    </div>
@endsection


@section('script_link')

@endsection