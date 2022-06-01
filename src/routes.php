<?php

$appUrl = trim(APP_URL, "/") . "/";

$appRoutes = [
    'home' => $appUrl . "pages/index.php",
    'login' => $appUrl . "pages/login.php",
    'register' => $appUrl . "pages/register.php",
    'book' => $appUrl . "pages/book.php?id={ID}",
    '404' => $appUrl . "pages/404.html",
    'auth.login' => $appUrl . "actions/auth.php?action=login",
    'auth.register' => $appUrl . "actions/auth.php?action=register",
    'logout' => $appUrl . "actions/logout.php",
    'addProduct' => $appUrl . "actions/products/store.php",
    'deleteProduct' => $appUrl . "actions/products/delete.php?id={ID}",
    'editProduct' => $appUrl . "pages/products/edit.php?id={ID}",
    'updateProduct' => $appUrl . "actions/products/update.php?id={ID}"
];
