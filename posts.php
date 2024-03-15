<?php require_once 'includes/header.php'; ?>

<!-- MAIN -->
<div id="main">
    <h1>All posts</h1>

    <?php
        $posts = getPosts($db);
        if(!empty($posts)):
            while($post = mysqli_fetch_assoc($posts)):
    ?>
        <article id="post">
            <a href="post.php?id=<?= $post['id'] ?>">
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
        endif;
    ?>

</div>

<?php require_once 'includes/sidebar.php'; ?>
<?php require_once 'includes/footer.php'; ?>