<div class="wrap">
    <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
    <form action="options.php" method="POST">
        <?php
        settings_fields( 'cenchat' );
        do_settings_sections( 'cenchat' );
        submit_button( 'Save changes' );
        ?>
    </form>
</div>
