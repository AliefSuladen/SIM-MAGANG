<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');
$routes->get('/', 'Login::index');
$routes->get('dashboard', 'Admin::index');
$routes->get('addadm', 'Admin::add');
$routes->post('insertadm', 'Admin::insertadm');

$routes->get('listsiswa', 'Admin::listsiswa');
$routes->get('addsiswa', 'Admin::addsiswa');
$routes->post('insertsiswa', 'Admin::insertsiswa');

//magang
$routes->get('listmagang', 'Admin::listmagang');
$routes->get('addmagang', 'Admin::addmagang');
$routes->get('editmagang/(:num)', 'Admin::editmagang/$1');
$routes->post('insertmagang', 'Admin::insertmagang');
$routes->post('updatemagang/(:num)', 'Admin::updatemagang/$1');

$routes->get('listnilai/(:num)', 'Admin::listnilai/$1');
$routes->get('addnilai/(:num)', 'Admin::addnilai/$1');
$routes->post('insertnilai/(:num)', 'Admin::insertnilai/$1');
