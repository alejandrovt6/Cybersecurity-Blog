<?php // require_once 'includes/redirection.php'; ?>
<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/sidebar.php'; ?>

<!-- MAIN -->
<div id="main">
    <h1>My profile</h1>

        <!-- Show errors -->
    <?php 
        if (isset($_SESSION['completed'])) : 
    ?>
        <div class="alert alert-success">
            <?= $_SESSION['completed'] ?>
        </div>
    <?php 
        elseif (isset($_SESSION['errors']['general'])) : 
    ?>
        <div class="alert alert-error">
            <?=  $_SESSION['errors']['general'] ?>
        </div>
    <?php 
        endif; 
    ?>

    <form action="updateProfile.php" method="POST">
        <label for="name">Name</label>
        <input type="text" name="name" value="<?= $_SESSION['user']['name']; ?>" />
        <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'name') : '' ?>

        <label for="lastname">Lastname</label>
        <input type="text" name="lastname" value="<?= $_SESSION['user']['lastname']; ?>" />
        <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'lastname') : '' ?>

        <label for="email">Email</label>
        <input type="text" name="email" value="<?= $_SESSION['user']['email']; ?>" />
        <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'email') : '' ?>

        <!-- <label for="password">Password</label>
        <input type="password" name="password">  -->
        <?php //echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'password') : '' ?>

        <input type="submit" value="Update profile" name="submit">
    </form>
    
    <?php deleteError(); ?>

</div>

<?php require_once 'includes/footer.php'; ?>