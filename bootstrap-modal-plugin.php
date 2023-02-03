<?php
 /**
  * Plugin Name: Bootstrap Modal Plugin
  * Plugin URI: http://www.doitwithwp.com/putting-things-where-they-belong/
  * Description: Modal dialog popup based on Bootstrap 4
  * Author: Taras Gavrysh
  * Version: 1.0.0
  * License: Unlicensed
  *
  * @package  BootstrapModalPlugin
  */

/** -------------------------------- *
 * constants
 *
 * Some useful constants for a plugin to make use of.
 *  -------------------------------- */

if ( ! defined( 'FUNC_PLUGIN_DIR' ) ) {
	define( 'FUNC_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
}

if ( ! defined( 'FUNC_PLUGIN_URL' ) ) {
	define( 'FUNC_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}

if ( ! defined( 'FUNC_PLUGIN_VERSION' ) ) {
	define( 'FUNC_PLUGIN_VERSION', '1.0.0' );
}

/** -------------------------------- *
 * includes
 *
 * Individual feature includes go here.
 * ---------------------------------- */

// adds the custom post type used to create modals
include( FUNC_PLUGIN_DIR . 'includes/bootstrap_modal_cpt.php' );
// this is the logic to generate and output modals from the cpt
include( FUNC_PLUGIN_DIR . 'includes/bootstrap_modal.php' );
