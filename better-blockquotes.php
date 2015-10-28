<?php
/**
 * Better Blockquotes
 *
 * @package   Better_Blockquotes
 * @license   GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name: Better Blockquotes
 * Plugin URI:  http://github.com/devinsays/better-blockquotes
 * Description: Replaces the standard blockquote button in the WordPress editor with one that additional options.
 * Version:     0.1.0
 * Author:      Devin Price
 * Author URI:  http://github.com/devinsays/better-blockquotes
 * Text Domain: better-blockquotes
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path: /languages
 */
namespace Better_Blockquotes;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Determines when to load custom TinyMCE buttons
 *
 * @since 1.0.0
 */
function tinyMCE_custom_button() {

    global $typenow;

    // Exit if user can't edit posts
    if ( ! current_user_can( 'edit_posts') && ! current_user_can( 'edit_pages' ) ) {
   		return;
    }

	// Only load on posts or pages
	// @TODO Extend to Custom Post Types
    if ( ! in_array( $typenow, array( 'post', 'page' ) ) ) {
        return;
    }

	// Only load if rich editor is on
	if ( 'true' == get_user_option( 'rich_editing' ) ) {
		add_filter( 'mce_external_plugins', __NAMESPACE__ . '\add_tinyMCE_plugin' );
		add_filter( 'mce_buttons', __NAMESPACE__ . '\register_tinyMCE_button' );
	}

}
add_action( 'admin_head', __NAMESPACE__ . '\tinyMCE_custom_button' );

/**
 * Loads the javascript required for the custom TinyMCE button
 *
 * @since 1.0.0
 */
function add_tinyMCE_plugin( $plugin_array ) {

   	$plugin_array['better_blockquote'] = plugins_url( 'blockquotes.js', __FILE__ );
   	return $plugin_array;

}

/**
 * Adds the button to TinyMCE
 *
 * @since 1.0.0
 */
function register_tinyMCE_button( $buttons ) {

	// Removes the default blockquote button
	if ( false !== ( $key = array_search( 'blockquote', $buttons ) ) ) {
		unset( $buttons[$key] );
	}

   // Add the custom blockquotes button
   array_push( $buttons, 'better_blockquote' );

   return $buttons;
}