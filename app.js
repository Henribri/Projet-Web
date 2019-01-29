var express = require('express');
var path = require('path');
var logger = require('morgan');
var cookieParser = require('cookie-parser');
var bodyParser = require('body-parser');
var cors = require('cors');
var routes = require('./routes/index');
var Users = require('./routes/user');
var Events = require('./routes/Events')
var Categories = require('./routes/Categories')
var Comments = require('./routes/Comments')
var Orders = require('./routes/Orders')
var Photos = require('./routes/Photos')
var Products = require('./routes/Products')
var Sign_in = require('./routes/Sign_in')
var States = require('./routes/State')
var Status = require('./routes/Status')
var app = express();


// view engine setup
app.set('views', path.join(__dirname, 'views'));
app.set('view engine', 'jade');
// uncomment after placing your favicon in /public
//app.use(favicon(path.join(__dirname, 'public', 'favicon.ico')));
app.use(cors());
app.use(logger('dev'));
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: false }));
app.use(cookieParser());
app.use(express.static(path.join(__dirname, 'public')));

app.use('/api/', routes);
app.use('/api/user', Users);
app.use('/api/event', Events);
app.use('/api/category', Categories);
app.use('/api/comment', Comments);
app.use('/api/order', Orders);
app.use('/api/product', Products);
app.use('/api/signin', Sign_in);
app.use('/api/state', States);
app.use('/api/status', Status);
app.use('/api/photo', Photos);
// catch 404 and forward to error handler
app.use(function(req, res, next) {
  var err = new Error('Not Found');
  err.status = 404;
  next(err);
});
// error handlers
// development error handler
// will print stacktrace
if (app.get('env') === 'development') {
  app.use(function(err, req, res, next) {
    res.status(err.status || 500);
    res.render('error', {
      message: err.message,
      error: err
    });
  });
}
// production error handler
// no stacktraces leaked to user
app.use(function(err, req, res, next) {
  res.status(err.status || 500);
  res.render('error', {
    message: err.message,
    error: {}
  });
});
module.exports = app;