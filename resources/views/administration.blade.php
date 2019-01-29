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
    <form>
        <select class="field" id="state" name="state">
                <option value="public">BDE</option>
                <option value="private">Tuteur</option>
                <option value="private">Etudiant</option>
        </select>
    </form>
</div>
@endsection


@section('script_link')

@endsection