const express = require('express');
const router = express.Router();

var listarCategoriasHome = require('../controllers/list-categories-home');

router.post('/search', listarCategoriasHome.getText);
router.get('/', listarCategoriasHome.list);

module.exports = router;