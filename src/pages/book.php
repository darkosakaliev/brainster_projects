<?php
require_once __DIR__ . '/../layouts/header.php';

$book = getBook($conn, $_GET['id']);

?>
    <div class="container my-4">
        <div class="row bg-dark p-3">
            <div class="col-3">
                <img src="<?= $book['cover'] ?>" class="img-fluid" alt="Cover Image">
            </div>
            <div class="col-9">
                <h1 class="text-white">'<?= $book['title'] ?>'</h1>
                <h3 class="text-white">by <?= $book['author'] ?></h3>
                <h5 class="text-white">First published: <?= date("F j, Y", strtotime($book['date_of_issue'])) ?></h5>
                <h5 class="text-white">Number of pages: <?= $book['number_of_pages'] ?></h5>
                <p class="text-white text-justify mt-3"><?= $book['description'] ?></p>
            </div>
        </div>
        <div class="row bg-dark text-white mt-5 p-4">
            <div class="col">
                <h3>About the author:</h3>
                <p class="text-justify"><?= $book['bio'] ?></p>
            </div>
        </div>
    </div>


<?php
require_once __DIR__ . '/../layouts/footer.php';
?>