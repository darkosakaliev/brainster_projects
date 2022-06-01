<?php
require_once __DIR__ . '/../layouts/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit'])) {
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
    <h1 class="text-center mb-5">Register</h1>
    <?= printSessionMessages(); ?>
    <form action="" method="POST">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 mb-4">
                <input type="text" class="form-control mb-2" name="username" id="username" placeholder="Username">
                
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 mb-4">
                <input type="email" class="form-control mb-2" name="email" id="email" placeholder="E-Mail">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 mb-4">
                <input type="password" class="form-control mb-2" name="password" id="password" placeholder="Password">
            </div>
        </div>
        <div class="row justify-content-center">
            <button class="btn btn-lg btn-primary" name="submit">Submit</button>
        </div>
    </form>
</div>


<?php
require_once __DIR__ . '/../layouts/footer.php';
?>