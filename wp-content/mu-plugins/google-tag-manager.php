<?php
/*
 * Plugin Name: Google Tag Integration
 * Description: A simple plugin to integrate Google Tag (gtag.js) with configurable tracking IDs for Google Analytics (GA4) and Google Ads.
 * Author: Vaibhav Kumar Saini
 * Author URI: https://vaibhavsaini.in/
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Version: 1.1.0
 * Requires at least: 6.3
 * Requires PHP: 7.4
 */

// Register settings
function gtag_settings_init() {
    register_setting('gtag_settings', 'gtag_ga4_id', 'gtag_sanitize_callback');
    register_setting('gtag_settings', 'gtag_ads_id', 'gtag_sanitize_callback');

    add_settings_section('gtag_section', '', 'gtag_section_callback', 'gtag_settings');

    add_settings_field(
        'gtag_ga4_id',
        'Google Analytics (GA4) ID',
        'gtag_ga4_field_callback',
        'gtag_settings',
        'gtag_section'
    );

    add_settings_field(
        'gtag_ads_id',
        'Google Ads ID',
        'gtag_ads_field_callback',
        'gtag_settings',
        'gtag_section'
    );
}
add_action('admin_init', 'gtag_settings_init');

// Section callback
function gtag_section_callback() {
    echo '<p>Enter your Google Analytics (GA4) and Google Ads tracking IDs (e.g., GTM-XXXXXXX or AW-XXXXXXX) below:</p>';
}

// Field callback for GA4
function gtag_ga4_field_callback() {
    $gtag_ga4_id = get_option('gtag_ga4_id', '');
    echo "<input type='text' id='gtag_ga4_id' name='gtag_ga4_id' value='" . esc_attr($gtag_ga4_id) . "' class='regular-text' />";
}

// Field callback for Google Ads
function gtag_ads_field_callback() {
    $gtag_ads_id = get_option('gtag_ads_id', '');
    echo "<input type='text' id='gtag_ads_id' name='gtag_ads_id' value='" . esc_attr($gtag_ads_id) . "' class='regular-text' />";
}

// Sanitize callback
function gtag_sanitize_callback($input) {
    return sanitize_text_field($input);
}

// Settings page
function gtag_settings_page() {
    ?>
    <div class="wrap">
        <h2>Google Tag Settings</h2>
        <form method="post" action="options.php">
            <?php settings_fields('gtag_settings'); ?>
            <?php do_settings_sections('gtag_settings'); ?>
            <?php submit_button('Save Changes'); ?>
        </form>
    </div>
    <?php
}

// Add menu item in WordPress admin panel
function gtag_menu() {
    add_options_page('Google Tag Settings', 'Google Tag Manager', 'edit_pages', 'gtag-settings', 'gtag_settings_page');
}
add_action('admin_menu', 'gtag_menu');

// Insert Google Tag Manager script in <head>
function add_google_tag_manager() {
    $gtag_ga4_id = get_option('gtag_ga4_id');

    if (!$gtag_ga4_id) {
        return;
    }
    ?>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id=<?php echo esc_attr($gtag_ga4_id); ?>'+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','<?php echo esc_attr($gtag_ga4_id); ?>');</script>
    <!-- End Google Tag Manager -->
    <?php
}
add_action('wp_head', 'add_google_tag_manager');

// Insert Google Tag Manager noscript in <body>
function add_google_tag_manager_noscript() {
    $gtag_ga4_id = get_option('gtag_ga4_id');

    if (!$gtag_ga4_id) {
        return;
    }
    ?>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo esc_attr($gtag_ga4_id); ?>"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <?php
}
add_action('wp_body_open', 'add_google_tag_manager_noscript');

// Insert Google Ads script in <head>
function add_google_ads_script() {
    $gtag_ads_id = get_option('gtag_ads_id');
    
    if (!$gtag_ads_id) {
        return;
    }
    ?>
    <!-- Google Ads (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo esc_attr($gtag_ads_id); ?>"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', '<?php echo esc_attr($gtag_ads_id); ?>');
    </script>
    <!-- End Google Ads (gtag.js) -->
    <?php
}
add_action('wp_head', 'add_google_ads_script');