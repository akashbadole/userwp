<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       github.com/akashbadole
 * @since      1.0.0
 *
 * @package    Projectmanagement
 * @subpackage Projectmanagement/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Projectmanagement
 * @subpackage Projectmanagement/public
 * @author     akashbadole <badoleakash@gmail.com>
 */
class Projectmanagement_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Projectmanagement_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Projectmanagement_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/projectmanagement-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Projectmanagement_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Projectmanagement_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/projectmanagement-public.js', array( 'jquery' ), $this->version, false );

	}

}


add_action('admin_menu', 'test_plugin_setup_menu');
 
function test_plugin_setup_menu(){
        add_menu_page( 'Project Report Page', 'Project Plugin', 'manage_options', 'projects-plugin', 'test_init' );
}
 
function test_init(){
		echo "<h1>User Details</h1>";
		$blogusers = get_users( [ 'role__in' => [ 'author', 'subscriber', 'administrator', 'contributor', 'editor' ] ] );
// Array of WP_User objects.
foreach ( $blogusers as $user ) {
    // echo '<p>' .esc_html( $user->user_login)."-" .esc_html( $user->display_name)."-" .esc_html( $user->user_email  ) . '</p>';
	// echo  '<span>' .esc_html( $user->user_email  ) . '</span>';
	
	echo ' <strong>Id </strong>'  .$user->ID . ' <strong>Name </strong>' . $user->first_name . ' <strong>Last </strong> ' . $user->last_name . ' <strong>Login </strong>' .
	 $user->user_login . ' <strong>Display Name </strong>' . $user->display_name . ' <strong>Mail </strong>' . $user->user_email . ' <strong>id </strong>' ."<br>" ;


	}
	// echo $pod->pods( 'location' ) . "\n";
	// $someField = get_post_meta( $id, 'location', true );
	// echo $someField;




	
    	//get Pods object for current post
    	$pod = pods( 'location', get_the_id() );
	//get the value for the relationship field
	$related = $pod->field( '177' );
	//loop through related field, creating links to their own pages
	//only if there is anything to loop through
	if ( ! empty( $related ) ) {
		foreach ( $related as $rel ) { 
			//get id for related post and put in ID
			//for advanced content types use $id = $rel[ 'id' ];
			$id = $rel[ 'ID' ];
			//show the related post name as link
			echo '<a href="'.esc_url( get_permalink( $id ) ).'">'.get_the_title( $id ).'</a>';
			//get the value for some_field in related post and echo it
			$someField = get_post_meta( $id, 'some_field', true );
			echo $someField;
		} //end of foreach
	} //endif ! empty ( $related )
	echo "<script> console.log('someField'); </script>";

 
}