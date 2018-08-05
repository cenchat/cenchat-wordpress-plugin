<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link https://cenchat.com
 * @since 0.0.1
 * @package Cenchat_Comments
 *
 * @wordpress-plugin
 * Plugin Name: Cenchat Comments
 * Plugin URI: https://cenchat.com
 * Description: Civilized commenting service.
 * Version: 0.0.2
 * Author: Cenchat
 * Author URI: http://cenchat.com
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

/**
 * Current plugin version.
 * Start at version 0.0.1 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'CENCHAT_COMMENTS_VERSION', '0.0.2' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-cenchat-comments-activator.php
 */
function activate_cenchat_comments() {
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-cenchat-comments-activator.php';

    Cenchat_Comments_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-cenchat-comments-deactivator.php
 */
function deactivate_cenchat_comments() {
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-cenchat-comments-deactivator.php';

    Cenchat_Comments_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_cenchat_comments' );
register_deactivation_hook( __FILE__, 'deactivate_cenchat_comments' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-cenchat-comments.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since 0.0.1
 */
function run_cenchat_comments() {
    $plugin = new Cenchat_Comments();

    $plugin->run();
}

run_cenchat_comments();
