<?php

function showError($errors, $field) {
    $alert = '';
    if(isset($errors[$field]) && !empty($field)) {
        $alert = "<div class='alert alert-error'>".$errors[$field]."</div>";
    }

    return $alert;
}

function deleteError() {
    $deleted = false;

    if (isset($_SESSION['errors'])) {
        $_SESSION['errors'] = null;
        $deleted = true;
    }

    if (isset($_SESSION['completed'])) {
        $_SESSION['completed'] = null;
        $deleted = true;
    }

    return $deleted;
}

function getCategories($connection) {
    $sql = "SELECT * FROM categories ORDER BY id ASC;";
    $categories = mysqli_query($connection, $sql);
    
    $result = array();

    if($categories && mysqli_num_rows($categories) >=1 ) {
        $result = $categories;
    }

    return $result;
}

function getLastPosts($connection) {
    $sql = "SELECT p.*, c.*
            FROM posts p
            INNER JOIN categories c ON p.category_id = c.id
            ORDER BY p.id DESC LIMIT 4";

    $posts = mysqli_query($connection, $sql);
    $result = array();

    if ($posts && mysqli_num_rows($posts) >= 1) {
        $result = $posts;
    }

    return $result;
}