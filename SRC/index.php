<?php

session_start();

use SRC\Autoloader;
use SRC\Controllers\MainController;

require_once 'bootstrap.php';

Autoloader::register();

new MainController();


?>
