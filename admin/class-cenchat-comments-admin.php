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
		register_setting( 'cenchat_options', 'cenchat_id' );
        add_settings_section( 
            'general_settings_section',
            'General',
            array( $this, 'output_general_settings_section_header' ),
            'cenchat_options'
        );
        add_settings_field(
            'cenchat_id_field',
            'Cenchat ID',
            array( $this, 'output_cenchat_id_field' ),
            'cenchat_options',
            'general_settings_section'
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
		$menu_icon = 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIj8+DQo8c3ZnIGNsYXNzPSJzcGxhc2gtc2NyZWVuX19sb2dvIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMTMuNTEzIiBoZWlnaHQ9IjEwOS41MzIiIHZpZXdCb3g9IjAgMCAzMC4wMzQgMjguOTgiPg0KPHRpdGxlPkNlbmNoYXQ8L3RpdGxlPg0KDQo8ZyB0cmFuc2Zvcm09InRyYW5zbGF0ZSgtMjMuNjE5IC0xNzguNjI4KSI+DQogICAgPGcgc3R5bGU9ImxpbmUtaGVpZ2h0OjEuMjUiPg0KICAgIDxwYXRoIGQ9Ik01My42NTMgMjA1LjI0NHEtMi4zMzIgMS4xMTYtNC40NCAxLjczNi0yLjA4NC42Mi00LjQ0LjYyLTMuMDAyIDAtNS41MDctLjg2OC0yLjUwNS0uODkzLTQuMjkxLTIuNjc5LTEuODExLTEuNzg2LTIuODAzLTQuNTE0LS45OTMtMi43MjktLjk5My02LjM3NSAwLTYuNzk3IDMuNzIxLTEwLjY2NiAzLjc0Ni0zLjg3IDkuODcyLTMuODcgMi4zODIgMCA0LjY2NC42NyAyLjMwNy42NyA0LjIxNyAxLjYzN3Y1LjE4NGgtLjI0OXEtMi4xMzMtMS42NjItNC40MTUtMi41NTUtMi4yNTctLjg5My00LjQxNS0uODkzLTMuOTY5IDAtNi4yNzYgMi42OC0yLjI4MiAyLjY1My0yLjI4MiA3LjgxMyAwIDUuMDEgMi4yMzMgNy43MTQgMi4yNTcgMi42NzkgNi4zMjUgMi42NzkgMS40MTQgMCAyLjg3Ny0uMzcyIDEuNDY0LS4zNzIgMi42My0uOTY3IDEuMDE3LS41MjEgMS45MS0xLjA5Mi44OTMtLjU5NSAxLjQxMy0xLjAxN2guMjQ5eiIgc3R5bGU9Ii1pbmtzY2FwZS1mb250LXNwZWNpZmljYXRpb246J3NhbnMtc2VyaWYsIE5vcm1hbCc7Zm9udC12YXJpYW50LWxpZ2F0dXJlczpub3JtYWw7Zm9udC12YXJpYW50LWNhcHM6bm9ybWFsO2ZvbnQtdmFyaWFudC1udW1lcmljOm5vcm1hbDtmb250LWZlYXR1cmUtc2V0dGluZ3M6bm9ybWFsO3RleHQtYWxpZ246c3RhcnQiIGZvbnQtc2l6ZT0iNTAuOCIgYXJpYS1sYWJlbD0iYyIgZm9udC13ZWlnaHQ9IjQwMCIgZm9udC1mYW1pbHk9InNhbnMtc2VyaWYiIGxldHRlci1zcGFjaW5nPSIwIiB3b3JkLXNwYWNpbmc9IjAiIHN0cm9rZS13aWR0aD0iLjI2NSIgLz4NCiAgICA8Y2lyY2xlIGN4PSIyNy41ODgiIGN5PSIyMDMuNjQiIHI9IjMuOTY5IiAvPg0KICAgIDwvZz4NCjwvZz4NCjwvc3ZnPg==';

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
