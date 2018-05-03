<?php
class Cenchat_Activator {
    public function activate() {
        $tmp = get_option( 'cenchat_id' );

        if ( ! is_array( $tmp ) ) {
            $arr = array( "id_text" => "" );

            update_option( 'cenchat_id', $arr );
        }
    }
}
