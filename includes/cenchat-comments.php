<?php
class Cenchat_Comments {
    public function apply_template( $comment_template ) {
        return plugin_dir_path( dirname( __FILE__ ) ) . '/public/partials/comments.php';
    }

    public function run() {
        add_filter( 'comments_template', array( $this, 'apply_template' ) );
    }
}
