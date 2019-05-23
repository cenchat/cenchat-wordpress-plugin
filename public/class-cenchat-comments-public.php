<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @link https://cenchat.com
 * @since 0.0.1
 *
 * @package Cenchat_Comments
 * @subpackage Cenchat_Comments/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package Cenchat_Comments
 * @subpackage Cenchat_Comments/public
 */
class Cenchat_Comments_Public {
    /**
     * The ID of this plugin.
     *
     * @since 0.0.1
     * @access private
     * @var string $plugin_name The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since 0.0.1
     * @access private
     * @var string $version The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since 0.0.1
     * @param string $plugin_name The name of the plugin.
     * @param string $version The version of this plugin.
     */
    public function __construct( $plugin_name, $version ) {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since 0.0.1
     */
    public function enqueue_scripts() {
        if ( comments_open() ) {
            wp_enqueue_script(
                $this->plugin_name . '_embed',
                'https://widget.cenchat.com/embeds/1.0.0/wordpress.js',
                array(),
                $this->version,
                true
            );
        }
    }

    /**
     * Outputs the Cenchat Comments when comments are enabled
     *
     * @since 0.0.1
     */
    public function add_cenchat_comments() {
        if ( comments_open() ) {
            return plugin_dir_path( dirname( __FILE__ ) ) . 'public/partials/cenchat-comments-public-display.php';
        }
    }
}
