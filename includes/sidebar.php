

<!-- ASIDE -->
<aside id="sidebar">
    <!-- Incorrect login -->
    <?php 
        if(isset($_SESSION['user'])) :
        // Delete error
        unset($_SESSION['error-login']); 
    ?>   
        <div id="user-logged" class="block-aside">
            <h3>Welcome, <?= $_SESSION['user']['name'].' '.$_SESSION['user']['lastname'];  ?></h3>
            <!-- BOTONS -->
            <a href="createPost.php" class='btn btn-second'>Create post</a>
            <a href="createCategory.php" class='btn btn-second'>Create category</a>
            <a href="myProfile.php" class='btn btn-primary'>My profile</a>
            <a href="close.php" class='btn btn-danger'>Close session</a>
        </div>
    <?php 
        endif; 
    ?>

    <?php 
        if(!isset($_SESSION['user'])): 
    ?>


    <div id="login" class="block-aside">
        <h3>Log in</h3>

        <!-- Incorrect login -->
        <?php if(isset($_SESSION['error-login'])) : ?>
            <div class="alert alert-error">
                <?= $_SESSION['error-login']; ?>
            </div>
        <?php endif; ?>

        <form action="login.php" method="POST">
            <label for="email">Email</label>
            <input type="text" name="email">

            <label for="password">Password</label>
            <input type="password" name="password">

            <input type="submit" value="Enter">
        </form>
    </div>

    <div id="register" class="block-aside">

        <h3>Register</h3>

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


        <form action="register.php" method="POST">
            <label for="name">Name</label>
            <input type="text" name="name">
            <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'name') : '' ?>

            <label for="lastname">Lastname</label>
            <input type="text" name="lastname">
            <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'lastname') : '' ?>

            <label for="email">Email</label>
            <input type="text" name="email">
            <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'email') : '' ?>

            <label for="password">Password</label>
            <input type="password" name="password">
            <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'password') : '' ?>

            <input type="submit" value="Register" name="submit">
        </form>
        <?php deleteError(); ?>
    </div>
    <?php endif; ?>
    </aside>