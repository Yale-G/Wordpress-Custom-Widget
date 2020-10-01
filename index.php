<?php get_header(); ?>

<div class="main">

    <div class="main-content">
        <div class="form">
            <?php wp_login_form(); ?>
            <?php if ( isset($_POST[ "username" ] ) ) {
                echo 'Username is:' . $_POST[ "username" ];
            }
             ?><br>
            <?php if ( isset($_POST[ "password" ] ) ) {
                echo 'Password is:' . $_POST[ "password" ];
            }
              ?>
        </div>
        
    </div>

    <div class="sidebar">
        <?php get_sidebar( 'primary' ); ?>
    </div>
    
</div>
    
<?php get_footer(); ?>