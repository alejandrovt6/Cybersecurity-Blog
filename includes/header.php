<?php require_once 'connection.php'; ?>
<?php require_once 'includes/helpers.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cyberblog</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>

<!-- HEADER -->
<header id="header">
    <div id="logo">
        <a href="index.php">CyberBlog</a>
    </div>
    <!-- MENU -->
    <nav id="menu">
        <ul>
            <li><a href="index.php">Home</li>
            <!-- Categories -->
            <?php 
                $categories = getCategories($db);
                if(!empty($categories)):
                while($categorie = mysqli_fetch_assoc($categories)): 
            ?>
                <li><a href="categorie.php?id=<?= $categorie['id'] ?>"><?= $categorie['name'] ?></li>
            <?php
                endwhile; 
                endif;
            ?>

            <li><a href="index.php">About me</li>
            <li><a href="index.php">Contact</li>
        </ul>
    </nav>
    
    <div class="clearfix"></div>
</header>

<div id="container">