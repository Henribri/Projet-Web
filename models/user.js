var db = require('../dbconnection'); //reference of dbconnection.js  
var User = {  
    getAllUsers: function(callback) {  
        return db.query("Select * from users", callback);  
    },  
    getUsersById: function(id, callback) {  
        return db.query("Select * from users where Id_user=?", [id], callback);  
    },  
    addUsers: function(User, callback) {  
        return db.query("Insert into users(Name_user, Surname_user, Localisation_user, Email_user, Password_user, Id_status) values(?,?,?,?,?,?)", [User.Name_user, User.Surname_user, User.Localisation_user, User.Email_user, User.Password_user, User.Id_status], callback);  
    },  
    deleteUsers: function(id, callback) {  
        return db.query("Delete from users where Id_user=?", [id], callback);  
    },  
    updateUsers: function(id, User, callback) {  
        return db.query("Update users set Name_user=?,Surname_user=?,Localisation_user=?,Email_user=?,Password_user=?,Id_status=? where Id_user=?", [User.Name_user, User.Surname_user, User.Localisation_user, User.Email_user, User.Password_user, User.Id_status, id], callback);  
    }  
};  
module.exports = User;