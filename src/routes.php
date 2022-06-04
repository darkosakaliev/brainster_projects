<?php

$appUrl = trim(APP_URL, "/") . "/";

$appRoutes = [
    'home' => $appUrl . "pages/index.php",
    'login' => $appUrl . "pages/login.php",
    'register' => $appUrl . "pages/register.php",
    'book' => $appUrl . "pages/book.php?id={ID}",
    '404' => $appUrl . "pages/404.html",
    'logout' => $appUrl . "actions/logout.php",
    'authors' => $appUrl . "pages/authors.php",
    'categories' => $appUrl . "pages/categories.php",
    'books' => $appUrl . "pages/books.php",
    'createCategory' => $appUrl . "pages/categories/create.php",
    'addCategory' => $appUrl . "actions/categories/store.php",
    'editCategory' => $appUrl . "pages/categories/edit.php?id={ID}",
    'updateCategory' => $appUrl . "actions/categories/update.php?id={ID}",
    'deleteCategory' => $appUrl . "actions/categories/delete.php?id={ID}",
    'restoreCategory' => $appUrl . "actions/categories/restore.php?id={ID}",
    'createAuthor' => $appUrl . "pages/authors/create.php",
    'addAuthor' => $appUrl . "actions/authors/store.php",
    'editAuthor' => $appUrl . "pages/authors/edit.php?id={ID}",
    'updateAuthor' => $appUrl . "actions/authors/update.php?id={ID}",
    'deleteAuthor' => $appUrl . "actions/authors/delete.php?id={ID}",
    'restoreAuthor' => $appUrl . "actions/authors/restore.php?id={ID}",
    'createBook' => $appUrl . "pages/books/create.php",
    'addBook' => $appUrl . "actions/books/store.php",
    'editBook' => $appUrl . "pages/books/edit.php?id={ID}",
    'updateBook' => $appUrl . "actions/books/update.php?id={ID}",
    'deleteBook' => $appUrl . "actions/books/delete.php?id={ID}",
    'restoreBook' => $appUrl . "actions/books/restore.php?id={ID}"
];
