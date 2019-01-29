var db = require('../dbconnection'); //reference of dbconnection.js  
var Order = {  
    getAllOrders: function(callback) {  
        return db.query("Select * from _order", callback);  
    },  
    getOrdersById: function(id, callback) {  
        return db.query("Select * from _order join _select on _order.Id_order = _select.Id_order where _order.Id_order=?", [id], callback);  
    },
    getOrdersByUser: function(id, callback) {  
        return db.query("Select * from _order join _select on _order.Id_order = _select.Id_order where _order.Id_user=?", [id], callback);  
    },   
    addOrders: function(Order, callback) {  
        return db.query("Insert into _order(Date_order, Validate, Id_user) values(?,?,?)", [Order.Date_order, Order.Validate, Order.Id_user], callback);  
    },  
    deleteOrders: function(id, callback) {  
        return db.query("delete from _order where Id_order=?", [id], callback);  
    },  
    updateOrders: function(id, Order, callback) {  
        return db.query("update _order set Date_order=?,Validate=? where Id_order=?", [Order.Date_order, Order.Validate, id], callback);  
    }  
};  
module.exports = Order;