const express = require('express'),
      path = require('path'),
      morgan = require('morgan'),
      mysql = require('mysql'),
      myConnection = require('express-myconnection');

const app = express();

// Importando rutas
var listCategoriesHomeRoute = require('./routes/list-categories-home');

// Setings
app.set('port', process.env.PORT || 4000);
app.set('view engine','ejs');
app.set('views', path.join(__dirname, 'views'));

// Middleweres
app.use(morgan('dev'));

app.use(myConnection(mysql, {
    host: 'us-cdbr-east-05.cleardb.net',
    database:'heroku_fa01200bfaa5ab0',
    user: process.env.DB_USERNAME,
    password: process.env.DB_PASSWORD,
    connectionLimit: 10,
    connectTimeout: 15000,
    // rowsAsArray: false,
    enableKeepAlive: true,
    multipleStatements: true
}, 'pool'));
app.use(express.json());
app.use(express.urlencoded({extended: false}));

/*// Usando pool
const pool = mysql.createPool({
    host: 'us-cdbr-east-05.cleardb.net',
    database:'heroku_fa01200bfaa5ab0',
    user: 'bd97e789a86a2e',
    password: '7fda18de'
});*/

app.use('/', listCategoriesHomeRoute);


// Static files
app.use(express.static(path.join(__dirname, 'public')));

// Start server
app.listen(app.get('port'), function(){
    console.log(`Listen server on port ${app.get('port')}`); 
})