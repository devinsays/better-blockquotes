<?php
/**
 * Plugin Name: Better Blockquotes
 * Plugin URI:  http://github.com/devinsays/better-blockquotes
 * Description: Replaces the standard blockquote button in the WordPress editor with one that additional options.
 * Version:     1.0.0
 * Author:      Devin Price
 * Author URI:  http://github.com/devinsays/better-blockquotes
 * Text Domain: better-blockquotes
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path: /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Better Blockquotes
 *
 * @since 1.0.0
 */
class BetterBlockquotes {

	const VERSION = '1.0.0';

	/**
	 * Constructor
	 *
	 * @return void
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'init' ) );

	}

	/**
	 * Initialize the plugin
	 *
	 * @return void
	 */
	public function init() {

    	// Setup internationalization
		$this->i18n();

		// Translations used by javascript loaded with this plugin
		add_action( 'admin_enqueue_scripts', array( $this, 'localize_script' ) );

		// Loads the buttons if user has permissions
		add_action( 'admin_head', array( $this, 'tinyMCE_button_init' ) );
	}

	/**
	 * Internationalization setup
	 *
	 * @return void
	 */
	public function i18n() {
		$domain = 'better-blockquotes';
		$locale = apply_filters( 'plugin_locale', get_locale(), $domain );
		load_textdomain( $domain, WP_LANG_DIR."/tinymce-email-button/$domain-$locale.mo" );
		load_plugin_textdomain( $domain, false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	}

	/**
	 * Localization for the tinymce-email-button.js file
	 *
	 * @return void
	 */
	public function localize_script() {

		wp_localize_script( 'editor', 'better_blockquotes', array(
			'add_blockquote'  => __( 'Add Blockquote', 'better-blockquotes' ),
			'blockquote'  => __( 'Blockquote', 'better-blockquotes' ),
			'quote'  => __( 'Quote', 'better-blockquotes' ),
			'citation'  => __( 'Citation', 'better-blockquotes' ),
			'citation_link'  => __( 'Citation Link', 'better-blockquotes' ),
			'class' => __( 'Class', 'better-blockquotes' ),
			'class_options' => apply_filters( 'betterblockquotes_classes', false )
		) );

	}

	/**
	 * TinyMCE Button Init
	 *
	 * @return void
	 */
	public function tinyMCE_button_init() {

		// Exit if user can't edit posts
		if ( ! current_user_can( 'edit_posts') && ! current_user_can( 'edit_pages' ) ) {
   			return;
    	}

		// Exit if rich editing is not enable
    	if ( 'true' != get_user_option( 'rich_editing' ) ) {
	    	return;
	    }

		add_filter( 'mce_buttons', array( $this, 'register_tinyMCE_button' ) );
		add_filter( 'mce_external_plugins', array( $this, 'add_tinyMCE_plugin' ) );

	}

	/**
	 * Loads the javascript required for the custom TinyMCE button
	 *
	 * @return array TinyMCE buttons
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

}

new BetterBlockquotes;