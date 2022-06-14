<?php

require_once __DIR__ . "/../../autoload.php";

authOnly();

$sql = "UPDATE book_notes SET book_notes.note = :note WHERE id = :id AND book_notes.user_id = :user_id;";
$stmt = $conn->prepare($sql);

$data = [
    'note' => $_POST['note'],
    'id' => $_POST['id'],
    'user_id' => $_SESSION['user']['id']
];

try {
    if ($stmt->execute($data)) {
        $_SESSION['msg'] = ['status' => 1, 'text' => 'You have deleted a note successfully!'];
        redirect(route('book', $_GET['id']));
    } else {
        $_SESSION['msg'] = ['status' => 0, 'text' => 'An error occured.'];
        redirect(route('book', $_GET['id']));
    }
} catch (PDOException $e) {
    $_SESSION['msg'] = ['status' => 0, 'text' => 'An error occured.'];
    redirect(route('book', $_GET['id']));
}
