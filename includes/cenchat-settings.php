<?php
class Cenchat_Settings {
    public function create_menu() {
        $menu_icon = 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIj8+DQo8c3ZnIGNsYXNzPSJzcGxhc2gtc2NyZWVuX19sb2dvIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMTMuNTEzIiBoZWlnaHQ9IjEwOS41MzIiIHZpZXdCb3g9IjAgMCAzMC4wMzQgMjguOTgiPg0KPHRpdGxlPkNlbmNoYXQ8L3RpdGxlPg0KDQo8ZyB0cmFuc2Zvcm09InRyYW5zbGF0ZSgtMjMuNjE5IC0xNzguNjI4KSI+DQogICAgPGcgc3R5bGU9ImxpbmUtaGVpZ2h0OjEuMjUiPg0KICAgIDxwYXRoIGQ9Ik01My42NTMgMjA1LjI0NHEtMi4zMzIgMS4xMTYtNC40NCAxLjczNi0yLjA4NC42Mi00LjQ0LjYyLTMuMDAyIDAtNS41MDctLjg2OC0yLjUwNS0uODkzLTQuMjkxLTIuNjc5LTEuODExLTEuNzg2LTIuODAzLTQuNTE0LS45OTMtMi43MjktLjk5My02LjM3NSAwLTYuNzk3IDMuNzIxLTEwLjY2NiAzLjc0Ni0zLjg3IDkuODcyLTMuODcgMi4zODIgMCA0LjY2NC42NyAyLjMwNy42NyA0LjIxNyAxLjYzN3Y1LjE4NGgtLjI0OXEtMi4xMzMtMS42NjItNC40MTUtMi41NTUtMi4yNTctLjg5My00LjQxNS0uODkzLTMuOTY5IDAtNi4yNzYgMi42OC0yLjI4MiAyLjY1My0yLjI4MiA3LjgxMyAwIDUuMDEgMi4yMzMgNy43MTQgMi4yNTcgMi42NzkgNi4zMjUgMi42NzkgMS40MTQgMCAyLjg3Ny0uMzcyIDEuNDY0LS4zNzIgMi42My0uOTY3IDEuMDE3LS41MjEgMS45MS0xLjA5Mi44OTMtLjU5NSAxLjQxMy0xLjAxN2guMjQ5eiIgc3R5bGU9Ii1pbmtzY2FwZS1mb250LXNwZWNpZmljYXRpb246J3NhbnMtc2VyaWYsIE5vcm1hbCc7Zm9udC12YXJpYW50LWxpZ2F0dXJlczpub3JtYWw7Zm9udC12YXJpYW50LWNhcHM6bm9ybWFsO2ZvbnQtdmFyaWFudC1udW1lcmljOm5vcm1hbDtmb250LWZlYXR1cmUtc2V0dGluZ3M6bm9ybWFsO3RleHQtYWxpZ246c3RhcnQiIGZvbnQtc2l6ZT0iNTAuOCIgYXJpYS1sYWJlbD0iYyIgZm9udC13ZWlnaHQ9IjQwMCIgZm9udC1mYW1pbHk9InNhbnMtc2VyaWYiIGxldHRlci1zcGFjaW5nPSIwIiB3b3JkLXNwYWNpbmc9IjAiIHN0cm9rZS13aWR0aD0iLjI2NSIgLz4NCiAgICA8Y2lyY2xlIGN4PSIyNy41ODgiIGN5PSIyMDMuNjQiIHI9IjMuOTY5IiAvPg0KICAgIDwvZz4NCjwvZz4NCjwvc3ZnPg==';

        add_menu_page( 
            'Cenchat', 
            'Cenchat', 
            'manage_options', 
            'cenchat', 
            array( $this, 'output_settings_page' ),
            $menu_icon
        );
    }

    public function init_settings() {
        register_setting( 
            'cenchat', 
            'cenchat_id', 
            array( $this, 'validate_input' ) 
        );
        add_settings_section( 
            'general_settings_section', 
            'General Settings', 
            array( $this, 'general_settings_section_header' ), 
            'cenchat'
        );
        add_settings_field( 
            'cenchat_id_text', 
            'Cenchat ID', 
            array( $this, 'text_input' ), 
            'cenchat', 
            'general_settings_section' 
        );
    }

    public function validate_input( $input ) {
        $input['id_text'] = wp_filter_nohtml_kses( $input['id_text'] );	
        return $input;
    }

    public function general_settings_section_header() {
        require_once plugin_dir_path( dirname( __FILE__ ) ) . '/admin/partials/general_settings_section_header.php';
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
