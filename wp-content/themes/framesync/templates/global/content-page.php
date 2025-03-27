<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package framesync
 */

?>

<section class="page__section">
	<header class="page__header">
		<h1 class="page__title"><?php the_title(); ?></h1>
	</header><!-- .page-header -->

	<div class="page__content">
        <?php the_content() ?>
	</div><!-- .page-content -->
</section><!-- .page-section -->