<?php

require_once __DIR__ . "/../../autoload.php";
adminOnly();

$sql = "DELETE FROM book_reviews WHERE id = :id";
$stmt = $conn->prepare($sql);

$data = [
    'id' => $_GET['id']
];

try {
    if ($stmt->execute($data)) {
        $_SESSION['msg'] = ['status' => 1, 'text' => 'You have deleted a review permanently!'];
        redirect(route('reviews'));
    } else {
        $_SESSION['msg'] = ['status' => 0, 'text' => 'An error occured.'];
        redirect(route('reviews'));
    }
} catch (PDOException $e) {
    $_SESSION['msg'] = ['status' => 0, 'text' => 'An error occured.'];
    redirect(route('reviews'));
}