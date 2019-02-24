<?php
/**
 * The Header for Moana
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Moana
 */
?><!DOCTYPE html>

<html <?php
language_attributes();
?>>

<head>

<meta charset="<?php
bloginfo('charset');
?>">

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php
wp_head();
?>

</head>

<body <?php
body_class();
?>>

<div id="page" class="hfeed site">


    <a class="skip-link screen-reader-text" href="#content"><?php
esc_html_e('Skip to content', 'moana');
?></a>    <header id="masthead" class="site-header" role="banner"> <?php
the_custom_logo();
if (is_front_page() && is_home()):
?>
            <?php
else:
?>
	             <?php
endif;
?>

	<?php if ( function_exists( 'jetpack_social_menu' ) ) jetpack_social_menu();?>

    </header><!-- #masthead -->
	
        <div class="site-branding">
<?php
$description = get_bloginfo('description', 'display');
if ($description || is_customize_preview()):
?>
               <p class="site-description"><?php
    echo $description;
    /* WPCS: xss ok. */
?></p>

            <?php
endif;
?>
                        <?php
if (!is_front_page() && !is_home()):
?>


        <h1 class="secondary-title"><a href="<?php
    echo esc_url(home_url('/'));
?>" rel="home"><?php
    bloginfo('name');
?></a></h1>

            <?php
endif;
?>

        </div>

        <nav id="site-navigation" class="main-navigation" role="navigation">
            
            <?php
wp_nav_menu(array(
    'theme_location' => 'menu-1'
));
?>

        </nav><!-- #site-navigation -->

                <h1 class="site-title"><a href="<?php
    echo esc_url(home_url('/'));
?>" rel="home"><?php
    bloginfo('name');
?></a></h1>

                <p class="site-title"><a href="<?php
    echo esc_url(home_url('/'));
?>" rel="home"><?php
    bloginfo('name');
?></a></p>


    <div id="content" class="site-content">

        <?php
if (get_header_image()):
?>

            <a href="<?php
    echo esc_url(home_url('/'));
?>" rel="home">

                <img class="custom-header" src="<?php
    header_image();
?>" width="<?php
    echo get_custom_header()->width;
?>" height="<?php
    echo get_custom_header()->height;
?>" alt="">

            </a>

             <?php
endif;
?>
