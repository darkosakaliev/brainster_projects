<?php

require_once __DIR__ . "/../../autoload.php";
adminOnly();

if (empty($_POST['title'])) {
    $_SESSION['val'] = ['title' => 1, 'text' => 'Title field is required.'];
    redirect(route('editBook', $_GET['id']));
} else {
    input_data($_POST['title']);
}

if ($_POST['author'] == 0) {
    $_SESSION['val'] = ['author' => 1, 'text' => 'Author field is required.'];
    redirect(route('editBook', $_GET['id']));
} else {
    input_data($_POST['author']);
}

if (empty($_POST['description'])) {
    $_SESSION['val'] = ['description' => 1, 'text' => 'Description field is required.'];
    redirect(route('editBook', $_GET['id']));
} else if (strlen($_POST['description']) < 20) {
    $_SESSION['val'] = ['description' => 1, 'text' => 'Description field must be minimum 20 characters.'];
    redirect(route('editBook', $_GET['id']));
} else if (strlen($_POST['description']) > 2048) {
    $_SESSION['val'] = ['description' => 1, 'text' => 'Description field must be maximum 2048 characters.'];
    redirect(route('editBook', $_GET['id']));
} else {
    input_data($_POST['description']);
}

if (empty($_POST['date_of_issue'])) {
    $_SESSION['val'] = ['date_of_issue' => 1, 'text' => 'Publish date field is required.'];
    redirect(route('editBook', $_GET['id']));
} else if (!strtotime($_POST['date_of_issue'])) {
    $_SESSION['val'] = ['date_of_issue' => 1, 'text' => 'You have inserted invalid date.'];
    redirect(route('editBook', $_GET['id']));
} else {
    input_data($_POST['date_of_issue']);
}

if (empty($_POST['number_of_pages'])) {
    $_SESSION['val'] = ['number_of_pages' => 1, 'text' => 'Number of pages field is required.'];
    redirect(route('editBook', $_GET['id']));
} else if (!is_numeric($_POST['number_of_pages'])) {
    $_SESSION['val'] = ['number_of_pages' => 1, 'text' => 'Please enter a valid number.'];
    redirect(route('editBook', $_GET['id']));
} else {
    input_data($_POST['number_of_pages']);
}

if (empty($_POST['cover'])) {
    $_SESSION['val'] = ['cover' => 1, 'text' => 'Cover field is required.'];
    redirect(route('editBook', $_GET['id']));
} else if (filter_var($_POST['cover'], FILTER_VALIDATE_URL) === false) {
    $_SESSION['val'] = ['cover' => 1, 'text' => 'Please enter a valid URL.'];
    redirect(route('editBook', $_GET['id']));
} else {
    input_data($_POST['cover']);
}

if ($_POST['category'] == 0) {
    $_SESSION['val'] = ['category' => 1, 'text' => 'Category field is required.'];
    redirect(route('editBook', $_GET['id']));
} else {
    input_data($_POST['category']);
}

$sql = "UPDATE books SET title = :title, author_id = :author_id, date_of_issue = :date_of_issue, number_of_pages = :number_of_pages, cover = :cover, category_id = :category_id, description = :description WHERE id = :id;";
$stmt = $conn->prepare($sql);

$data = [
    'title' => $_POST['title'],
    'author_id' => $_POST['author'],
    'date_of_issue' => $_POST['date_of_issue'],
    'number_of_pages' => $_POST['number_of_pages'],
    'cover' => $_POST['cover'],
    'category_id' => $_POST['category'],
    'description' => $_POST['description'],
    'id' => $_GET['id']
];

try {
    if ($stmt->execute($data)) {
        $_SESSION['msg'] = ['status' => 1, 'text' => 'You have updated a book successfully!'];
        redirect(route('books'));
    } else {
        $_SESSION['msg'] = ['status' => 0, 'text' => 'An error occured.'];
        redirect(route('books'));
    }
} catch (PDOException $e) {
    $_SESSION['msg'] = ['status' => 0, 'text' => 'An error occured.'];
    redirect(route('books'));
}