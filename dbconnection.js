// DataBase 
var mysql = require("mysql");
var connection = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "",
  database: "project_db"
});
/*connection.connect(function(err){
  if(err){
    console.log('Error connecting to Db');
    return;
  }
  console.log('Connection established');
/*
connection.query('INSERT INTO `user`(`id_user`, `first_name`, `last_name`, `email`, `password`, `id_status_user`, `id_school`, `created_at`, `updated_at`) VALUES ([1],[bla],[bla],[bla@gmail.com],[password],[2],[1],[],[])', function (err, rows, fields) {
  console.log('insert');
})
});*/
module.exports = connection;