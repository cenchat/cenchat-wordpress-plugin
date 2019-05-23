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
delete_option ( 'cenchat_start_chat_button_text_color' );
delete_option ( 'cenchat_start_chat_button_background_color' );
