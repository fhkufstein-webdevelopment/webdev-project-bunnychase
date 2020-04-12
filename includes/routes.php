<?php

//define Routes
$route['/'] = array('controller' => 'LoginController', 'uniqueName' => 'login');
$route['/index'] = array('controller' => 'LoginController', 'uniqueName' => 'login');
$route['/index.html'] = array('controller' => 'LoginController', 'uniqueName' => 'login');


$route['/login'] = array('controller' => 'LoginController', 'uniqueName' => 'login');
$route['/login.html'] = array('controller' => 'LoginController', 'uniqueName' => 'login');

$route['/logout'] = array('controller' => 'LogoutController', 'uniqueName' => 'logout');
$route['/logout.html'] = array('controller' => 'LogoutController', 'uniqueName' => 'logout');

//$route['/adresse'] = array('controller' => 'AddressDetailController', 'uniqueName' => 'addressdetail');

//route zu meinem Spiel
$route['/game'] = array('controller' => 'GameController', 'uniqueName' => 'game');
$route['/game.html'] = array('controller' => 'GameController', 'uniqueName' => 'game');
