<?php get_header(); ?>

<div class="main">

    <div class="main-content">
        <div class="form">
            <form action="" method="post">
                <label for="username">Username:</label><br>
                <input type="text" id="username" name="username" value=""><br>
                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password" value=""><br>
                <input type="submit" id="submit" value="Εισοδος">
            </form>
            Username <?php echo $_POST["username"]; ?>
            Password <?php echo $_POST["password"]; ?>
        </div>
        
    </div>

    <div class="sidebar">
        <?php get_sidebar( 'primary' ); ?>
    </div>
    
</div>
    
<?php get_footer(); ?>