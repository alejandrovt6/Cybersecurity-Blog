<?php // require_once 'includes/redirection.php'; ?>
<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/sidebar.php'; ?>

<!-- MAIN -->
<div id="main">
    <h1>Create post</h1>

    <p>Add new post to the blog.</p><br>
    <form action="savePost.php" method="POST">
        <label for="title">Category name</label>
        <input type="text" name="title">

        <label for="description"></label>
        <textarea name="description" id="description" rows="10" cols="50"></textarea>

        <label for="category"></label>
        <select name="category">
            <?php 
                $categories = getCategories($db);
                if(!empty($categories)):
                while($category = mysqli_fetch_assoc($categories)):
            ?>

                <option value="<?= $category['id'] ?>">
                    <?= $category['name'] ?>
                </option>

            <?php
                endwhile;
                endif;
            ?>
        </select>

        <input type="submit" value="Save">
    </form>

</div>

<?php require_once 'includes/footer.php'; ?>