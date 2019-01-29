var db = require('../dbconnection'); //reference of dbconnection.js  
var Product = {  
    getAllProducts: function(callback) {  
        return db.query("SELECT * FROM web_project._product join _image on _product.Id_image = _image.Id_image join _categorie on _categorie.Id_category = _product.Id_category", callback);  
    },  
    getProductsById: function(id, callback) {  
        return db.query("SELECT * FROM web_project._product join _image on _product.Id_image = _image.Id_image join _categorie on _categorie.Id_category = _product.Id_category where _product.Id_product=?", [id], callback);  
    },  
    addProducts: function(Product, callback) {  
        return db.query("Insert into _product(Name_product, Description_product, Price_product, Id_category, Id_image) values(?,?,?,?,?)", [Product.Name_product, Product.Description_product, Product.Price_product, Product.Id_category, Product.Id_image], callback);  
    },  
    deleteProducts: function(id, callback) {  
        return db.query("Delete from _product where Id_product=?", [id], callback);  
    },  
    updateProducts: function(id, Product, callback) {  
        return db.query("Update _product set Name_product=?,Description_product=?,Price_product=? where Id_product=?", [Product.Name_product, Product.Description_product, Product.Price_product, id], callback);  
    }  
};  
module.exports = Product;