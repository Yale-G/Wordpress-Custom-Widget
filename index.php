<!DOCTYPE html>
<html lang="en">
<head>
    <?php wp_head(); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <title><?php wp_title( '&raquo', true, '' ); ?></title>
</head>
<body>
<div class="wrapper">
    <div class="header">
        <div class="complementary-menu">
            <?php wp_nav_menu(array('theme_location' => 'complementary_menu')); ?>
        </div>
        <div class="header-main">
            <div class="logo">
            
            </div>
            <div class="main-menu">
            <?php wp_nav_menu(array('theme_location' => 'main_menu')); ?>
            </div>
            <div class="category-menu">
                <?php wp_nav_menu(array('theme_location' => 'category_menu')); ?>
            </div>
        </div>
        
    </div>
    <div class="main">
       
    </div>
    <div class="footer">
    </div>

</div>
 
    <?php wp_footer(); ?>
</body>
</html> 