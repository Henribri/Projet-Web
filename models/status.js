var db = require('../dbconnection'); //reference of dbconnection.js  
var Status = {  
    getAllStatus: function(callback) {  
        return db.query("Select * from _status", callback);  
    },  
    getStatusById: function(id, callback) {  
        return db.query("Select * from _status where Id_status=?", [id], callback);  
    },  
    addStatus: function(Status, callback) {  
        return db.query("Insert into _status(Status) values(?)", [Status.Status], callback);  
    },  
    deleteStatus: function(id, callback) {  
        return db.query("Delete from _status where Id_status=?", [id], callback);  
    },  
    updateStatus: function(id, Status, callback) {  
        return db.query("Update _status set Status=? where Id_status=?", [Status.Status, id], callback);  
    }  
};  
module.exports = Status;