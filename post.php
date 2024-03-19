<?php require_once 'includes/connection.php'; ?>
<?php require_once 'includes/helpers.php'; ?>

<?php
    $post_show = getPost($db, $_GET['id']);

    if (!isset($post_show['id'])) {
        header("Location: index.php");
    exit();
    }
?>

<?php require_once 'includes/header.php'; ?>

<!-- MAIN -->
<div id="main">

    <h1><?= $post_show['title'] ?></h1>

    <a href="category.php?id=<?= $post_show['category_id'] ?>">
        <h2><?= $post_show['category'] ?></h2>
    </a>

    <h4><?= $post_show['date_created'] ?></h4>
    <p><?= $post_show['description'] ?></p>

</div>

<?php require_once 'includes/sidebar.php'; ?>
<?php require_once 'includes/footer.php'; ?>

