<?php
/**
 * Plugin Name:       First Block
 * Description:       Example block scaffolded with Create Block tool.
 * Version:           0.1.0
 * Requires at least: 6.7
 * Requires PHP:      7.4
 * Author:            RWS
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       first-block
 *
 * @package CreateBlock
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define('FIRST_BLOCK_VERSION','0.0.1');
define('FIRST_BLOCK_PATH',plugin_dir_path(__FILE__));
define('FIRST_BLOCK_URL',plugin_dir_url(__FILE__));

require_once FIRST_BLOCK_PATH. '/inc/class-first-block.php';
First_block::register(); 