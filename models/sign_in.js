var db = require('../dbconnection'); //reference of dbconnection.js  
var Sign_in = {  
    getAllSignin: function(callback) {
        return db.query("Select * from sign_in", callback);  
    }
};  
module.exports = Sign_in;