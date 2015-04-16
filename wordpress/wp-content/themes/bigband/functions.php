<?php

class BigBandAdmin {
    protected $options_screen = null;
	public function init() {

    	//$options = & Options_Framework::_optionsframework_options();
		$options=true;
		// Checks if options are available
    	if ( $options ) {
			// Add the options page and menu item.
			add_action( 'admin_menu', array( $this, 'add_custom_options_page' ) );
			
			// Settings need to be registered after admin_init
			add_action( 'admin_init', array( $this, 'settings_init' ) );
			
			// Adds options menu to the admin bar
			add_menu_page( 'BigBand Options', 'BigBand Options', 'manage_options', 'themes.php?page=bigband','','',91);
		}

    }
    function settings_init() {
		// Add the section to reading settings so we can add our
	 	// fields to it
	 	register_setting( 'grupo_de_opciones', 'nueva_opcion' );
    }
    function add_custom_options_page() {

		$menu = $this->menu_settings();

		$this->options_screen = add_theme_page(
            	$menu['page_title'],
            	$menu['menu_title'],
            	$menu['capability'],
            	$menu['menu_slug'],
            	array( $this, 'options_page' )
        );

	}
	static function menu_settings() {
		$menu = array(
			// Modes: submenu, menu
            'mode' => 'submenu',

            // Submenu default settings
            'page_title' => 'BigBand',
			'menu_title' => 'BigBand',
			'capability' => 'edit_theme_options',
			'menu_slug' => 'bigband',
            'parent_slug' => 'themes.php',

		);
		return apply_filters( 'bigband_menu', $menu );
	}
    function options_page() {
    	if (!current_user_can('manage_options')) {
    		wp_die('You do not have sufficient permissions to access this page.');
		}
		?>
		<div class="wrap">
		<h2>Your Plugin Name</h2>
		<form method="post" action="options.php">
		    <?php settings_fields( 'grupo_de_opciones' ); ?>
		    <?php do_settings_sections( 'grupo_de_opciones' ); ?>
		    <table class="form-table">
		        <tr valign="top">
		        <th scope="row">New Option Name</th>
		        <td><input type="text" name="nueva_opcion" value="<?php echo esc_attr( get_option('nueva_opcion') ); ?>" /></td>
		        </tr>
		         
		    </table>
		    
		    <?php submit_button(); ?>
		
		</form>
		</div>
		<?php
	}	
}
if (is_admin() && ! function_exists( 'bigband_init' ) ) :

function bigband_init() {

	//  If user can't edit theme options, exit
	if ( ! current_user_can( 'edit_theme_options' ) )
		return;

	// Loads the required Options Framework classes.
	/*require get_template_directory() . '/inc/options-framework/includes/class-options-framework.php';
	require get_template_directory() . '/inc/options-framework/includes/class-options-framework-admin.php';
	require get_template_directory() . '/inc/options-framework/includes/class-options-interface.php';
	require get_template_directory() . '/inc/options-framework/includes/class-options-media-uploader.php';
	require get_template_directory() . '/inc/options-framework/includes/class-options-sanitization.php';*/

	// Instantiate the main plugin class.
	//$options_framework = new Options_Framework;
	//$options_framework->init();

	// Instantiate the options page.
	$bigband_admin = new BigBandAdmin;
	$bigband_admin->init();

	// Instantiate the media uploader class
	//$options_framework_media_uploader = new Options_Framework_Media_Uploader;
	//$options_framework_media_uploader->init();

}

add_action( 'init', 'bigband_init', 20 );

endif;


?>