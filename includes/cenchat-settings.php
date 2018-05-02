<?php
class Cenchat_Settings {
    public function create_menu() {
        add_menu_page( 
            'Cenchat', 
            'Cenchat', 
            'manage_options', 
            'cenchat', 
            array( 
                $this, 
                'output_settings_page' 
            ) 
        );
    }

    public function init_settings() {
        register_setting( 
            'cenchat', 
            'cenchat_id', 
            array( 
                $this, 
                'validate_input' 
            ) 
        );
        add_settings_section( 
            'cenchat_placeholder', 
            '', 
            array( 
                $this, 
                'section_placeholder' 
            ), 
            'cenchat'
        );
        add_settings_field( 
            'cenchat_id_text', 
            'Cenchat ID', 
            array( 
                $this, 
                'text_input' 
            ), 
            'cenchat', 
            'cenchat_placeholder' 
        );
    }

    public function validate_input( $input ) {
        $input['id_text'] = wp_filter_nohtml_kses( $input['id_text'] );	
        return $input;
    }

    public function section_placeholder() {
        // Do Nothing
    }

    public function text_input() {
        $options = get_option( 'cenchat_id' );

        require_once plugin_dir_path( dirname( __FILE__ ) ) . '/admin/partials/input.php';
    }

    public function output_settings_page() {
        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }

        if ( isset( $_GET['settings-updated'] ) ) {
            add_settings_error( 
                'cenchat_messages', 
                'cenchat_message', 
                __( 'Saved', 'cenchat' ), 
                'updated' 
            );
        }

        settings_errors( 'cenchat_messages' );

        require_once plugin_dir_path( dirname( __FILE__ ) ) . '/admin/partials/settings.php';
    }

    public function run() {
        add_action( 'admin_init', array( $this, 'init_settings' ) );
        add_action( 'admin_menu', array( $this, 'create_menu' ) );
    }
}
