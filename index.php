<?php require_once 'includes/header.php'; ?>


<!-- MAIN -->
<div id="main">
    <h1>Last posts</h1>

    <?php
        $posts = getLastPosts($db, true);
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

    <div id="see-all">
        <a href="posts.php">See all posts</a>
    </div>
</div>

<?php require_once 'includes/sidebar.php'; ?>
<?php require_once 'includes/footer.php'; ?>