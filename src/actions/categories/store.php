<?php

require_once __DIR__ . "/../../autoload.php";
adminOnly();

if (empty($_POST['title'])) {
    $_SESSION['val'] = ['title' => 1, 'text' => 'Category Title field must be filled.'];
    redirect(route('createCategory'));
} else {
    input_data($_POST['title']);
}

$sql = "INSERT INTO categories (name) VALUES (:name)";
$stmt = $conn->prepare($sql);

$data = [
    'name' => $_POST['title']
];

try {
    if ($stmt->execute($data)) {
        $_SESSION['msg'] = ['status' => 1, 'text' => 'You have added a category successfully!'];
        redirect(route('categories'));
    } else {
        $_SESSION['msg'] = ['status' => 0, 'text' => 'An error occured.'];
        redirect(route('categories'));
    }
} catch (PDOException $e) {
    $_SESSION['msg'] = ['status' => 0, 'text' => 'An error occured.'];
    redirect(route('categories'));
}
