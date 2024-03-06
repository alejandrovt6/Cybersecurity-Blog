<?php

if(isset($_POST)) {
    require_once 'includes/connection.php';

    $title = isset($_POST['title']) ? mysqli_real_escape_string($db, $_POST['title']) : false;
    $description = isset($_POST['description']) ? mysqli_real_escape_string($db, $_POST['description']) : false;
    $category = isset($_POST['category']) ? (int)$_POST['category'] : false;
    $user = $_SESSION['user']['id'];

    // Array errors
    $errors = array();

    // Validate data

    // Title
    if (empty($title)) {
        $errors['title'] = 'ERROR title';
    }

    // Description
    if (empty($description)) {
        $errors['description'] = 'ERROR description';
    }

    // Category
    if (empty($category) && !is_numeric($category)) {
        $errors['category'] = 'ERROR category';
    }

    if(count($errors) == 0) {
        $sql = "INSERT INTO posts VALUES(NULL, $user, $category, '$title', '$description', CURDATE());"; 
        $save = mysqli_query($db, $sql);

        header('Location: index.php');

    } else {
        $_SESSION['errors-post'] = $errors;
        header('Location: createPost.php');
    }

}