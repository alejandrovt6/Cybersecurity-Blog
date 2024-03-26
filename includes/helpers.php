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

    if (isset($_SESSION['errors-post'])) {
        $_SESSION['errors-post'] = null;
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

function getCategory($connection, $id) {
    $sql = "SELECT * FROM categories WHERE id = $id;";
    $categories = mysqli_query($connection, $sql);
    
    $result = array();

    if($categories && mysqli_num_rows($categories) >=1 ) {
        $result = mysqli_fetch_assoc($categories);
    }

    return $result;
}

function getPosts($connection, $limit = null, $category = null, $search = null) {
    $sql = "SELECT p.*, c.*
            FROM posts p
            INNER JOIN categories c ON p.category_id = c.id
            WHERE 1 = 1";

    if (!empty($category) && is_int($category)) {
        $sql .= " AND p.category_id = ?";
    }

    if (!empty($search)) {
        $sql .= " AND p.title LIKE ?";
    }

    $sql .= " ORDER BY p.id DESC";

    if ($limit) {
        $sql .= " LIMIT ?";
    }

    $stmt = mysqli_prepare($connection, $sql);

    if (!$stmt) {
        return false;
    }

    if (!empty($category) && is_int($category)) {
        mysqli_stmt_bind_param($stmt, "i", $category);
    }

    if (!empty($search)) {
        $searchTerm = "%$search%";
        mysqli_stmt_bind_param($stmt, "s", $searchTerm);
    }

    if ($limit) {
        mysqli_stmt_bind_param($stmt, "i", $limit);
    }

    mysqli_stmt_execute($stmt);
    $posts = mysqli_stmt_get_result($stmt);

    return $posts;
}


function getLastPosts($connection) {
    $sql = "SELECT p.*, c.*
            FROM posts p
            INNER JOIN categories c ON p.category_id = c.id
            ORDER BY p.id DESC";

    $posts = mysqli_query($connection, $sql);
    $result = array();

    if ($posts && mysqli_num_rows($posts) >= 1) {
        $result = $posts;
    }

    return $result;
}

function getPost($connection, $id) {
    $sql = "SELECT p.*, c.name AS 'category' FROM posts p ".
            "INNER JOIN categories c ON p.category_id = c.id ".
            "WHERE p.id = $id";

    $post = mysqli_query($connection, $sql);
    $result = array();

    if ($post && mysqli_num_rows($post) >= 1) {
        $result = mysqli_fetch_assoc($post);
    }

    return $result;
}
