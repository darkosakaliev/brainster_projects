<?php
require_once __DIR__ . '/../layouts/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit'])) {

        if (empty($_POST['username'])) {
            $_SESSION['val'] = ['username' => 1, 'text' => 'Username field must be filled.'];
            redirect(route('register'));
        } else if(strlen($_POST['username']) < 6) {
            $_SESSION['val'] = ['username' => 1, 'text' => 'Username must be 6 characters minimum.'];
            redirect(route('register'));
        } else {
            input_data($_POST['username']);
        }
        
        if (empty($_POST['email'])) {
            $_SESSION['val'] = ['email' => 1, 'text' => 'Email field must be filled.'];
            redirect(route('register'));
        } else if (!preg_match ("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $_POST['email'])) {
            $_SESSION['val'] = ['email' => 1, 'text' => 'Email must be valid.'];
            redirect(route('register'));
        } else {
            input_data($_POST['email']);
        }

        if (empty($_POST['password'])) {
            $_SESSION['val'] = ['password' => 1, 'text' => 'Password field must be filled.'];
            redirect(route('register'));
        } else if(!preg_match("/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/", $_POST['password'])) {
            $_SESSION['val'] = ['password' => 1, 'text' => 'Password must contain at least 8 characters, 1 number and 1 special character.'];
            redirect(route('register'));
        } else {
            input_data($_POST['password']);
        }

        $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
        $stmt = $conn->prepare($sql);

        $data = [
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'password' => password_hash($_POST['password'], PASSWORD_BCRYPT)
        ];

        try {
            if ($stmt->execute($data)) {
                $_SESSION['msg'] = ['status' => 1, 'text' => 'You have registered successfully!'];
                redirect(route('login'));
            } else {
                $_SESSION['msg'] = ['status' => 0, 'text' => 'An error occured.'];
                redirect(route('register'));
            }
        } catch (PDOException $e) {
            $_SESSION['msg'] = ['status' => 0, 'text' => 'An error occured.'];
            redirect(route('register'));
        }
    }
}

?>
<div class="container my-4">
    <h1 class="text-center text-white mb-5">Register</h1>
    <?= printSessionMessages(); ?>
    <form action="" method="POST">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 mb-4">
                <input type="text" class="form-control mb-2" name="username" id="username" placeholder="Username">
                <?php if(isset($_SESSION['val']['username'])) {printValidationMessages('username');} ?>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 mb-4">
                <input type="email" class="form-control mb-2" name="email" id="email" placeholder="E-Mail">
                <?php if(isset($_SESSION['val']['email'])) {printValidationMessages('email');} ?>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 mb-4">
                <input type="password" class="form-control mb-2" name="password" id="password" placeholder="Password">
                <?php if(isset($_SESSION['val']['password'])) {printValidationMessages('password');} ?>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <button class="btn btn-lg bg-warmyellow" name="submit">Submit</button>
        </div>
    </form>
</div>


<?php
require_once __DIR__ . '/../layouts/footer.php';
?>