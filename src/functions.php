<?php

function getAllBooks($con)
{
  $sql  = "SELECT books.id, books.title, authors.name AS author, books.date_of_issue, books.number_of_pages, books.cover, categories.name as category FROM books LEFT JOIN `authors` ON books.author_id = authors.id LEFT JOIN `categories` ON books.category_id = categories.id;";
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
  $sql = "SELECT books.id, books.title, authors.name AS author, books.date_of_issue, books.number_of_pages, books.cover, books.description, categories.name as category FROM books LEFT JOIN `authors` ON books.author_id = authors.id LEFT JOIN `categories` ON books.category_id = categories.id WHERE books.id = :id;";
  $stmt = $con->prepare($sql);
  $stmt->execute(['id' => $id]);

  if ($stmt->rowCount() > 0) {
    $book = $stmt->fetch();
  } else {
    $book = 0;
  }

  return $book;
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

function printValidationMessages($value) {
  if ($_SESSION['val']['username'] == 1) {
    echo "<span class='form-control alert-danger'>Username field must be filled.</span>";
  } else if($_SESSION['val']['username'] == 2) {
    echo "<span class='form-control alert-danger'>Username must be minimum 6 characters long.</span>";
  } else if($_SESSION['val']['email'] == 1) {
    echo "<span class='form-control alert-danger'>Email field must be filled.</span>";
  } else if($_SESSION['val']['email'] == 2) {
    echo "<span class='form-control alert-danger'>Username must be minimum 6 characters long.</span>";
  }
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

function admin() {
  if(isset($_SESSION['user']) && $_SESSION['user']['role_id'] == 2) {
    return true;
  } else {
    return false;
  }
}