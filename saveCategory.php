<?php

if(isset($_POST)) {
    require_once 'includes/connection.php';

    $name = isset($_POST['name']) ? mysqli_real_escape_string($db, $_POST['name']) : false;

    // Array errors
    $errors = array();

    // Validate data

    // Name
    if (!empty($name)) {
        $name_validate = true;
    } else {
        $name_validate = false;
        $errors['name'] = 'ERROR name';
    }

    if(count($errors) == 0) {
        $sql = "INSERT INTO categories VALUES(NULL, '$name');";
        $save = mysqli_query($db, $sql);
    }

}

header('Location: index.php');