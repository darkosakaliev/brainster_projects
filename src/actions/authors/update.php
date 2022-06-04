<?php

require_once __DIR__ . "/../../autoload.php";
adminOnly();

if (empty($_POST['first_name'])) {
    $_SESSION['val'] = ['first_name' => 1, 'text' => 'First Name field must be filled.'];
    redirect(route('editAuthor', $_GET['id']));
} else {
    input_data($_POST['first_name']);
}

if (empty($_POST['last_name'])) {
    $_SESSION['val'] = ['last_name' => 1, 'text' => 'Last Name field must be filled.'];
    redirect(route('editAuthor', $_GET['id']));
} else {
    input_data($_POST['last_name']);
}

if (empty($_POST['bio'])) {
    $_SESSION['val'] = ['bio' => 1, 'text' => 'Biography field must be filled.'];
    redirect(route('editAuthor', $_GET['id']));
} else if (strlen($_POST['bio']) < 20) {
    $_SESSION['val'] = ['bio' => 1, 'text' => 'Biography field must be minimum 20 characters.'];
    redirect(route('editAuthor', $_GET['id']));
} else if (strlen($_POST['bio']) > 512) {
    $_SESSION['val'] = ['bio' => 1, 'text' => 'Biography field must be maximum 512 characters.'];
    redirect(route('editAuthor', $_GET['id']));
} else {
    input_data($_POST['bio']);
}

$sql = "UPDATE authors SET first_name = :first_name, last_name = :last_name, bio = :bio WHERE id = :id;";
$stmt = $conn->prepare($sql);

$data = [
    'first_name' => $_POST['first_name'],
    'last_name' => $_POST['last_name'],
    'bio' => $_POST['bio'],
    'id' => $_GET['id']
];

try {
    if ($stmt->execute($data)) {
        $_SESSION['msg'] = ['status' => 1, 'text' => 'You have updated an author successfully!'];
        redirect(route('authors'));
    } else {
        $_SESSION['msg'] = ['status' => 0, 'text' => 'An error occured.'];
        redirect(route('authors'));
    }
} catch (PDOException $e) {
    $_SESSION['msg'] = ['status' => 0, 'text' => 'An error occured.'];
    redirect(route('authors'));
}