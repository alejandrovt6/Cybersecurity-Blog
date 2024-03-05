<?php // require_once 'includes/redirection.php'; ?>
<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/sidebar.php'; ?>

<!-- MAIN -->
<div id="main">
    <h1>Create categories</h1>

    <p>Add new categories to the blog.</p><br>
    <form action="saveCategory.php" method="POST">
        <label for="name">Category name</label>
        <input type="text" name="name">

        <input type="submit" value="Save">
    </form>

</div>


<?php require_once 'includes/footer.php'; ?>