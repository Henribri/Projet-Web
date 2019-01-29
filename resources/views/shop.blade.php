@extends('layout')

@section('css_link')
<link rel="stylesheet" type="text/css" href="/css/shop_style.css">
<link rel="stylesheet" href="vendor/bootstrap/bootstrap.min.css">
@endsection

@section('header_content')
<h1>Boutique</h1>
@endsection

@section('main_content')

<div id="container_nav">
        <ul>
            <li><a href="shop">Boutique</a></li>
            <li><a href="add_product">Ajouter un produit</a></li>
        </ul>
</div>

<div class ="global_container">
    <h2>Bienvenue dans la boutique, ici tu peux trouver les goodies de notre bureau des élèves !</h2>
    <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand">Faites votre recherche</a>
        <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Recherche</button>
        </form>
    </nav>

        <div class ="pannier">
            <a href="pannier"><img src="/pictures/panier.png" alt="Panier"></a> 
        </div>
        
        <h3>Les meilleurs ventes</h3>
        <section class="best_sale">
            <div class="best_sale_product">
                <h4>Sweats</h4>
                <img src="/pictures/gourde.jpg" alt="Gourde">
                <p>azertyuio</p>
            </div>
            <div class="best_sale_product">
                <h4>Porte clées</h4>
                <img src="/pictures/shop.png" alt="Gourde">
                <p>azertyuio</p>
            </div>
            <div class="best_sale_product">
                <h4>Gourde</h4>
                <img src="/pictures/keychain.png" alt="Gourde">
                <p>azertyuio</p>
            </div>
        </section>
        <div class="container">
                <h3>Les sweats de l'école</h3>
                <img class= "img_product" src="/pictures/shop.png" alt="Sweat Cesi"/></a>
                        <div class="information">
                            <div class ="price"><p>5€</p></div>
                        </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                            dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat.
                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                            nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                            mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                            dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat.
                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                            nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                            mollit anim id est laborum.</p>
                            <div class="button">
                                <button class="add"> <img src="/pictures/plus.png" alt="Ajouter au panier"/></button>
                            </div>
        </div>

        <div class="container">
                <h3>Les sweats de l'école</h3>
                <img class= "img_product" src="/pictures/shop.png" alt="Sweat Cesi"/></a>
                        <div class="information">
                            <div class ="price"><p>5€</p></div>
                        </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                            dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat.
                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                            nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                            mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                            dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat.
                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                            nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                            mollit anim id est laborum.</p>
                            <div class="button">
                                <button class="add"> <img src="/pictures/plus.png" alt="Ajouter au panier"/></button>
                            </div>
        </div>

        <div class="container">
                <h3>Les sweats de l'école</h3>
                <img class= "img_product" src="/pictures/shop.png" alt="Sweat Cesi"/></a>
                        <div class="information">
                            <div class ="price"><p>5€</p></div>
                        </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                            dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat.
                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                            nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                            mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                            dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat.
                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                            nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                            mollit anim id est laborum.</p>
                            <div class="button">
                                <button class="add"> <img src="/pictures/plus.png" alt="Ajouter au panier"/></button>
                            </div>
        </div>

        <div class="container">
                <h3>Les sweats de l'école</h3>
                <img class= "img_product" src="/pictures/shop.png" alt="Sweat Cesi"/></a>
                        <div class="information">
                            <div class ="price"><p>5€</p></div>
                        </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                            dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat.
                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                            nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                            mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                            dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat.
                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                            nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                            mollit anim id est laborum.</p>
                            <div class="button">
                                <button class="add"> <img src="/pictures/plus.png" alt="Ajouter au panier"/></button>
                            </div>
        </div>

        <div class="container">
                <h3>Les sweats de l'école</h3>
                <img class= "img_product" src="/pictures/shop.png" alt="Sweat Cesi"/></a>
                        <div class="information">
                            <div class ="price"><p>5€</p></div>
                        </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                            dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat.
                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                            nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                            mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                            dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat.
                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                            nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                            mollit anim id est laborum.</p>
                            <div class="button">
                                <button class="add"> <img src="/pictures/plus.png" alt="Ajouter au panier"/></button>
                            </div>
        </div>

        <div class="container">
                <h3>Les sweats de l'école</h3>
                <img class= "img_product" src="/pictures/shop.png" alt="Sweat Cesi"/></a>
                        <div class="information">
                            <div class ="price"><p>5€</p></div>
                        </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                            dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat.
                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                            nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                            mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                            dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat.
                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                            nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                            mollit anim id est laborum.</p>
                            <div class="button">
                                <button class="add"> <img src="/pictures/plus.png" alt="Ajouter au panier"/></button>
                            </div>
        </div>
@endsection


@section('script_link')
<script src="/vendor/jquery/jquery-3.3.1.min.js"></script>
<script src="/vendor/bootstrap/bootstrap.bundle.min.js"></script>
@endsection