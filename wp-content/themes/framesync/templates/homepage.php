<?php
/**
 * Template Name: Home Page Template
 * 
 * The template for displaying Landing page
 *
 * This is the template that displays Landing page by default.
 * Please note that this is the WordPress construct of page
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package framesync
 */

 $parts = array("initial");

get_header();
?>

	<main class="homepage">

		<?php
		while ( have_posts() ) :
			the_post();

			foreach ($parts as $part) {
                get_template_part( 'templates/components/home/content', $part );
            }

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
