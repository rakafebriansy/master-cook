<?php
require 'app/init.php';

use App\Controllers\AkunController;
use App\Controllers\DashboardController;
use App\Controllers\LoginController;
use App\Controllers\RegisterController;
use App\Controllers\RoleController;
use App\Router;

$baseurl = '/master-cook/'; 

Router::add('GET', $baseurl, RoleController::class, 'index');
Router::add('GET', $baseurl . 'role', RoleController::class, 'role');
Router::add('GET', $baseurl . 'admin-register', RoleController::class, 'adminRegister');
Router::add('GET', $baseurl . 'admin-register', RegisterController::class, 'adminRegister');
Router::add('GET', $baseurl . 'admin-dashboard', DashboardController::class, 'adminDashboard');
Router::add('GET', $baseurl . 'admin-data-akun', AkunController::class, 'adminDataAkun');
Router::add('GET', $baseurl . 'admin-data-pengguna', AkunController::class, 'adminDataPengguna');
Router::add('GET', $baseurl . 'admin-data-chef', AkunController::class, 'adminDataChef');
Router::add('GET', $baseurl . 'admin-verifikasi-akun', AkunController::class, 'adminVerifikasiAkun');
Router::add('GET', $baseurl . 'admin-verifikasi-pengguna', AkunController::class, 'adminVerifikasiPengguna');
Router::add('GET', $baseurl . 'admin-verifikasi-chef', AkunController::class, 'adminVerifikasiChef');
Router::add('GET', $baseurl . 'login', RoleController::class, 'login');
Router::add('POST', $baseurl . 'login', LoginController::class, 'login');
Router::add('GET', $baseurl . 'chef-register', RoleController::class, 'chefRegister');
Router::add('POST', $baseurl . 'chef-register', RegisterController::class, 'chefRegister');
Router::add('GET', $baseurl . 'pengguna-register', RoleController::class, 'penggunaRegister');
Router::add('POST', $baseurl . 'pengguna-register', RegisterController::class, 'penggunaRegister');
Router::add('GET', $baseurl . 'pengguna-dashboard', DashboardController::class, 'penggunaDashboard');
Router::add('GET', $baseurl . 'chef-dashboard', DashboardController::class, 'chefDashboard');
// Router::add('POST', $baseurl . 'tamu-reservasi', TamuController::class, 'reservasi',[MustLoginTamuMiddleware::class]);
// Router::add('GET', $baseurl . 'tamu-tagihan/([0-9a-zA-Z]*)', TamuController::class, 'setTagihan',[MustLoginTamuMiddleware::class]);

Router::run();
?>