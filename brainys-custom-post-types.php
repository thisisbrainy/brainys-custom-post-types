<?php

/*
Plugin Name: Brainy's Custom Post Types
Plugin URI: https://brainy.blog/post-types/
Description: Gives you the ability to view and create post types straight from within the WordPress admin panel
Version: 1.0
Author: Brainy
Author URI: https://brainy.blog
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Text Domain: bcpt
Domain Path: /languages
 */

define('BCPT_DIR', __DIR__);

require_once BCPT_DIR . '/includes/functions.php';
require_once BCPT_DIR . '/includes/actions.php';
require_once BCPT_DIR . '/includes/filters.php';
