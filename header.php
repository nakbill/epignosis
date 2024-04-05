<!doctype html>
<html lang="zxx">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <?php
    wp_head();
    ?>
</head>
<body>

<div id="page">
    <header id="masthead" class="site-header">
        <nav class="navbar navbar-expand-md navbar-light">
            <div class="container-fluid">
                <div class="site-branding">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<span class="logo-icon">
						<?php if(function_exists('the_custom_logo')){
                            $custom_logo_id = get_theme_mod( 'custom_logo' );
                            $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );

						}?>

                            <img src="<?php echo $image[0]?>" alt="logo"/>
						</span>
                        <span><?php echo get_bloginfo('name')?></span>
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <?php
                wp_nav_menu(
                    array(
                        'menu' => 'primary',
                        'theme_location' => 'primary',
                        'menu_id'        => '',
                        'menu_class'     => 'nav navbar-nav ml-auto text-right',
                        'container'      => 'div',
                        'container_id'   => 'main-navbar',
                        'container_class'=> 'collapse navbar-collapse',
                        'items_wrap'     => '<ul id="" class="nav navbar-nav ml-auto text-right">%3$s</ul>'
                    )
                );
                ?>
            </div>
        </nav><!-- #site-navigation -->
    </header><!-- #masthead -->
