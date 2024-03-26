<?php
require_once 'includes/header.php';

if (!isset($_POST['search'])) {
    header("Location: index.php");
    exit;
}

$searchTerm = $_POST['search'];

// Si no se proporciona una categoría, establecerla como nula
$category = isset($_POST['category']) ? $_POST['category'] : null;

$posts = getPosts($db, null, $category, $searchTerm);

?>

<!-- MAIN -->
<div id="main">

    <h1>Search: <?= htmlspecialchars($searchTerm) ?></h1>

    <?php if ($posts && mysqli_num_rows($posts) > 0): ?>
        <?php while ($post = mysqli_fetch_assoc($posts)): ?>
            <article id="post">
                <a href="post.php?id=<?= $post['id'] ?>">
                    <h2><?= htmlspecialchars($post['title']) ?></h2>
                    <p><?= htmlspecialchars(substr($post['description'], 0, 250)). '...<span class="read-more">Read more</span>' ?></p>
                </a>
            </article>
        <?php endwhile; ?>
    <?php else: ?>
        <div class="alert-info">No posts found for the search term <?= htmlspecialchars($searchTerm) ?></div>
    <?php endif; ?>

</div>

<?php require_once 'includes/sidebar.php'; ?>
<?php require_once 'includes/footer.php'; ?>
