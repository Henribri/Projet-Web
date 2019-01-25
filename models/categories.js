var db = require('../dbconnection'); //reference of dbconnection.js  
var Category = {  
    getAllCategories: function(callback) {  
        return db.query("Select * from categories", callback);  
    },  
    getCategoriesById: function(id, callback) {  
        return db.query("select * from categories where Id_Category=?", [id], callback);  
    },  
    addCategories: function(Category, callback) {  
        return db.query("Insert into categories(Category) values(?)", [Category.Category], callback);  
    },  
    deleteCategories: function(id, callback) {  
        return db.query("delete from categories where id_category=?", [id], callback);  
    },  
    updateCategories: function(id, Category, callback) {  
        return db.query("update categories set Category=? where Id_category=?", [Category.Category, id], callback);  
    }  
};  
module.exports = Category;