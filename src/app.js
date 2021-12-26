const express = require('express'),
      path = require('path'),
      morgan = require('morgan'),
      mysql = require('mysql'),
      myConnection = require('express-myconnection');

const app = express();

// Importando rutas
// var listaLibroRoute = require('./routes/listarLibros');

// Setings
app.set('port', process.env.PORT || 3000);
app.set('view engine','ejs');
app.set('views', path.join(__dirname, 'views'));

// Middleweres
app.use(morgan('dev'));

/*app.use(myConnection(mysql, {
    host: 'us-cdbr-east-05.cleardb.net',
    database:'heroku_fa01200bfaa5ab0',
    user: 'bd97e789a86a2e',
    password: '7fda18de'
    // port: 3306
}, 'single')); */

// Usando pool
const pool = mysql.createPool({
    host: 'us-cdbr-east-05.cleardb.net',
    database:'heroku_fa01200bfaa5ab0',
    user: 'bd97e789a86a2e',
    password: '7fda18de'
});

app.use(express.json());
app.use(express.urlencoded({extended: false}));

// routes
/* app.use('/', listaLibroRoute); */


// Static files
app.use(express.static(path.join(__dirname, 'public')));

// Start server
app.listen(app.get('port'), function(){
    console.log(`Listen server on port ${app.get('port')}`); 
})
app.get('/', function(req, res){
    res.send("Aqui va mi sitio web")
})