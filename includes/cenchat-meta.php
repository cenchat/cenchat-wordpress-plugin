<?php
class Cenchat_Meta {
    public function add_meta() {
        $options = get_option( 'cenchat_id' );

        require_once plugin_dir_path( dirname( __FILE__ ) ) . '/public/partials/meta.php';
    }

    public function run() {
        add_action( 'wp_head', array( $this, 'add_meta' ) );
    }
}
