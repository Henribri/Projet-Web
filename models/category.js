var db = require('../dbconnection'); //reference of dbconnection.js  
var Category = {  
    getAllCategories: function(callback) {  
        return db.query("Select * from _categorie", callback);  
    },  
    getCategoriesById: function(id, callback) {  
        return db.query("select * from _categorie where Id_Category=?", [id], callback);  
    },  
    addCategories: function(Category, callback) {  
        return db.query("Insert into _categorie(Category) values(?)", [Category.Category], callback);  
    },  
    deleteCategories: function(id, callback) {  
        return db.query("delete from _categorie where id_category=?", [id], callback);  
    },  
    updateCategories: function(id, Category, callback) {  
        return db.query("update _categorie set Category=? where Id_category=?", [Category.Category, id], callback);  
    }  
};  
module.exports = Category;