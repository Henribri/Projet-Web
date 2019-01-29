<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Acceuil</title>
</head>
<body>
<h1>Créer un produit</h1>

<!--Ici on a notre formulaire et on affiche les erreurs à notre utilisateurs -->
<form method='post'>
    {{ csrf_field() }}
    <p><input type='text' name='name_product' placeholder='Nom' value="{{old('name_product')}}"></p>
    @if($errors->has('name_product'))
        {{$errors->first('name_product')}}
    @endif

    <p><input type='text' name='description_product' placeholder='Description' value="{{old('description_product')}}"></p>
    @if($errors->has('description_product'))
        {{$errors->first('description_product')}}
    @endif

    <p><input type='text' name='price_product' placeholder='Prix' value="{{old('price_product')}}"></p>
    @if($errors->has('price_product'))
        {{$errors->first('price_product')}}
    @endif

    <select name="id_category">
            <option value="1">Vêtements</option>
            <option value="2">Goodies</option>
            <option value="3">Fournitures</option>
        
        </select>
       <p> @if($errors->has('localisation_user'))
            {{$errors->first('localisation_user')}}
        @endif</p>

    <p><input type='submit' name='validation' placeholder='Valider'></p>
</body>
</html>