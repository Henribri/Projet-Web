var db = require('../dbconnection'); //reference of dbconnection.js  
var Photo = {  
    getAllPhotos: function(callback) {  
        return db.query("Select * from photos", callback);  
    },  
    getPhotosById: function(id, callback) {  
        return db.query("Select * from photos where Id_photo=?", [id], callback);  
    },  
    addPhotos: function(Photo, callback) {  
        return db.query("Insert into photos(Public_photo, Date_Aprobation_photos, Id_event, Id_image, Id_user) values(?,?,?,?,?)", [Photo.Public_photo, Photo.Date_Aprobation_photos, Photo.Id_event, Photo.Id_image, Photo.Id_user], callback);  
    },  
    deletePhotos: function(id, callback) {  
        return db.query("Delete from photos where Id_photo=?", [id], callback);  
    },  
    updatePhotos: function(id, Photo, callback) {  
        return db.query("Update photos set Public_photo=?,Date_Aprobation_photos=? where Id_photo=?", [Photo.Public_photo, Photo.Date_Aprobation_photos, id], callback);  
    }  
};  
module.exports = Photo;