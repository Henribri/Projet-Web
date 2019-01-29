var db = require('../dbconnection'); //reference of dbconnection.js  
var Comment = {  
    getAllComments: function(callback) {  
        return db.query("SELECT * FROM web_project._comment join _user on _comment.Id_user = _user.Id_user join _photo on _photo.Id_photo = _comment.Id_photo;", callback);  
    },  
    getCommentsById: function(id, callback) {  
        return db.query("SELECT * FROM web_project._comment join _user on _comment.Id_user = _user.Id_user join _photo on _photo.Id_photo = _comment.Id_photo where _comment.Id_comment=?", [id], callback);  
    },  
    addComments: function(Comment, callback) {  
        return db.query("Insert into _comment(Comment_comment, Public_comment, Date_Approbation_comments, Id_user, Id_photo, Id_user_Users) values(?,?,?,?,?,?)", [Comment.Comment_comment, Comment.Public_comment, Comment.Date_Approbation_comments, Comment.Id_user, Comment.Id_photo, Comment.Id_user_Users], callback);  
    },  
    deleteComments: function(id, callback) {  
        return db.query("delete from _comment where Id_comment=?", [id], callback);  
    },  
    updateComments: function(id, Comment, callback) {  
        return db.query("update _comment set Comment_comment=?,Public_comment=? where Id_comment=?", [Comment.Comment_comment, Comment.Public_comment, id], callback);  
    }  
};  
module.exports = Comment;