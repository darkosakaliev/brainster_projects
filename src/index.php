<?php
require_once __DIR__ . '/database/db_conn.php';
require_once './functions.php';
?>

<!DOCTYPE html>
<html>

<head>
  <title>Brainster Library</title>
  <meta charset="utf-8" />
  <meta name="keywords" content="" />
  <meta name="description" content="Project 2 at Brainster Full-Stack Academy" />
  <meta name="author" content="Darko Sakaliev" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />

  <!-- Latest compiled and minified Bootstrap 4.4.1 CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <!-- Custom css -->
  <link rel="stylesheet" href="./style.css">

  <!-- Latest Font-Awesome CDN -->
  <script src="https://kit.fontawesome.com/9c48d6723e.js" crossorigin="anonymous"></script>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="./index">Brainster<span class="text-primary">Library</span><i class="fa-solid fa-book-open-reader"></i></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="#">Categories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Books</a>
        </li>
      </ul>
      <a class="nav-link text-white px-0" href="">Login/Register</a>
    </div>
  </nav>
  <div class="my-4">
    <div class="row justify-content-around m-0">
      <div class="col-sm-12 mb-4 mb-md-0 col-md-2">
        <h5>Categories:</h5>
      </div>
      <div class="col-sm-12 col-md-9">
        <div class="row">
          <?php
          $books = getAllBooks($conn);
          foreach ($books as $book) {
            echo "
              <div class='col-6 col-sm-4 col-lg-4 col-xl-3 mb-3'>
                <a href='./book?id={$book['id']}'>
                  <div class='card h-100'>
                    <img class='card-img-top imagefit' src='{$book['cover']}' alt='Card image cap'>
                      <div class='card-img-overlay d-flex flex-column justify-content-center text-white'>
                        <h5 class='card-title'>'{$book['title']}'</h5>
                        <h6 class='card-title'>by {$book['author']}</h6>
                        <p class='card-subtitle'>{$book['category']}</p>
                      </div>
                  </div>
                </a>
              </div>
            ";
          }
          ?>
        </div>
      </div>
    </div>
  </div>


  <!-- jQuery library -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

  <!-- Latest Compiled Bootstrap 4.4.1 JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <!-- Custom JavaScript -->
  <script src="./main.js"></script>
</body>

</html>