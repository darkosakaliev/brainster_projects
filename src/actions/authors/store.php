<?php

require_once __DIR__ . "/../../autoload.php";
adminOnly();

if (empty($_POST['first_name'])) {
    $_SESSION['val'] = ['first_name' => 1, 'text' => 'First Name field must be filled.'];
    redirect(route('createAuthor'));
} else {
    input_data($_POST['first_name']);
}

if (empty($_POST['last_name'])) {
    $_SESSION['val'] = ['last_name' => 1, 'text' => 'Last Name field must be filled.'];
    redirect(route('createAuthor'));
} else {
    input_data($_POST['last_name']);
}

if (empty($_POST['bio'])) {
    $_SESSION['val'] = ['bio' => 1, 'text' => 'Biography field must be filled.'];
    redirect(route('createAuthor'));
} else if (strlen($_POST['bio']) < 20) {
    $_SESSION['val'] = ['bio' => 1, 'text' => 'Biography field must be minimum 20 characters.'];
    redirect(route('createAuthor'));
} else if (strlen($_POST['bio']) > 512) {
    $_SESSION['val'] = ['bio' => 1, 'text' => 'Biography field must be maximum 512 characters.'];
    redirect(route('createAuthor'));
} else {
    input_data($_POST['bio']);
}

$sql = "INSERT INTO authors (first_name, last_name, bio) VALUES (:first_name, :last_name, :bio)";
$stmt = $conn->prepare($sql);

$data = [
    'first_name' => $_POST['first_name'],
    'last_name' => $_POST['last_name'],
    'bio' => $_POST['bio']
];

try {
    if ($stmt->execute($data)) {
        $_SESSION['msg'] = ['status' => 1, 'text' => 'You have added an author successfully!'];
        redirect(route('authors'));
    } else {
        $_SESSION['msg'] = ['status' => 0, 'text' => 'An error occured.'];
        redirect(route('authors'));
    }
} catch (PDOException $e) {
    $_SESSION['msg'] = ['status' => 0, 'text' => 'An error occured.'];
    redirect(route('authors'));
}
