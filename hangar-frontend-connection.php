<?php
/*
Plugin Name: TDP Front-End Connection
Plugin URI: http://themesdepot.org
Description: Add a powerful frontend modal registration/login popup.
Version: 1.3
Author: ThemesDepot
Author URI: http://themesdepot.org
*/

	// Return our data saved in the database to load some things.
	$wpml_settings = get_option( 'tdp_connection_options' );

	// Load our primary class.
	require_once( 'includes/class-wp-modal-login.php' );

	/**
	 * Create a helper function for adding our login goodness
	 * @param String $login_text  The text for the login link. Default 'Login'.
	 * @param String $logout_text The text for the logout link. Default 'Logout'.
	 * @param String $logout_url  The url to redirect to when users logout. Empty by default.
	 * @param Bool   $show_admin  The setting to display the link to the admin area when logged in.
	 * @return HTML
	 *
	 * @version 1.0
	 * @since 2.0
	 */
	function add_modal_login_button( $login_text = 'Login', $logout_text = 'Logout', $logout_url = '', $show_admin = true ) {
		global $wp_modal_login_class;

		// Make sure our class is really truly loaded.
		if ( isset( $wp_modal_login_class ) ) {
			echo $wp_modal_login_class->modal_login_btn( $login_text, $logout_text, $logout_url, $show_admin );
		} else {
			echo __( 'ERROR: WP Modal Login class not loaded.', 'tdp-fec' );
		}
	}

	function tdp_fep_load_textdomain()
	{	
	    load_plugin_textdomain( 'tdp-fec', false, dirname( plugin_basename( __FILE__ ) ) . '/langs/' );
	}


	// Load this shiz.
	if ( class_exists( 'Tdp_frontend_WP_Modal_Login' ) )
		$wp_modal_login_class = new Tdp_frontend_WP_Modal_Login;
