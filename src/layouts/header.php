<?php
require_once __DIR__ . '/../autoload.php';
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
  <link rel="stylesheet" href="./../style.css">

  <!-- Latest Font-Awesome CDN -->
  <script src="https://kit.fontawesome.com/9c48d6723e.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    require_once __DIR__ . '/nav.php';
    printSessionMessages();
    ?>