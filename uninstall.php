<?php

/**
 * Fired when the plugin is uninstalled.
 *
 * @link https://cenchat.com
 * @since 0.0.1
 *
 * @package Cenchat_Comments
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

delete_option ( 'cenchat_id' );
