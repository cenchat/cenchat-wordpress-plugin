<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link https://cenchat.com
 * @since 0.0.1
 *
 * @package Cenchat_Comments
 * @subpackage Cenchat_Comments/admin/partials
 */
?>

<div class="wrap">
    <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
    <form action="options.php" method="POST">
        <?php
        settings_fields( 'cenchat_options' );
        do_settings_sections( 'cenchat_options' );
        submit_button( 'Save changes' );
        ?>
    </form>
</div>
