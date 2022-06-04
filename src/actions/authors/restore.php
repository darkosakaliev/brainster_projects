<?php

require_once __DIR__ . "/../../autoload.php";
adminOnly();

$sql = "UPDATE authors SET is_deleted = 0 WHERE id = :id";
$stmt = $conn->prepare($sql);

$data = [
    'id' => $_GET['id']
];

try {
    if ($stmt->execute($data)) {
        $_SESSION['msg'] = ['status' => 1, 'text' => 'You have restored an author successfully!'];
        redirect(route('authors'));
    } else {
        $_SESSION['msg'] = ['status' => 0, 'text' => 'An error occured.'];
        redirect(route('authors'));
    }
} catch (PDOException $e) {
    $_SESSION['msg'] = ['status' => 0, 'text' => 'An error occured.'];
    redirect(route('authors'));
}
