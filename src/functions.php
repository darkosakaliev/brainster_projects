<?php

function getAllBooks($con)
{
  $sql  = "SELECT books.id, books.title, CONCAT(authors.first_name,' ',authors.last_name) AS author, books.date_of_issue, books.number_of_pages, books.cover, categories.name as category, books.description FROM books LEFT JOIN `authors` ON books.author_id = authors.id LEFT JOIN `categories` ON books.category_id = categories.id WHERE books.is_deleted = 0;";
  $stmt = $con->prepare($sql);
  $stmt->execute();

  if ($stmt->rowCount() > 0) {
    $books = $stmt->fetchAll();
  } else {
    $books = 0;
  }

  return $books;
}

function getAllDeletedBooks($con)
{
  $sql  = "SELECT books.id, books.title, CONCAT(authors.first_name,' ',authors.last_name) AS author, books.date_of_issue, books.number_of_pages, books.cover, categories.name as category, books.description FROM books LEFT JOIN `authors` ON books.author_id = authors.id LEFT JOIN `categories` ON books.category_id = categories.id WHERE books.is_deleted = 1;";
  $stmt = $con->prepare($sql);
  $stmt->execute();

  if ($stmt->rowCount() > 0) {
    $books = $stmt->fetchAll();
  } else {
    $books = 0;
  }

  return $books;
}

function getBook($con, $id)
{
  $sql = "SELECT books.id, books.title, CONCAT(authors.first_name,' ',authors.last_name) AS author, books.date_of_issue, books.number_of_pages, books.cover, books.description, categories.name as category, authors.bio FROM books LEFT JOIN `authors` ON books.author_id = authors.id LEFT JOIN `categories` ON books.category_id = categories.id WHERE books.id = :id;";
  $stmt = $con->prepare($sql);
  $stmt->execute(['id' => $id]);

  if ($stmt->rowCount() > 0) {
    $book = $stmt->fetch();
  } else {
    $book = 0;
  }

  return $book;
}

function getAllCategories($con) {
  $sql = "SELECT * FROM categories WHERE categories.is_deleted = 0";
  $stmt = $con->prepare($sql);
  $stmt->execute();

  if ($stmt->rowCount() > 0) {
    $categories = $stmt->fetchAll();
  } else {
    $categories = 0;
  }

  return $categories;
}

function getAllDeletedCategories($con) {
  $sql = "SELECT * FROM categories WHERE categories.is_deleted = 1";
  $stmt = $con->prepare($sql);
  $stmt->execute();

  if ($stmt->rowCount() > 0) {
    $categories = $stmt->fetchAll();
  } else {
    $categories = 0;
  }

  return $categories;
}

function getAllAuthors($con) {
  $sql = "SELECT authors.id, CONCAT(authors.first_name,' ',authors.last_name) AS name, authors.bio FROM authors WHERE authors.is_deleted = 0";
  $stmt = $con->prepare($sql);
  $stmt->execute();

  if ($stmt->rowCount() > 0) {
    $authors = $stmt->fetchAll();
  } else {
    $authors = 0;
  }

  return $authors;
}

function getAllDeletedAuthors($con) {
  $sql = "SELECT authors.id, CONCAT(authors.first_name,' ',authors.last_name) AS name, authors.bio FROM authors WHERE authors.is_deleted = 1";
  $stmt = $con->prepare($sql);
  $stmt->execute();

  if ($stmt->rowCount() > 0) {
    $authors = $stmt->fetchAll();
  } else {
    $authors = 0;
  }

  return $authors;
}

function printSessionMessages()
{

  if (isset($_SESSION['msg'])) {
    if ($_SESSION['msg']['status'] == 1) {
      echo "<div class='alert alert-success text-center'>{$_SESSION['msg']['text']}</div>";
    } else {
      echo "<div class='alert alert-danger text-center'>{$_SESSION['msg']['text']}</div>";
    }
    unset($_SESSION['msg']);
  }
}

function printValidationMessages($val)
{
  if (isset($_SESSION['val'])) {
    if ($_SESSION['val'][$val] == 1) {
      echo "<span class='form-control alert-danger mt-2'>{$_SESSION['val']['text']}</span>";
    }
    unset($_SESSION['val']);
  }
}

function input_data($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function asset($location)
{
  $path = [APP_URL, "assets", $location];

  foreach ($path as $key => $part) {

    $path[$key] = trim($part, "/",);
  }
  return implode("/", $path);
}

function route($route, $id = null)
{
  global $appRoutes;

  return str_replace("{ID}", $id, $appRoutes[$route]) ?? "";
}

function logMessage($msg)
{
  $location = [__DIR__, "logs", date("Y-m-d") . ".txt"];

  $msg = date("H:i:s >>> ") . $msg;

  $location = implode("/", $location);

  file_put_contents($location, $msg . PHP_EOL, FILE_APPEND);
}

function redirect($route)
{
  header("Location: $route");
  die();
}

function auth()
{
  return isset($_SESSION['user']);
}

function admin()
{
  if (isset($_SESSION['user']) && $_SESSION['user']['role_id'] == 2) {
    return true;
  } else {
    return false;
  }
}

function adminOnly()
{
    if (!admin()) {
        redirect(route('home'));
    }
}