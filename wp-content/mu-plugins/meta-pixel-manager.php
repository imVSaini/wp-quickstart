<?php
/*
 * Plugin Name: Meta Pixel Manager
 * Description: Adds Meta Pixel tracking code to your WordPress site.
 * Author: Vaibhav Saini
 * Author URI: https://www.linkedin.com/in/vaibhavsaini07/
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Version: 1.0.0
 * Requires at least: 6.3
 * Requires PHP: 7.4
 */

// Register settings
function meta_pixel_settings_init() {
    register_setting('meta_pixel_settings', 'meta_pixel_id', 'sanitize_text_field');

    add_settings_section('meta_pixel_section', '', 'meta_pixel_section_callback', 'meta_pixel_settings');

    add_settings_field(
        'meta_pixel_id',
        'Meta Pixel ID',
        'meta_pixel_field_callback',
        'meta_pixel_settings',
        'meta_pixel_section'
    );
}

add_action('admin_init', 'meta_pixel_settings_init');

// Section callback
function meta_pixel_section_callback() {
    echo '<p>Enter your Meta Pixel ID (e.g., 123XXXXXXX) below:</p>';
}

// Field callback
function meta_pixel_field_callback() {
    $pixel_id = get_option('meta_pixel_id', '');
    echo "<input type='text' id='meta_pixel_id' name='meta_pixel_id' value='" . esc_attr($pixel_id) . "' class='regular-text' />";
}

// Settings page
function meta_pixel_settings_page() {
?>
    <div class="wrap">
        <h2>Meta Pixel Settings</h2>
        <form method="post" action="options.php">
            <?php settings_fields('meta_pixel_settings'); ?>
            <?php do_settings_sections('meta_pixel_settings'); ?>
            <?php submit_button('Save Changes'); ?>
        </form>
    </div>
<?php
}

// Add menu item in WordPress admin panel
function meta_pixel_menu() {
    add_options_page('Meta Pixel Settings', 'Meta Pixel Manager', 'edit_pages', 'meta-pixel-settings', 'meta_pixel_settings_page');
}

add_action('admin_menu', 'meta_pixel_menu');

// Insert Meta Pixel script in <head>
function add_meta_pixel_script() {
    $pixel_id = get_option('meta_pixel_id');
    if (!$pixel_id) {
        return;
    }
?>
    <!-- Meta Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '<?php echo esc_js($pixel_id); ?>');
        fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=<?php echo esc_attr($pixel_id); ?>&ev=PageView&noscript=1" />
    </noscript>
    <!-- End Meta Pixel Code -->
<?php
}

add_action('wp_head', 'add_meta_pixel_script');