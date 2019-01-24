var db = require('../dbconnection'); //reference of dbconnection.js  
var Event = {  
    getAllEvents: function(callback) {  
        return db.query("Select * from events", callback);  
    },  
    getEventsById: function(id, callback) {  
        return db.query("select * from events where Id_event=?", [id], callback);  
    },  
    addEvent: function(Event, callback) {  
        return db.query("Insert into events(Name_event, Description_event, Date_event, Recurent_event, Cost_event, Public_event, Date_Approbation_events, Id_user, Id_state, Id_user_Users, Id_image, Id_user_Users_Approuver) values(?,?,?,?,?,?,?,?,?,?,?,?)", [Event.Name_event, Event.Description_event, Event.Date_event, Event.Recurent_event, Event.Cost_event, Event.Public_event, Event.Date_Approbation_events, Event.Id_user, Event.Id_state, Event.Id_user_Users, Event.Id_image, Event.Id_user_Users_Approuver], callback);  
    },  
    deleteEvent: function(id, callback) {  
        return db.query("delete from events where id_event=?", [id], callback);  
    },  
    updateEvent: function(id, Event, callback) {  
        return db.query("update events set Name_event=?,Description_event=?,Date_event=?,Recurent_event=?,Cost_event=?,Public_event=? where Id_event=?", [Event.Name_event, Event.Description_event, Event.Date_event, Event.Recurent_event, Event.Cost_event, Event.Public_event, id], callback);  
    }  
};  
module.exports = Event;