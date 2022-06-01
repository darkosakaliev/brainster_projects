<?php
require_once __DIR__ . '/../layouts/header.php';
?>

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
                <a href='" . route('book', $book['id']) . "'>
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


<?php
require_once __DIR__ . '/../layouts/footer.php';
?>