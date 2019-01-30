@extends('layout')

@section('css_link')
<link rel="stylesheet" type="text/css" href="/css/administration_style.css">
@endsection

@section('header_content')
<h1>Administration</h1>
@endsection

@section('main_content')
<div class="administration">
    <p>Veuillez choisir votre statut :</p>
    <form action="" method="post">
    {{ csrf_field() }}
   <div class ="input">
        <input class="field "type="email" name="email_user" placeholder="Adresse mail" required>
            @if($errors->has('email_user'))
              {{$errors->first('email_user')}}
            @endif
    </div>
        <select class="field" id="state" name="user_status">
                <option value="BDE">BDE</option>
                <option value="Tuteur">Tuteur</option>
                <option value="Etudiant">Etudiant</option>
        </select>
        <input class="field" id ="blocked" type="submit" value="S'inscrire"required/> 
    </form>
    
</div>
@endsection


@section('script_link')

@endsection