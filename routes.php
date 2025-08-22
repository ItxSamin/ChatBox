<?php

require_once __DIR__.'/router.php';


get('/', 'views/index.php');
get('/login', 'views/login.php');
get('/signup', 'views/signup.php');
get('/add', 'views/add_contact.php');
get('/logout', 'control/logout.php');
get('/chat/$chatid', 'views/chat.php');
get('/ajax', 'control/ajax.php');
post('/loadpool', 'control/chtpool.php');
post('/load', 'control/load.php');
post('/controller', 'control/controller.php');
post('/ajax', 'control/ajax.php');


any('/404','views/404.php');