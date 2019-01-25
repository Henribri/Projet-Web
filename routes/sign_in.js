var express = require('express');
var router = express.Router();
var Sign_in = require('../models/sign_in');

router.get('/:id?', function(req, res, next) {  
    Sign_in.getAllSignin(function(err, rows) {  
        if (err) {  
            res.json(err);  
        } else {  
            res.json(rows);  
        }  
    });  
});  

module.exports = router;