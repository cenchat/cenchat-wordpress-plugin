<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link https://cenchat.com
 * @since 0.0.1
 *
 * @package Cenchat_Comments
 * @subpackage Cenchat_Comments/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package Cenchat_Comments
 * @subpackage Cenchat_Comments/admin
 */
class Cenchat_Comments_Admin {
    /**
     * The ID of this plugin.
     *
     * @since 0.0.1
     * @access private
     * @var string $plugin_name The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since 0.0.1
     * @access private
     * @var string $version The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since 0.0.1
     * @param string $plugin_name The name of this plugin.
     * @param string $version The version of this plugin.
     */
    public function __construct( $plugin_name, $version ) {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    /**
     * Registers general settings
     *
     * @since 0.0.1
     */
    private function register_general_settings() {
        register_setting(
            'cenchat_options',
            'cenchat_id',
            array(
                'type' => 'string',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
        register_setting(
            'cenchat_options',
            'cenchat_start_chat_button_text_color',
            array(
                'type' => 'string',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
        register_setting(
            'cenchat_options',
            'cenchat_start_chat_button_background_color',
            array(
                'type' => 'string',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
        add_settings_section( 
            'general_settings_section',
            'General',
            array( $this, 'output_general_settings_section_header' ),
            'cenchat_options'
        );
        add_settings_section( 
            'start_chat_button_section',
            'Start Chat Button',
            array( $this, 'output_start_chat_button_section_header' ),
            'cenchat_options'
        );
        add_settings_field(
            'cenchat_id_field',
            'Cenchat ID',
            array( $this, 'output_cenchat_id_field' ),
            'cenchat_options',
            'general_settings_section'
        );
        add_settings_field(
            'cenchat_start_chat_button_text_color_field',
            'Text color (in hex code)',
            array( $this, 'output_cenchat_start_chat_button_text_color_field' ),
            'cenchat_options',
            'start_chat_button_section'
        );
        add_settings_field(
            'cenchat_start_chat_button_background_color_field',
            'Background color (in hex code)',
            array( $this, 'output_cenchat_start_chat_button_background_color_field' ),
            'cenchat_options',
            'start_chat_button_section'
        );
    }

    /**
     * Outputs the admin display page
     *
     * @since 0.0.1
     */
    public function output_admin_display_page() {
        require_once plugin_dir_path( dirname( __FILE__ ) ) . '/admin/partials/cenchat-comments-admin-display.php';
    }

    /**
     * Outputs the general settings section header
     *
     * @since 0.0.1
     */
    public function output_general_settings_section_header() {
        require_once plugin_dir_path( dirname( __FILE__ ) ) . '/admin/partials/cenchat-comments-general-settings-section-header.php';
    }

    /**
     * Outputs the start chat button settings section header
     *
     * @since 0.1.0
     */
    public function output_start_chat_button_section_header() {
        require_once plugin_dir_path( dirname( __FILE__ ) ) . '/admin/partials/cenchat-comments-start-chat-button-settings-section-header.php';
    }

    /**
     * Outputs the Cenchat ID field
     *
     * @since 0.0.1
     */
    public function output_cenchat_id_field() {
        $cenchat_id = get_option( 'cenchat_id' );
        $value = isset( $cenchat_id ) ? esc_attr( $cenchat_id ) : '';

        $template = sprintf( '<input type="text" name="cenchat_id" value="%1$s">', esc_attr( $value ) );

        echo $template;
    }

    /**
     * Outputs the start chat button text color field
     *
     * @since 0.1.0
     */
    public function output_cenchat_start_chat_button_text_color_field() {
        $cenchat_start_chat_button_text_color = get_option( 'cenchat_start_chat_button_text_color' );
        $value = isset( $cenchat_start_chat_button_text_color ) ? esc_attr( $cenchat_start_chat_button_text_color ) : '';

        $template = sprintf( '<input type="text" name="cenchat_start_chat_button_text_color" placeholder="#ffffff" value="%1$s">', esc_attr( $value ) );

        echo $template;
    }

    /**
     * Outputs the start chat button background color field
     *
     * @since 0.1.0
     */
    public function output_cenchat_start_chat_button_background_color_field() {
        $cenchat_start_chat_button_background_color = get_option( 'cenchat_start_chat_button_background_color' );
        $value = isset( $cenchat_start_chat_button_background_color ) ? esc_attr( $cenchat_start_chat_button_background_color ) : '';

        $template = sprintf( '<input type="text" name="cenchat_start_chat_button_background_color" placeholder="#455b82" value="%1$s">', esc_attr( $value ) );

        echo $template;
    }

    /**
     * Registers the admin related settings
     *
     * @since 0.0.1
     */
    public function register_settings() {
        $this->register_general_settings();
    }

    /**
     * Adds the admin menu page
     *
     * @since 0.0.1
     */
    public function add_menu_page() {
        $menu_icon = 'data:image/svg+xml;base64,' . base64_encode('<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 25.604 25.4"><path fill="black" d="M16.858 0q3.675 0 6.094 1.163 2.465 1.163 2.465 2.977 0 .791-.511 1.442-.512.605-1.303.605-.605 0-.977-.186-.325-.186-.93-.605-.28-.279-.884-.65-.558-.28-1.582-.466-1.023-.186-1.86-.186-2.42 0-4.28 1.116-1.861 1.117-2.885 3.117-1.023 1.954-1.023 4.373 0 2.466.977 4.42 1.023 1.953 2.838 3.07 1.814 1.116 4.14 1.116 2.419 0 3.908-.744.325-.186.883-.605.466-.372.791-.558.372-.186.884-.186.93 0 1.442.605.559.558.559 1.488 0 .977-1.257 1.954-1.209.93-3.302 1.535-2.047.605-4.42.605-3.535 0-6.234-1.628-2.698-1.675-4.186-4.56-1.443-2.93-1.443-6.512 0-3.582 1.536-6.466 1.535-2.931 4.28-4.56Q13.322 0 16.858 0z"/><path fill="black" d="M6.35 22.225A3.175 3.175 0 0 1 3.175 25.4 3.175 3.175 0 0 1 0 22.225a3.175 3.175 0 0 1 3.175-3.175 3.175 3.175 0 0 1 3.175 3.175z"/></svg>');

        add_menu_page(
            'Cenchat Settings',
            'Cenchat',
            'manage_options',
            'cenchat',
            array( $this, 'output_admin_display_page' ),
            $menu_icon
        );
    }
}
