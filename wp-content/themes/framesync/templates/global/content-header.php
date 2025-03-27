<?php
/**
 * Template part for displaying page content in header.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package framesync
 */

?>

<header id="masthead" class="header">
    <div class="branding">
        <?php if ( !has_custom_logo() ) : ?>
                <?php if ( is_front_page() && is_home() ) : ?>
                    <img src="<?php echo get_template_directory_uri() . '/public/images/logo.svg' ?>" alt="Main Logo" class="w-full h-full" draggable="false" decoding="async">
                <?php else : ?>
                    <a rel="home" href="<?php echo esc_url(home_url('/')) ?>">
                        <img src="<?php echo get_template_directory_uri() . '/public/images/logo.svg' ?>" alt="Main Logo" class="w-full h-full" draggable="false" decoding="async">
                    </a>
                <?php endif; ?>
            <?php else : ?>
                <?php if ( is_front_page() && is_home() ) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <a rel="home" href="<?php echo esc_url( home_url('/') ) ?>">
                        <?php the_custom_logo(); ?>
                    </a>
                <?php endif; ?>
            <?php endif; ?>
    </div><!-- .branding -->

    <nav id="site-navigation" class="main-navigation">

        <?php echo do_shortcode('[wp_menu menu="header"]'); ?>
        
    </nav><!-- #site-navigation -->
</header><!-- #masthead -->