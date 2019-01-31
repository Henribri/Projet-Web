Bonjour,
l'utilisateur {{$user_name}} {{$user_surname}} a acheté des produits:</br>
<?php $Total_price=0 ?>

@foreach($orders as $order)
Nom du produit : {{$order->Name_product}} | Prix: {{$order->Price_product}} € | Quantité: {{$order->Quantity}}</br>

<?php $Total_price=$Total_price+($order->Price_product*$order->Quantity) ?>
@endforeach

Prix total:{{$Total_price}} €