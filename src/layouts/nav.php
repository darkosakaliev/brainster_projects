<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-2">
    <a class="navbar-brand" href="<?= route("home"); ?>">Brainster<span class="text-primary">Library</span><i class="fa-solid fa-book-open-reader"></i></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <?php if (admin()) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="#">Add/Edit Books</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Add/Edit Authors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Add/Edit Categories</a>
                </li>
            <?php } ?>
        </ul>
        <?php if (auth()) { ?>
            <?php if (admin()) { ?>
                <a class="btn btn-primary text-white" href="<?= route('logout') ?>">Log out, admin <?= $_SESSION['user']['username'] ?></a>
            <?php } else { ?>
                <a class="btn btn-primary text-white" href="<?= route('logout') ?>">Log out, user <?= $_SESSION['user']['username'] ?></a>
            <?php } ?>
        <?php } else {  ?>
            <a class="btn btn-primary text-white" href="<?= route('login') ?>">Login/Register</a>
        <?php } ?>
    </div>
</nav>