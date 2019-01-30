function categorie() {
    $category = document.getElementById('category').value;
    $i = 1;
    $init = true;
}

function search() {
    $name = document.getElementById('search').value;
    if ($name == "") {
        $name = 0;
    }
    $i = 1;
    $init = true;
}

function price() {
    $price_min = document.getElementById('price_min').value;
    $price_max = document.getElementById('price_max').value;
    if ($price_min == "") {
        $price_min = 0;
    }
    if ($price_max == "") {
        $price_max = 99999999999;
    }
    $i = 1;
    $init = true;
}

function yHandler() {
    var products = document.getElementById('products');
    var contentHeight = products.offsetHeight; //Height of the content
    var yOffset = window.pageYOffset; //Get the vertical scroll
    var y = yOffset + window.innerHeight;

    if (y >= contentHeight || $init == true) {
        // Ajax call
        $(function () {
            var $products = $('#products');
            $.ajax({
                type: 'GET',
                url: 'http://localhost:3000/api/product/' + $i,
                success: function (products) {
                    $.each(products, function (i, product) {
                        if (($category == product.Id_category || $category == 0) && ($name == product.Name_product || $name == 0) && ($price_min <= product.Price_product && $price_max >= product.Price_product)) {
                            var HTMLproduct = '<div class="container">' +
                                '<h3>' + product.Name_product + '</h3>' +
                                '<img class= "img_product" src="' + product.Image + '" alt="' + product.Name_product + '"/></img>' +
                                '<div class="information">' +
                                '<div class ="price">' +
                                '<p>' + product.Price_product + '€</p>' +
                                '</div>' +
                                '</div>' +
                                '<p>' + product.Description_product + '</p>' +
                                '<div class="button">' +
                                '<form action="/add_product" method="post">' +
                                '<input type="number" name="quantity" value="">' +
                                '<button class="add" name="id_product" value="' + product.Id_product + '">' +
                                '<img src="/pictures/plus.png" alt="Ajouter au panier"/>' +
                                '</button>' +
                                '</form>' +
                                '</div>' +
                                '</div>';
                            if ($init == true) {
                                $products.html(HTMLproduct);
                            } else {
                                $products.append(HTMLproduct);
                            }
                            $init = false;
                        }
                        $i++;
                    });
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert("Status: " + textStatus);
                    alert("Error: " + errorThrown);
                }
            });
        });
    }
}
window.onload = categorie();
window.onload = search();
window.onload = price();
window.onload = yHandler;
window.onscroll = yHandler;
