<?php

require_once __DIR__ . "/../../autoload.php";

authOnly();

if(empty($_POST['note'])) {
    $_SESSION['val'] = ['note' => 1, 'text' => 'Note field must be filled.'];
} else {
    input_data($_POST['note']);
}

$sql = "INSERT INTO book_notes(book_id, user_id, note) VALUES (:book_id, :user_id, :note);";
$stmt = $conn->prepare($sql);

$data = [
    'book_id' => $_GET['id'],
    'user_id' => $_SESSION['user']['id'],
    'note' => $_POST['note']
];

try {
    if ($stmt->execute($data)) {
        $_SESSION['msg'] = ['status' => 1, 'text' => 'You have added a note successfully!'];
        redirect(route('book', $_GET['id']));
    } else {
        $_SESSION['msg'] = ['status' => 0, 'text' => 'An error occured.'];
        redirect(route('book', $_GET['id']));
    }
} catch (PDOException $e) {
    $_SESSION['msg'] = ['status' => 0, 'text' => 'An error occured.'];
    redirect(route('book', $_GET['id']));
}
