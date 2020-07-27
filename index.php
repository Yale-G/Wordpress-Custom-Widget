<?php get_header(); ?>

<div class="main">

    <div class="main-content">
        <div class="form">
            <?php wp_login_form(); ?>
            Username is: <?php echo $_POST["username"]; ?><br>
            Password is: <?php echo $_POST["password"]; ?>
        </div>
        
    </div>

    <div class="sidebar">
        <?php get_sidebar( 'primary' ); ?>
    </div>
    
</div>
    
<?php get_footer(); ?>