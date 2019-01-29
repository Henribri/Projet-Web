<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Magasin</title>
</head>
<body>
<h1>Produits</h1>
<ul>
<h2>Votre produit a bien été ajouté.</h2>
        @foreach($products as $product)
            <li>
            {{ $product->Name_product }} : {{ $product->Description_product }} : {{ $product->Price_product }}
            <form method="post" action="">
                 {{ csrf_field() }}  

                <input class="field" type="entier" name="quantity" placeholder="quantity">
                @if($errors->has('quantity'))
                    {{$errors->first('quantity')}}
                @endif
        
                <input class="field" id ="blocked" type="submit" value="+"/> 
            </form>
            </li>
        @endforeach
    </ul>
</body>
</html>