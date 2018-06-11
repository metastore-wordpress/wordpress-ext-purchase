<?php
/**
 * Plugin Name:     (WP-EXT) Purchase
 * Plugin URI:      https://metastore.pro/
 *
 * Description:     Purchase post type and more.
 *
 * Author:          Kitsune Solar
 * Author URI:      https://kitsune.solar/
 *
 * Version:         1.0.0
 *
 * Text Domain:     wp-ext-purchase
 * Domain Path:     /languages
 *
 * License:         GPLv3
 * License URI:     https://www.gnu.org/licenses/gpl-3.0.html
 */

/**
 * Loading `WP_EXT_Purchase`.
 * ------------------------------------------------------------------------------------------------------------------ */

function run_wp_ext_purchase() {
	require_once( plugin_dir_path( __FILE__ ) . 'includes/WP_EXT_Purchase.class.php' );
	require_once( plugin_dir_path( __FILE__ ) . 'includes/WP_EXT_Purchase_Post_Type.class.php' );
	require_once( plugin_dir_path( __FILE__ ) . 'includes/WP_EXT_Purchase_Post_Field.class.php' );
	require_once( plugin_dir_path( __FILE__ ) . 'includes/WP_EXT_Purchase_Taxonomy.class.php' );
	require_once( plugin_dir_path( __FILE__ ) . 'includes/WP_EXT_Purchase_User_Role.class.php' );
	require_once( plugin_dir_path( __FILE__ ) . 'includes/WP_EXT_Purchase_Theme.class.php' );
//	require_once( plugin_dir_path( __FILE__ ) . 'includes/WP_EXT_Purchase_Template.class.php' );
	require_once( plugin_dir_path( __FILE__ ) . 'includes/WP_EXT_Purchase_ShortCode.class.php' );
	require_once( plugin_dir_path( __FILE__ ) . 'includes/WP_EXT_Purchase_Widget.class.php' );
}

run_wp_ext_purchase();
