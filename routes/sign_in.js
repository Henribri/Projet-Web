var express = require('express');
var router = express.Router();
var Sign_in = require('../models/Sign_in');

router.get('/:id?', function(req, res, next) {  
    if (req.params.id) {  
        Sign_in.getSigninById(req.params.id, function(err, rows) {  
            if (err) {  
                res.json(err);  
            } else {  
                res.json(rows);  
            }  
        });  
    } else {  
        Sign_in.getAllSignin(function(err, rows) {  
            if (err) {  
                res.json(err);  
            } else {  
                res.json(rows);  
            }  
        });  
    }  
});  

module.exports = router;