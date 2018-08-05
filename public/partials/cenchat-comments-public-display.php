<?php
/**
 * Provide a public area view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link https://cenchat.com
 * @since 0.0.2
 *
 * @package Cenchat_Comments
 * @subpackage Cenchat_Comments/public/partials
 */
$page_id = get_the_ID();
$value = isset( $page_id ) ? esc_attr( $page_id ) : '';
?>

<div id="cenchat-comments" data-page-id="<?php echo esc_attr( $value ); ?>"></div>
