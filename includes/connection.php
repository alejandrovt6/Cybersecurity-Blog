<?php

// Connection
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'myblog';

$db = mysqli_connect($server, $username, $password, $database);

mysqli_query($db, "SET NAMES 'utf8'");

if(!isset($_SESSION)) {
    session_start();
}