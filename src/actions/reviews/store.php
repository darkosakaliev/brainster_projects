<?php

require_once __DIR__ . "/../../autoload.php";
authOnly();

if (empty($_POST['review'])) {
    $_SESSION['val'] = ['review' => 1, 'text' => 'Review field must be filled.'];
    redirect(route('book', $_GET['id']));
} else if ($_POST['review'] > 255) {
    $_SESSION['val'] = ['review' => 1, 'text' => 'Review field must be maximum 255 characters.'];
    redirect(route('book', $_GET['id']));
} else {
    input_data($_POST['review']);
}

$sql = "INSERT INTO book_reviews (book_id, user_id, review) VALUES (:book_id, :user_id, :review)";
$stmt = $conn->prepare($sql);

$data = [
    'book_id' => $_GET['id'],
    'user_id' => $_SESSION['user']['id'],
    'review' => $_POST['review']
];

try {
    if ($stmt->execute($data)) {
        $_SESSION['msg'] = ['status' => 1, 'text' => 'You have posted your review successfully!'];
        redirect(route('book', $_GET['id']));
    } else {
        $_SESSION['msg'] = ['status' => 0, 'text' => 'An error occured.'];
        redirect(route('book', $_GET['id']));
    }
} catch (PDOException $e) {
    $_SESSION['msg'] = ['status' => 0, 'text' => 'An error occured.'];
    redirect(route('book', $_GET['id']));
}