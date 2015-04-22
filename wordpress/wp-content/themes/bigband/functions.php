<?php

if (is_admin() && ! function_exists( 'bigband_init' ) ){
	function bigband_init(){
		$bigband=new BigBandAdmin();
		$bigband->init();
	}
	add_action( 'init', 'bigband_init', 20 );
}


class BigBandAdmin {
protected $options_screen = null;
	public function init() {

		$options=true;
    	if ( $options ) {
			add_action( 'admin_menu', array( $this, 'add_custom_options_page' ) );
			
			add_action( 'admin_init', array( $this, 'settings_init' ) );
			
			add_action( 'admin_menu', array( $this, 'registra_bigband'));
			
		}

    }
    function registra_bigband(){
	    add_menu_page( 'BigBand Options', 'BigBand Options', 'manage_options', 'themes.php?page=bigband','','',91);
    }
    function settings_init() {

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
	
};

//AJAX
wp_enqueue_script( 'mi-script-ajax',get_bloginfo('template_url') . '/includes/js/ajax.js', array( 'jquery' ) );
wp_localize_script( 'mi-script-ajax', 'MyAjax', array( 'url' => admin_url( 'admin-ajax.php' ), 'nonce' => wp_create_nonce( 'myajax-post-comment-nonce' )  ) );

//wp_localize_script( 'mi-script-ajax', 'MyAjax', array( 'url' => admin_url( 'admin-ajax.php' ) ) );
/* Anyadimos las funciones a wordpress, esta con la funcion buscar_posts en ajax.js cambiar si hace falta*/
add_action('wp_ajax_buscar_posts', 'buscar_posts_callback');
add_action('wp_ajax_nopriv_buscar_posts', 'buscar_posts_callback');

function buscar_posts_callback() {
     
    global $post;
        $nonce = $_POST['nonce'];
        if ( ! wp_verify_nonce( $nonce, 'myajax-post-comment-nonce' ) )
        die ( 'Intento de hackeo localizado, mandando 4 servokosovares armados con bates de baseball!');
        
    $args = array( 'numberposts' => 10, 's' => $_POST['cadena']);
     
    $myposts = get_posts( $args );
        echo '<ul>';
    foreach( $myposts as $post ) :  setup_postdata($post); ?>
        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
           
        <?php endforeach; 
        echo '</ul>';
    die();
}