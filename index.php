<?php
require 'app/init.php';

use App\Controllers\LoginController;
use App\Controllers\RegisterController;
use App\Controllers\RoleController;
use App\Router;

$baseurl = '/master-cook/'; 

Router::add('GET', $baseurl, RoleController::class, 'index');
Router::add('GET', $baseurl . 'admin-register', RoleController::class, 'adminRegister');
Router::add('POST', $baseurl . 'admin-register', RegisterController::class, 'adminRegister');
Router::add('GET', $baseurl . 'admin-login', RoleController::class, 'adminLogin');
Router::add('POST', $baseurl . 'admin-login', LoginController::class, 'adminLogin');
Router::add('GET', $baseurl . 'chef-register', RoleController::class, 'chefRegister');
Router::add('POST', $baseurl . 'chef-register', RegisterController::class, 'chefRegister');
Router::add('GET', $baseurl . 'chef-login', RoleController::class, 'chefLogin');
Router::add('POST', $baseurl . 'chef-login', LoginController::class, 'chefLogin');
Router::add('GET', $baseurl . 'pengguna-register', RoleController::class, 'penggunaRegister');
Router::add('POST', $baseurl . 'pengguna-register', RegisterController::class, 'penggunaRegister');
Router::add('GET', $baseurl . 'pengguna-login', RoleController::class, 'penggunaLogin');
Router::add('POST', $baseurl . 'pengguna-login', LoginController::class, 'penggunaLogin');
// Router::add('POST', $baseurl . 'tamu-reservasi', TamuController::class, 'reservasi',[MustLoginTamuMiddleware::class]);
// Router::add('GET', $baseurl . 'tamu-tagihan/([0-9a-zA-Z]*)', TamuController::class, 'setTagihan',[MustLoginTamuMiddleware::class]);

Router::run();
?>