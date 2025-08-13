<?php

require_once __DIR__.'/router.php';


get('/', 'views/index.php');
get('/login', 'views/login.php');
get('/signup', 'views/signup.php');
get('/add', 'views/add_contact.php');
get('/logout', 'control/logout.php');
post('/controller', 'control/controller.php');

any('/404','views/404.php');