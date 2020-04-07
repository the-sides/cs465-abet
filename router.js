var express = require('express');
var router = express.Router();

/* GET home page. */
router.get('/', function(req, res, next) {
  res.render('login.html');
});

/* GET abet page. */
router.get('/abet', function(req, res, next) {
  res.render('abet.html');
});

module.exports = router;
