function getCategorie() {
    $category = document.getElementById('category').value;
    $i = 0;
    $id = 1;
    $init = true;
    yHandler();
}

function getSearch() {
    $name = document.getElementById('search').value;
    if ($name == "") {
        $name = 0;
    }
    $i = 0;
    $id = 1;
    $init = true;
    yHandler();
}

function getPrice() {
    $price_min = document.getElementById('price_min').value;
    $price_max = document.getElementById('price_max').value;
    if ($price_min == "") {
        $price_min = 0;
    }
    if ($price_max == "") {
        $price_max = 99999999999;
    }
    $i = 0;
    $id = 1;
    $init = true;
    yHandler();
}
function getNBRProducts(){
    $.ajax({
        type: 'GET',
        url: 'http://localhost:3000/api/product/',
        success: function (allProducts) {
            $nbrProducts = allProducts.length
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert("Status: " + textStatus);
            alert("Error: " + errorThrown);
        }
    });
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
                url: 'http://localhost:3000/api/product/' + $id,
                success: function (products) {
                    if($i < $nbrProducts){
                        console.log($i);
                        console.log($id);
                        if(products.length > 0){
                            $i++;
                            if (($category == products[0].Id_category && $category != 0 || $category == 0) && ($name == products[0].Name_product && $name != "0" || $name == "0") && ($price_min <= products[0].Price_product && $price_max >= products[0].Price_product)) {
                                var HTMLproduct = '<div class="container">' +
                                    '<h3>' + products[0].Name_product + '</h3>' +
                                    '<img class= "img_product" src="' + products[0].Image + '" alt="' + products[0].Name_product + '"/></img>' +
                                    '<div class="information">' +
                                    '<div class ="price">' +
                                    '<p>' + products[0].Price_product + '€</p>' +
                                    '</div>' +
                                    '</div>' +
                                    '<p>' + products[0].Description_product + '</p>' +
                                    '<div class="button">' +
                                    '<input id="quantity" type="number" name="quantity" value="1" min="1" max="50">' +
                                    '<button onclick="Panier(' + products[0].Id_product + ')" class="add">' +
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
                        }
                        $id++;
                        yHandler();
                    }
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert("Status: " + textStatus);
                    alert("Error: " + errorThrown);
                }
            });
        });
    }
}

function getId_user(){
    var id_user = document.getElementById('session_user').value;
    return id_user;
}

function getId_order(id_user){
    $.ajax({
        type: 'GET',
        url: 'http://localhost:3000/api/order/user/' + id_user,
        async: false,
        success: function (orders) {
            if ($.trim(orders)) {
                $.each(orders, function (i, order) {
                    if (order.Validate == 0) {
                        $id_order = order.Id_order;
                    } else {
                        $id_order = null;
                    }
                });
            } else {
                $id_order = null;
            }
            return $id_order;
        },
        error: function (textStatus, errorThrown) {
            alert("Status: " + textStatus);
            alert("Error: " + errorThrown);
            $id_order = null;
        }
    });
    return $id_order;
}

function getQuantity(){
    var quantity = document.getElementById('quantity').value;
    return quantity;
}

function Panier(id_product) {
    var id_user = getId_user();
    $id_order = getId_order(id_user);
    console.log($id_order);

    if ($id_order == null) {
        //Ajax post order
        var data = {};
        var now = new Date();
        var annee = now.getFullYear();
        var mois = now.getMonth() + 1;
        var jour = now.getDate();
        data["Date_order"] = annee + '-' + mois + '-' + jour;
        data["Validate"] = 0;
        data["Id_user"] = id_user;

        $id_order = postData(data, "order", id_user);
        console.log($id_order);
    }
    var quantity = getQuantity();

    var data = {};
    $.ajax({
        type: 'GET',
        url: 'http://localhost:3000/api/select/' + $id_order,
        success: function (selects) {
            if ($.trim(selects)) {
                $.each(selects, function (i, select) {
                    if (select.Id_product == id_product) {
                        $selectAlreadyExist = true;
                        return true;
                    } else {
                        $selectAlreadyExist = false;
                    }
                });
            } else {
                $selectAlreadyExist = false;
            }
            if ($selectAlreadyExist == false) {
                data["Id_product"] = id_product;
                data["Id_order"] = $id_order;
                data["Quantity"] = quantity;

                postData(data, "select", id_user);
            } else {
                data["Quantity"] = quantity;
                console.log(quantity);
                console.log(id_product);
                console.log($id_order);
                putData(data, id_product, $id_order)
            }

        },
        error: function (textStatus, errorThrown) {
            alert("Status: " + textStatus);
            alert("Error: " + errorThrown);
        }
    });
}

function postData(datajson, table, id_user) {
    $.ajax({
        type: "POST",
        url: "http://localhost:3000/api/" + table + "/",
        data: JSON.stringify(datajson),
        contentType: "application/json; charset=utf-8",
        crossDomain: true,
        dataType: "json",
        async: false,
        success: function (data) {
            console.log(data);
            if(table == "order"){
                $id_order = getId_order(id_user);
                console.log($id_order);
                return $id_order;
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

function putData(datajson, id_product, $id_order) {
    $.ajax({
        type: "PUT",
        url: "http://localhost:3000/api/select/" + id_product + "/" + $id_order,
        data: JSON.stringify(datajson),
        contentType: "application/json; charset=utf-8",
        crossDomain: true,
        dataType: "json",
        success: function (data) {
            console.log(data);
        },
        error: function (jqXHR, status) {
            // error handler
            console.log(jqXHR);
            alert('fail' + status.code);
        }
    });
}

window.onload = getCategorie();
window.onload = getSearch();
window.onload = getPrice();
window.onload = getNBRProducts();
window.onload = yHandler;
window.onscroll = yHandler;
$id_order=null;