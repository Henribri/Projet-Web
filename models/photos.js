var db = require('../dbconnection'); //reference of dbconnection.js  
var Photo = {  
    getAllPhotos: function(callback) {  
        return db.query("SELECT _photo.Id_photo, _photo.Public_photo, _photo.Date_Approbation_photos, _event.Name_event, _image.image, _user.Name_user, _user.Surname_user FROM web_project._photo join _event on _event.Id_event = _photo.Id_event join _image on _image.Id_image = _photo.Id_image join _user on _user.Id_user = _photo.Id_user", callback);  
    },  
    getPhotosById: function(id, callback) {  
        return db.query("SELECT _photo.Id_photo, _photo.Public_photo, _photo.Date_Approbation_photos, _event.Name_event, _image.image, _user.Name_user, _user.Surname_user FROM web_project._photo join _event on _event.Id_event = _photo.Id_event join _image on _image.Id_image = _photo.Id_image join _user on _user.Id_user = _photo.Id_user where _photo.Id_photo=?", [id], callback);  
    },  
    addPhotos: function(Photo, callback) {  
        return db.query("Insert into _photo(Public_photo, Date_Aprobation_photos, Id_event, Id_image, Id_user) values(?,?,?,?,?)", [Photo.Public_photo, Photo.Date_Aprobation_photos, Photo.Id_event, Photo.Id_image, Photo.Id_user], callback);  
    },  
    deletePhotos: function(id, callback) {  
        return db.query("Delete from _photo where Id_photo=?", [id], callback);  
    },  
    updatePhotos: function(id, Photo, callback) {  
        return db.query("Update _photo set Public_photo=?,Date_Aprobation_photos=? where Id_photo=?", [Photo.Public_photo, Photo.Date_Aprobation_photos, id], callback);  
    }  
};  
module.exports = Photo;