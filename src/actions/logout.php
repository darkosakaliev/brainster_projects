<?php 
require_once __DIR__ . "/../autoload.php";
session_destroy();
redirect(route('login'));