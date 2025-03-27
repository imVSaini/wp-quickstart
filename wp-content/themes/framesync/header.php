<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package framesync
 */

 $site_name = get_bloginfo('name');
 $site_title = $meta_data['title'] ?? null;
 $site_desc = $meta_data['description'] ?? null;
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php if ( !empty( $site_title ) ) : ?>
		<title><?php echo esc_html( $site_title ) . ' - ' . esc_html( $site_name ); ?></title>
	<?php endif; ?>

	<?php if ( !empty( $site_desc ) ) : ?>
		<meta name="description" content="<?php echo esc_attr( $site_desc ); ?>">
	<?php endif; ?>

	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'framesync' ); ?></a>

	<?php get_template_part('templates/global/content', 'header'); ?>
