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
            <li><a href="/shop">Boutique</a></li>
            <li><a href="/create_product">Ajouter un produit</a></li>
            <li><a href="/pannier">Mon panier</a></li>
        </ul>
</div>



    <div class ="container">
    <?php $Total_price=0; ?>
    @foreach($Orders as $Order)

        <div class="container_bill">

                <h2>Nom:</h2>
                <p>{{$Order->Name_product}}</p>



                <h2>Quantité:</h2>
                <p>{{$Order->Quantity}}</p>



                <h2>Prix:</h2>
                <p>{{$Order->Price_product}}</p>

    </div>
    <?php $Total_price=$Total_price+($Order->Price_product*$Order->Quantity);?>
    @endforeach
            <div class="total_price">
                <h2>Prix total:</h2>
                <h2>{{$Total_price}}</h2>
            </div>
    </div>

    <div class="container2">
        <form action="/validate_order" method="post">
        {{ csrf_field() }}  
        <button class ="validate" name="orders" value="{{$Orders}}">Valider la commande</button>
        </form>
    </div>


@endsection


@section('script_link')

@endsection