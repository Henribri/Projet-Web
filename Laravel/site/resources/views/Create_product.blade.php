@extends('Layout')

@section('contenu')
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

        <p><input type='submit' name='validation' placeholder='Valider'></p>
@endsection