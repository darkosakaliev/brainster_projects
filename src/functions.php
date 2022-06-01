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

function getBook($con, $id) {
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