var db = require('../dbconnection'); //reference of dbconnection.js  
var Product = {  
    getAllProducts: function(callback) {  
        return db.query("Select * from products", callback);  
    },  
    getProductsById: function(id, callback) {  
        return db.query("Select * from products where Id_product=?", [id], callback);  
    },  
    addProducts: function(Product, callback) {  
        return db.query("Insert into products(Name_product, Description_product, Price_product, Id_category, Id_image) values(?,?,?,?,?)", [Product.Name_product, Product.Description_product, Product.Price_product, Product.Id_category, Product.Id_image], callback);  
    },  
    deleteProducts: function(id, callback) {  
        return db.query("Delete from products where Id_product=?", [id], callback);  
    },  
    updateProducts: function(id, Product, callback) {  
        return db.query("Update products set Name_product=?,Description_product=?,Price_product=? where Id_product=?", [Product.Name_product, Product.Description_product, Product.Price_product, id], callback);  
    }  
};  
module.exports = Product;