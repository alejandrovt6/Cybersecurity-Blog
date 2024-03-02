<?php

require_once 'includes/connection.php';

// Get data form
// Delete last error
if(isset($_SESSION['error-login'])){
    unset($_SESSION['error-login']);
}

if (isset($_POST)) {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

// Check data users
$sql = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
$login = mysqli_query($db, $sql);

// Validate query
if ($login && mysqli_num_rows($login) == 1) {
    $user = mysqli_fetch_assoc($login);
    // Check password
    $verify = password_verify($password, $user['password']);
    
    if($verify) {
        // Save data users
        $_SESSION['user'] = $user;
        
    } else {
        // Errors
        $_SESSION['error-login'] = "Incorrect login";
    }
} else {
    // Errors
    $_SESSION['error-login'] = "Incorrect login";
    }
}

header('Location: index.php');
