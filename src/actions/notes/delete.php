<?php

require_once __DIR__ . "/../../autoload.php";

authOnly();

if (isset($_POST['id']) && is_numeric($_POST['id'])) {
    $id = $_POST['id'];
}

$sql = "DELETE FROM book_notes WHERE id = :id;";
$stmt = $conn->prepare($sql);

$data = [
    'id' => $id
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
