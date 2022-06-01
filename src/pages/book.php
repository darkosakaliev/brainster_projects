<?php
require_once __DIR__ . '/../layouts/header.php';

$book = getBook($conn, $_GET['id']);

?>
    <div class="container my-4">
        <div class="row">
            <div class="col-4">
                <img src="<?= $book['cover'] ?>" class="img-fluid" alt="Cover Image">
            </div>
            <div class="col-8">
                <h1>'<?= $book['title'] ?>'</h1>
                <h3>by <?= $book['author'] ?></h3>
                <h5>Published: <?= date("jS \of F Y", strtotime($book['date_of_issue'])) ?></h5>
                <h5>Number of pages: <?= $book['number_of_pages'] ?></h5>
                <p><?= $book['description'] ?></p>
            </div>
        </div>
    </div>


<?php
require_once __DIR__ . '/../layouts/footer.php';
?>