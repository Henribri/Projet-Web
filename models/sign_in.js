var db = require('../dbconnection'); //reference of dbconnection.js  
var Sign_in = {  
    getAllSignin: function(callback) {
        return db.query("SELECT _event.Id_event, _event.Name_event, _user.Id_user, _user.Name_user, _user.Surname_user FROM web_project._sign_in join _user on _user.Id_user = _sign_in.Id_user join _event on _event.Id_event = _sign_in.Id_event;", callback);  
    },
    getSigninById: function(id, callback) {  
        return db.query("SELECT _user.Name_user, _user.Surname_user FROM web_project._sign_in join _user on _user.Id_user = _sign_in.Id_user where _sign_in.Id_event=?", [id], callback);  
    }, 
};  
module.exports = Sign_in;