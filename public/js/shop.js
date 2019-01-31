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
                                '<input id="quantity" type="number" name="quantity" value="1">' +
                                '<button onclick="Panier(' + product.Id_product + ')" class="add">' +
                                '<img src="/pictures/plus.png" alt="Ajouter au panier"/>' +
                                '</button>' +
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

function Panier(id_product) {
    var id_user = document.getElementById('session_user').value;
    $.ajax({
        type: 'GET',
        url: 'http://localhost:3000/api/order/user/' + id_user,
        success: function (orders) {
            if ($.trim(orders)) {
                $.each(orders, function (i, order) {
                    if (order.Validate == 0) {
                        $id_order = order.Id_order;
                        return true;
                    } else {
                        $id_order = undefined;
                    }
                });
            } else {
                $id_order = undefined;
            }
            if ($id_order == undefined || $id_order == null) {
                //Ajax post order
                var data = {};
                var now = new Date();
                var annee = now.getFullYear();
                var mois = now.getMonth() + 1;
                var jour = now.getDate();
                data["Date_order"] = annee + '-' + mois + '-' + jour;
                data["Validate"] = 0;
                data["Id_user"] = id_user;

                postData(data, "order");
            }
            console.log($id_order);
            // Ajax post select
            postData(data, "select");
        },
        error: function (textStatus, errorThrown) {
            alert("Status: " + textStatus);
            alert("Error: " + errorThrown);
            $id_order = undefined;
        }
    });
}

function postData(datajson, table) {
    $.ajax({
        type: "POST",
        url: "http://localhost:3000/api/" + table + "/",
        data: JSON.stringify(datajson),
        contentType: "application/json; charset=utf-8",
        crossDomain: true,
        dataType: "json",
        success: function () {
            if(table == "order"){
                
            }
        },
        error: function (jqXHR, status) {
            // error handler
            console.log(jqXHR);
            alert('fail' + status.code);
        }
    });
    return $id_order;
}

window.onload = categorie();
window.onload = search();
window.onload = price();
window.onload = yHandler;
window.onscroll = yHandler;