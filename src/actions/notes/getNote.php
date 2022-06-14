<?php

require_once __DIR__ . "/../../autoload.php";

authOnly();

$sql = "SELECT * FROM book_notes WHERE book_notes.user_id = :user_id AND book_notes.id = :id";
$stmt = $conn->prepare($sql);

$stmt->execute([
    'user_id' => $_SESSION['user']['id'],
    'id' => $_GET['id']
]);

if ($row = $stmt->fetch()) {
    echo "
    <form action='' method='POST'>
    <input type='hidden' id='id' name='id' value='" . $row['id'] . "'>
    <textarea class='form-control' name='note' id='note'>" . $row['note'] . "</textarea>
    </form>
    ";
} else {
    echo "Note not found or doesn't exist..";
}