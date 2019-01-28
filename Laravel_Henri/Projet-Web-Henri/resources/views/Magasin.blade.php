<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Magasin</title>
</head>
<body>
<ul>
        @foreach($product as $products)
            <li>
            {{ $products->Name_product }} : {{ $products->Description_product }} : {{ $products->Price_product }}
            <input type='button' value='acheter'>
            </li>
        @endforeach
    </ul>
</body>
</html>