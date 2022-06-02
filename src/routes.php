<?php

$appUrl = trim(APP_URL, "/") . "/";

$appRoutes = [
    'home' => $appUrl . "pages/index.php",
    'login' => $appUrl . "pages/login.php",
    'register' => $appUrl . "pages/register.php",
    'book' => $appUrl . "pages/book.php?id={ID}",
    '404' => $appUrl . "pages/404.html",
    'logout' => $appUrl . "actions/logout.php"
];
