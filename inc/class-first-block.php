<?php

class First_block{

    public static function register(){     
      add_action( 'admin_menu', array( get_class(), 'add_admin_menu' ));
      add_action( 'admin_enqueue_scripts', array( get_class(), 'enqueue_admin_page_scripts' ) );

      // Register our custom settings and expose it to the REST API.
		add_action( 'admin_init', array( get_class(), 'register_custom_settings' ) );
		add_action( 'rest_api_init', array( get_class(), 'register_custom_settings' ) );	

		
    } 
    
    public static function add_admin_menu() {

      // Adds our options page to the 'Settings' menu.
      add_options_page(
        'Example WP Settings',
        'Example WP Settings',
        'manage_options',
        'example-wp-settings',
        array( get_class(), 'create_admin_page' )
      );
    }
  
    public static function create_admin_page() {
      // Because our settings page is a React app, we don't need to output anything here.
      // We just need to output a div with an ID that our React app can render into.
      ?>
      <div class="wrap">
        <div id="root"></div>
      </div>
      <?php
    }

    public static function enqueue_admin_page_scripts() {

      $screen  = get_current_screen();      
      if( 'settings_page_example-wp-settings'  !== $screen->id ) {
        return;
      }

      	// Enqueue the styles for the core components library.
		wp_enqueue_style( 'global' );
		wp_enqueue_style( 'wp-edit-post' );

		// Our build processs generates a `index.asset.php` file for each entry point.
		$asset_file = include FIRST_BLOCK_PATH . 'assets/build/admin/index.asset.php';

      	wp_enqueue_style( 'example-wp-settings', plugin_dir_url( __DIR__ ) . 'assets/build/admin/index.css' );
      	wp_enqueue_script( 'example-wp-settings', plugin_dir_url( __DIR__ ) . 'assets/build/admin/index.js', $asset_file['dependencies'],$asset_file['version'], true );
    }

    /**
	 * Register our custom settings handler.
	 *
	 * @return void
	 */
	public static function register_custom_settings() {

		// Register our custom setting.
		register_setting(
			'wpdev',
			'wpdev_account_settings',
			array(
				'type'              => 'object', // Our setting is an object that could contain multiple values.
				'description'       => 'Account Settings for our API.',
				'sanitize_callback' => array( get_class(), 'sanitize_callback' ),
				'default'           => array( // Default values for our setting.
					'account_number' => '',
				//	'account_key'    => '',
				),
				'show_in_rest'      => array(
					'schema' => array(
						'type'       => 'object',
						'properties' => array(
							'account_number' => array( // Schema for our 'account_number'.
								'type' => 'string',
							),
							// 'account_key'    => array( // Schema for our 'account_key'.
							// 	'type' => 'string',
							// ),
						),
					),
				),
			)
		);
	}


	/**
	 * Sanitize our settings.
	 *
	 * @param array $settings The settings to sanitize.
	 * @return array
	 */
	public static function sanitize_callback( $settings ) {
		// Sanitize our 'account_number'.
		$settings['account_number'] = sanitize_text_field( $settings['account_number'] );
		// Sanitize our 'account_key'.
		//$settings['account_key'] = sanitize_text_field( $settings['account_key'] );
		return $settings;
	}
  

}