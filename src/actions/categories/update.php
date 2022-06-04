<?php

require_once __DIR__ . "/../../autoload.php";
adminOnly();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit'])) {

        if (empty($_POST['title'])) {
            $_SESSION['val'] = ['title' => 1, 'text' => 'Category Title field must be filled.'];
            redirect(route('editCategory', $_GET['id']));
        } else {
            input_data($_POST['title']);
        }

        $sql = "UPDATE categories SET name = :name WHERE id = :id";
        $stmt = $conn->prepare($sql);

        $data = [
            'name' => $_POST['title'],
            'id' =>$_GET['id']
        ];

        try {
            if ($stmt->execute($data)) {
                $_SESSION['msg'] = ['status' => 1, 'text' => 'You have updated a category successfully!'];
                redirect(route('categories'));
            } else {
                $_SESSION['msg'] = ['status' => 0, 'text' => 'An error occured.'];
                redirect(route('categories'));
            }
        } catch (PDOException $e) {
            $_SESSION['msg'] = ['status' => 0, 'text' => 'An error occured.'];
            redirect(route('categories'));
        }
    }
}