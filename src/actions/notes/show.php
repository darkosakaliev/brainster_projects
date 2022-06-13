<?php

require_once __DIR__ . "/../../autoload.php";

authOnly();

$sql = "SELECT book_notes.id, CONCAT(users.first_name, ' ', users.last_name) as name, book_notes.user_id, book_notes.book_id, book_notes.note, book_notes.created_at FROM book_notes LEFT JOIN users ON book_notes.user_id = users.id WHERE book_notes.user_id = :user_id AND book_notes.book_id = :book_id;";
$stmt = $conn->prepare($sql);

$stmt->execute([
    'user_id' => $_SESSION['user']['id'],
    'book_id' => $_GET['id']
]);

while($row = $stmt->fetch()) {
    echo "
    <div class='bg-warmyellow p-5 m-2 rounded position-relative'>
        <p class='text-dark m-0'>" . $row['note'] . "</p>
        <p class='text-dark m-2 mb-1 position-absolute bottom-0 end-0'>" . timeAgo($row['created_at']) . "</p>
        <button class='btn btn-sm rounded-pill bg-primary position-absolute pos-minus20 editNote fw-bold' data-id='" . $row['id'] . "'>&#9998;</button>
        <button class='btn btn-sm rounded-circle btn-danger position-absolute pos-minus10 deleteNote fw-bold' data-id='" . $row['id'] . "'>&#10008;</button>
    </div>
    ";
}