<?php

require_once __DIR__ . "/../../autoload.php";
adminOnly();

$sql = "UPDATE books SET is_deleted = 1 WHERE id = :id";
$stmt = $conn->prepare($sql);

$data = [
    'id' => $_GET['id']
];

try {
    if ($stmt->execute($data)) {
        $_SESSION['msg'] = ['status' => 1, 'text' => 'You have deleted a book successfully!'];
        redirect(route('books'));
    } else {
        $_SESSION['msg'] = ['status' => 0, 'text' => 'An error occured.'];
        redirect(route('books'));
    }
} catch (PDOException $e) {
    $_SESSION['msg'] = ['status' => 0, 'text' => 'An error occured.'];
    redirect(route('books'));
}
