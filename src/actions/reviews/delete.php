<?php

require_once __DIR__ . "/../../autoload.php";
authOnly();

$sql = "DELETE FROM book_reviews WHERE book_id = :book_id AND user_id = :user_id";
$stmt = $conn->prepare($sql);

$data = [
    'book_id' => $_GET['id'],
    'user_id' => $_SESSION['user']['id']
];

try {
    if ($stmt->execute($data)) {
        $_SESSION['msg'] = ['status' => 1, 'text' => 'You have deleted your review successfully!'];
        redirect(route('book', $_GET['id']));
    } else {
        $_SESSION['msg'] = ['status' => 0, 'text' => 'An error occured.'];
        redirect(route('book', $_GET['id']));
    }
} catch (PDOException $e) {
    $_SESSION['msg'] = ['status' => 0, 'text' => 'An error occured.'];
    redirect(route('book', $_GET['id']));
}