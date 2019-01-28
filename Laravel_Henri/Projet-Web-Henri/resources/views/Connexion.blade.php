<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Connexion</title>
</head>
<body>
    <!--Ici on a notre formulaire et on affiche les erreurs à notre utilisateurs -->
    <form method='post'>
        {{ csrf_field() }}

        <input type='email' name='email_user' placeholer='Email' value="{{old('email_user')}}">
        @if($errors->has('email_user'))
            {{$errors->first('email_user')}}
        @endif
        
        <input type='password' name='password_user' placeholder='password'>
        @if($errors->has('password_user'))
            {{$errors->first('password_user')}}
        @endif
        
        <input type='submit' name='validation' placeholder='OK'>
    </form>
</body>
</html>