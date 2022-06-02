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

  <!-- Compiled and minified Bootstrap 5.1.3 CSS -->
  <link href="<?= asset("bootstrap-5.1.3-dist/css/bootstrap.min.css") ?>" rel="stylesheet" />

  <!-- Custom CSS -->
  <link href="<?= asset("main.css") ?>" rel="stylesheet" />

  <!-- Font-Awesome CDN -->
  <script src="https://kit.fontawesome.com/9c48d6723e.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    require_once __DIR__ . '/nav.php';
    printSessionMessages();
    ?>