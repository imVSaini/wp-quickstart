<?php
/*
 * Plugin Name: Social
 * Description: Just another social plugin. Simple but flexible.
 * Author: Vaibhav Saini
 * Author URI: https://www.linkedin.com/in/vaibhavsaini07/
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Version: 1.0.0
 * Requires at least: 6.3
 * Requires PHP: 7.4
 */

// Register settings
function social_links_settings_init() {
    register_setting( 'social_links_settings', 'social_links', 'social_links_sanitize_callback' );

    add_settings_section( 'social_links_section', '', 'social_links_section_callback', 'social_links_settings' );

    // Define social networks with labels
    $social_networks = array(
        'facebook' => 'Facebook',
        'instagram' => 'Instagram',
        'threads' => 'Threads',
        'twitter' => 'Twitter',
        'linkedin' => 'LinkedIn',
        'youtube' => 'YouTube'
    );

    // Create settings fields for each social network
    foreach ($social_networks as $network => $label) {
        add_settings_field(
            $network,
            $label,
            'social_links_field_callback',
            'social_links_settings',
            'social_links_section',
            array( 'network' => $network )
        );
    }
}
add_action( 'admin_init', 'social_links_settings_init' );

// Section callback
function social_links_section_callback() {
    echo '<p>WordPress offers you the ability to add social media links below:</p>';
}

// Field callback
function social_links_field_callback($args) {
    $options = get_option( 'social_links' );
    $network = $args['network'];
    $value = isset( $options[$network] ) ? esc_attr( $options[$network] ) : '';

    // Output text input field for social URL
    echo "<input type='text' id='{$network}_url' name='social_links[$network]' value='$value' class='regular-text' />";
}

// Sanitize callback
function social_links_sanitize_callback( $input ) {
    $output = array();
    // Sanitize each input value
    foreach ($input as $key => $value) {
        $output[$key] = sanitize_text_field( $value );
    }
    return $output;
}

// Settings page
function social_links_settings_page() {
    ?>
    <div class="wrap">
        <h2>Social Links Settings</h2>
        <form method="post" action="options.php">
            <?php settings_fields( 'social_links_settings' ); ?>
            <?php do_settings_sections( 'social_links_settings' ); ?>
            <?php submit_button( 'Save Changes' ); ?>
        </form>
    </div>
    <?php
}

// Add menu item in WordPress admin panel
function social_links_menu() {
    add_options_page( 'Social Links Settings', 'Socials', 'edit_pages', 'social-links-settings', 'social_links_settings_page' );
}
add_action( 'admin_menu', 'social_links_menu' );
