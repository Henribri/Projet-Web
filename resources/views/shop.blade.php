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
        <ul class="nav_bar">
            <li><a href="shop">Boutique</a></li>
            <li><a href="add_product">Ajouter un produit</a></li>
            <li><a href="pannier">Mon panier</a></li>
        </ul>
</div>

<div class ="global_container">
    <h2>Bienvenue dans la boutique, ici tu peux trouver les goodies de notre bureau des élèves !</h2>
        <div class="research">
            <div class="category_bar">
                <label for="category">Catégorie</label>
                <select id="category" name="state">
                    <option value="public">Vêtements</option>
                    <option value="private">Goodies</option>
                    <option value="private">Matériel informatique</option>
                </select>  
            </div>
            <div class="research_name">
             <form action="/shop" id="searchthis" method="get">
                <input id="search" name="q" type="text" placeholder="Rechercher" />
                <input id="search-btn" type="submit" value="Rechercher" />
            </form>
            </div>
            <div class="price_order">
                <label for="price">Prix</label>
                <select  id="price-select" name="state">
                    <option value="public">Croissant</option>
                    <option value="private">Décroissant</option>
                </select>  
            </div>
        </div>

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
                <div class="delete">
                    <button class="delete_button"> <img src="/pictures/delete.png" alt="Supprimer l'événement"/></button>
                </div>
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
                            <div class="quantity">
                                <label for="quantity">Quantité</label>
                                <input type="number" id="quantity" name="tentacles"min="1" max="50">
                            </div>
                            <div class="button">
                                <button class="add">Ajouter au panier</button>
                            </div>
        </div>

        <div class="container">
                <h3>Les sweats de l'école</h3>
                <div class="delete">
                    <button class="delete_button"> <img src="/pictures/delete.png" alt="Supprimer l'événement"/></button>
                </div>
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
                            <div class="quantity">
                                <label for="quantity">Quantité</label>
                                <input type="number" id="quantity" name="tentacles"min="1" max="50">
                            </div>
                            <div class="button">
                                <button class="add">Ajouter au panier</button>
                            </div>
        </div>

        <div class="container">
                <h3>Les sweats de l'école</h3>
                <div class="delete">
                    <button class="delete_button"> <img src="/pictures/delete.png" alt="Supprimer l'événement"/></button>
                </div>
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
                            <div class="quantity">
                                <label for="quantity">Quantité</label>
                                <input type="number" id="quantity" name="tentacles"min="1" max="50">
                            </div>
                            <div class="button">
                                <button class="add">Ajouter au panier</button>
                            </div>
        </div>

        <div class="container">
                <h3>Les sweats de l'école</h3>
                <div class="delete">
                    <button class="delete_button"> <img src="/pictures/delete.png" alt="Supprimer l'événement"/></button>
                </div>
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
                            <div class="quantity">
                                <label for="quantity">Quantité</label>
                                <input type="number" id="quantity" name="tentacles"min="1" max="50">
                            </div>
                            <div class="button">
                                <button class="add">Ajouter au panier</button>
                            </div>
        </div>

        <div class="container">
                <h3>Les sweats de l'école</h3>
                <div class="delete">
                    <button class="delete_button"> <img src="/pictures/delete.png" alt="Supprimer l'événement"/></button>
                </div>
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
                            <div class="quantity">
                                <label for="quantity">Quantité</label>
                                <input type="number" id="quantity" name="tentacles"min="1" max="50">
                            </div>
                            <div class="button">
                                <button class="add">Ajouter au panier</button>
                            </div>
        </div>

        <div class="container">
                <h3>Les sweats de l'école</h3>
                <div class="delete">
                    <button class="delete_button"> <img src="/pictures/delete.png" alt="Supprimer l'événement"/></button>
                </div>
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
                            <div class="quantity">
                                <label for="quantity">Quantité</label>
                                <input type="number" id="quantity" name="tentacles"min="1" max="50">
                            </div>
                            <div class="button">
                                <button class="add">Ajouter au panier</button>
                            </div>
        </div>
@endsection

@section('script_link')
<script src="/vendor/jquery/jquery-3.3.1.min.js"></script>
<script src="/vendor/bootstrap/bootstrap.bundle.min.js"></script>
@endsection