<?php

if(isset($_POST)) {

    require_once 'includes/connection.php';

    if(!isset($_SESSION)) {
      session_start();
    }

// Get data form and escape data

    $name = isset($_POST['name']) ? mysqli_real_escape_string($db, $_POST['name']) : false;
    $lastname = isset($_POST['lastname']) ? mysqli_real_escape_string($db, $_POST['lastname']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
    $password = isset($_POST['password']) ? mysqli_real_escape_string($db, $_POST['password']) : false;

    // Array errors
    $errors = array();

    // Validate data

    // Name
    if (!empty($name) && !is_numeric($name) && !preg_match("/[0-9]/", $name)) {
        $name_validate = true;
      } else {
        $name_validate = false;
        $errors['name'] = 'ERROR name';
      }

    // Lastname
      if (!empty($lastname) && !is_numeric($lastname) && !preg_match("/[0-9]/", $lastname)) {
        $lastname_validate = true;
      } else {
        $lastname_validate = false;
        $errors['lastname'] = 'ERROR lastname';
      }

      // Email
      if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_validate = true;
      } else {
        $email_validate = false;
        $errors['email'] = 'ERROR email';
      }

      // Password
      if (!empty($password)) {
        $password_validate = true;
      } else {
        $password_validate = false;
        $errors['password'] = 'ERROR password';
      }

      $save_user = false;
      if(count($errors) == 0) {
        $save_user = true;

        // Encrypt password and verify
        $password_encrypt = password_hash($password, PASSWORD_BCRYPT, ['cost=>4']);
        // var_dump($password_encrypt);
        $sql = "INSERT INTO users VALUES(null, '$name', '$lastname', '$email', '$password_encrypt', (CURDATE()));";
        // Insert user
        $save = mysqli_query($db, $sql);

        if($save) {
          $_SESSION['completed'] = 'Register OK';
        } else {
          $_SESSION['errors']['general'] = 'ERROR register';
        }

      } else {
        $_SESSION['errors'] = $errors;
      }
}

header('Location: index.php');
