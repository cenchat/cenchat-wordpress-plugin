<?php
/*
Plugin Name: Cenchat
Plugin URI: https://github.com/cenchat/cenchat-wordpress-plugin/
Description: WordPress plugin for integrating Cenchat
Version: v0.0.1
Author: Cenchat and various contributors
Author URI: https://github.com/cenchat/cenchat-wordpress-plugin/graphs/contributors
License: GPL-3.0
License URI: https://github.com/cenchat/cenchat-wordpress-plugin/blob/master/LICENSE

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program. If not, see <http://www.gnu.org/licenses/>.
*/

function activate_cenchat() {
    require_once plugin_dir_path( __FILE__ ) . 'includes/cenchat-activator.php';

    $activator = new Cenchat_Activator();

    $activator->activate();
}

register_activation_hook( __FILE__, 'activate_cenchat' );

require_once plugin_dir_path( __FILE__ ) . 'includes/cenchat-settings.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/cenchat-meta.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/cenchat-comments.php';

function run_cenchat() {
    $settings = new Cenchat_Settings();
    $meta = new Cenchat_Meta();
    $comments = new Cenchat_Comments();

    $settings->run();
    $meta->run();
    $comments->run();
}

run_cenchat();
