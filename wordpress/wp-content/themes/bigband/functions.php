<?php

if (is_admin() && ! function_exists( 'bigband_init' ) ){
	function bigband_init(){
		//add_action( 'admin_menu', 'add_custom_options_page' );
		add_action( 'admin_init', 'settings_init');
		add_action( 'admin_menu', 'register_my_custom_menu_page');
	}
	add_action( 'init', 'bigband_init', 20 );
}


function register_my_custom_menu_page() {
	add_menu_page( 'BigBand', 'BigBand', 'manage_options', 'themes.php?page=bigband', '', '', 6 );
}
function settings_init() {
	register_setting( 'grupo_de_opciones', 'nueva_opcion' );
}
function add_custom_options_page() {

	$menu=menu_settings();

	add_theme_page(
        	$menu['page_title'],
        	$menu['menu_title'],
        	$menu['capability'],
        	$menu['menu_slug'],
        	options_page()
    );

}
function menu_settings() {
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
?>