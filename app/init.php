<?php

session_start();

require 'app/Database.php';
require 'app/Seeder.php';
require 'app/View.php';
require 'app/Router.php';
require 'app/models/kelas_masak.php';
require 'app/models/user.php';
require 'app/models/pendaftaran_kelas.php';
require 'app/Controllers/LoginController.php';
require 'app/Controllers/RegisterController.php';
require 'app/Controllers/RoleController.php';
require 'app/Controllers/DashboardController.php';
require 'app/Controllers/AkunController.php';
// require 'app/Middleware/MustLoginMiddleware.php';

?>