var db = require('../dbconnection'); //reference of dbconnection.js  
var Comment = {  
    getAllComments: function(callback) {  
        return db.query("Select * from comments", callback);  
    },  
    getCommentsById: function(id, callback) {  
        return db.query("select * from comments where Id_comment=?", [id], callback);  
    },  
    addComments: function(Comment, callback) {  
        return db.query("Insert into comments(Comment_comment, Public_comment, Date_Approbation_comments, Id_user, Id_photo, Id_user_Users) values(?,?,?,?,?,?)", [Comment.Comment_comment, Comment.Public_comment, Comment.Date_Approbation_comments, Comment.Id_user, Comment.Id_photo, Comment.Id_user_Users], callback);  
    },  
    deleteComments: function(id, callback) {  
        return db.query("delete from comments where Id_comment=?", [id], callback);  
    },  
    updateComments: function(id, Comment, callback) {  
        return db.query("update comments set Comment_comment=?,Public_comment=? where Id_comment=?", [Comment.Comment_comment, Comment.Public_comment, id], callback);  
    }  
};  
module.exports = Comment;