<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inscription</title>
</head>
<body>
    <form method='post'>
        {{ csrf_field() }}
        <input type='text' name='name_user' placeholder='Name'>
        <input type='text' name='surname_user' placeholder='Surname'>
        <input type='email' name='email_user' placeholer='Email'>
        <input type='password' name='password_user' placeholder='password'>
        <select name='localisation_user'>
            <option value='Arras'>Arras</option>
            <option value='Rouen'>Rouen</option>
            <option value='Lille'>Lille</option>
            <option value='Paris'>Paris</option>
        </select>
        <input type='submit' name='validation' placeholder='OK'>

</body>
</html>