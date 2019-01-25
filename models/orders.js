var db = require('../dbconnection'); //reference of dbconnection.js  
var Order = {  
    getAllOrders: function(callback) {  
        return db.query("Select * from orders", callback);  
    },  
    getOrdersById: function(id, callback) {  
        return db.query("select * from orders where Id_order=?", [id], callback);  
    },  
    addOrders: function(Order, callback) {  
        return db.query("Insert into orders(Date_order, Validate, Id_user) values(?,?,?)", [Order.Date_order, Order.Validate, Order.Id_user], callback);  
    },  
    deleteOrders: function(id, callback) {  
        return db.query("delete from orders where Id_order=?", [id], callback);  
    },  
    updateOrders: function(id, Order, callback) {  
        return db.query("update orders set Date_order=?,Validate=? where Id_order=?", [Order.Date_order, Order.Validate, id], callback);  
    }  
};  
module.exports = Order;