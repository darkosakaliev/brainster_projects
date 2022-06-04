<?php

require_once __DIR__ . "/../../autoload.php";
adminOnly();

$sql = "UPDATE categories SET is_deleted = 0 WHERE id = :id";
$stmt = $conn->prepare($sql);

$data = [
    'id' => $_GET['id']
];

try {
    if ($stmt->execute($data)) {
        $_SESSION['msg'] = ['status' => 1, 'text' => 'You have restored a category successfully!'];
        redirect(route('categories'));
    } else {
        $_SESSION['msg'] = ['status' => 0, 'text' => 'An error occured.'];
        redirect(route('categories'));
    }
} catch (PDOException $e) {
    $_SESSION['msg'] = ['status' => 0, 'text' => 'An error occured.'];
    redirect(route('categories'));
}
