<?php require_once 'includes/connection.php'; ?>
<?php require_once 'includes/helpers.php'; ?>

<?php
    $category_show = getCategory($db, $_GET['id']);
    if(!isset($category_show['id'])) {
        header("Location: index.php");
    }
?>

<?php require_once 'includes/header.php'; ?>

<!-- MAIN -->
<div id="main">

    <h1>Posts of <?= $category_show['name'] ?></h1>

    <?php
        $posts = getPosts($db, null, $_GET['id']);
        if(!empty($posts)):
            while($post = mysqli_fetch_assoc($posts)):
    ?>
        <article id="post">
            <a href="">
                <h2> 
                    <?= $post['title'] ?>
                </h2>
                <p> 
                    <?= substr($post['description'], 0, 250). '...'.'<span class="read-more">Read more</span>' ?> 
                </p>
            </a>
        </article>

    <?php
        endwhile;
        else:
    ?>

    <div class="alert-info">No posts in this category.</div>

    <?php
        endif;
    ?>

</div>

<?php require_once 'includes/sidebar.php'; ?>
<?php require_once 'includes/footer.php'; ?>