var db = require('../dbconnection'); //reference of dbconnection.js  
var State = {  
    getAllState: function(callback) {  
        return db.query("Select * from state", callback);  
    },  
    getStateById: function(id, callback) {  
        return db.query("Select * from state where Id_state=?", [id], callback);  
    },  
    addState: function(State, callback) {  
        return db.query("Insert into state(State) values(?)", [State.State], callback);  
    },  
    deleteState: function(id, callback) {  
        return db.query("Delete from state where Id_state=?", [id], callback);  
    },  
    updateState: function(id, State, callback) {  
        return db.query("Update state set State=? where Id_state=?", [State.State, id], callback);  
    }  
};  
module.exports = State;