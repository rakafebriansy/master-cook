<?php
require 'app/init.php';

use App\Controllers\RoleController;
use App\Router;

$baseurl = '/master-cook/'; 

Router::add('GET', $baseurl, RoleController::class, 'index');
// Router::add('POST', $baseurl . 'tamu-reservasi', TamuController::class, 'reservasi',[MustLoginTamuMiddleware::class]);
// Router::add('GET', $baseurl . 'tamu-tagihan/([0-9a-zA-Z]*)', TamuController::class, 'setTagihan',[MustLoginTamuMiddleware::class]);

Router::run();
?>