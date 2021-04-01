<?php /*
================================================================================
2022 Child Theme Class
================================================================================
AUTHOR: Christian Wach <needle@haystack.co.uk>
--------------------------------------------------------------------------------
NOTES

--------------------------------------------------------------------------------
*/



/**
 * The Ball Theme Class.
 *
 * A class that encapsulates this theme's functionality.
 *
 * @since 1.0.0
 */
class SOF_The_Ball_2022_Theme {

	/**
	 * Rich Styling Templates.
	 *
	 * @since 1.0.0
	 * @access public
	 * @var array $rich_templates The of templates which have "rich" styling.
	 */
	public $rich_templates = [
		'page-rich-widgets-two-cols.php',
		'page-rich-two-cols.php',
		'page-rich-one-col.php',
	];



	/**
	 * Initialises this object.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {

		// Listen for parent theme class to be loaded.
		add_action( 'sof/theme/the_ball/loaded', [ $this, 'initialise' ] );

	}



	/**
	 * Include files.
	 *
	 * @since 1.0.0
	 */
	public function initialise() {

		// Include files.
		$this->include_files();

		// Set up objects and references.
		$this->setup_objects();

		// Register hooks.
		$this->register_hooks();

		/**
		 * Broadcast that this instance is loaded.
		 *
		 * @since 1.0.0
		 */
		do_action( 'sof/theme/the_ball_2022/loaded' );

	}



	/**
	 * Include files.
	 *
	 * @since 1.0.0
	 */
	public function include_files() {

		// Only do this once.
		static $done;
		if ( isset( $done ) AND $done === true ) {
			return;
		}

		// Include global scope Theme Functions.
		//include get_stylesheet_directory() . '/includes/functions-theme.php';

		// We're done.
		$done = true;

	}



	/**
	 * Set up this plugin's objects.
	 *
	 * @since 1.0.0
	 */
	public function setup_objects() {

		// Only do this once.
		static $done;
		if ( isset( $done ) AND $done === true ) {
			return;
		}

		// We're done.
		$done = true;

	}



	/**
	 * Register WordPress hooks.
	 *
	 * @since 1.0.0
	 */
	public function register_hooks() {

		// Set up this theme's defaults.
		add_action( 'after_setup_theme', [ $this, 'theme_setup' ] );

		// Add CSS and JS with high priority so they are late in the queue.
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_styles' ], 1005 );
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ], 1005 );

		// Filter the image of The Ball.
		//add_filter( 'theball_image', [ $this, 'theball_image_filter' ] );

		// Filter the Supporters file.
		add_filter( 'theball_supporters', [ $this, 'supporters_file_filter' ] );

		// Filter the Team Members array.
		//add_filter( 'theball_team_members', [ $this, 'team_members_filter' ] );

		// Filter the Submenu Widget Title.
		add_filter( 'widget_title', [ $this, 'widget_menu_title_filter' ], 10, 3 );

		// Filter the Child Pages Widget Title.
		add_filter( 'widget_title', [ $this, 'widget_list_title_filter' ], 10, 3 );

	}



	/**
	 * Augment the Base Theme's setup function.
	 *
	 * @since 1.0.0
	 */
	public function theme_setup() {

		/*
		 * Make theme available for translation.
		 * Translations can be added to the /languages/ directory of the child theme.
		 */
		load_child_theme_textdomain(
			'theball2022',
			get_stylesheet_directory() . '/languages'
		);

	}



	/**
	 * Add child theme's CSS file(s).
	 *
	 * @since 1.0.0
	 */
	public function enqueue_styles() {

		// If it's one of our "rich" templates.
		if ( is_page_template( $this->rich_templates ) ) {

			// Add rich styles.
			wp_enqueue_style(
				'theball_rich_css',
				get_template_directory_uri() . '/assets/css/rich.css',
				[ 'theball_screen_css', 'dashicons' ], // Dependencies.
				THEBALL_VERSION, // Version.
				'all' // Media.
			);

		}

		// Enqueue file.
		wp_enqueue_style(
			'theball2022_css',
			get_stylesheet_directory_uri() . '/assets/css/style-overrides.css',
			[ 'theball_screen_css' ],
			THEBALL2022_VERSION, // Version.
			'all' // Media.
		);

	}




	/**
	 * Add our theme's JavaScript files.
	 *
	 * @since 1.0.0
	 */
	public function enqueue_scripts() {

		// If it's one of our "rich" templates.
		if ( is_page_template( $this->rich_templates ) ) {

			// Navigation script.
			wp_enqueue_script(
				'theball2022_navigation',
				get_stylesheet_directory_uri() . '/assets/js/navigation-widget-menu.js',
				[],
				THEBALL2022_VERSION,
				true
			);

		}

	}



	/**
	 * Override image of The Ball.
	 *
	 * @since 1.0.0
	 *
	 * @param str $default The existing markup for the image file.
	 * @return str $default The modified markup for the image file.
	 */
	public function theball_image_filter( $default ) {

		// Ignore default and set our own.
		return '<a href="' . get_home_url( null, '/' ) . '" title="' . __( 'Home', 'theball2022' ) . '" class="ball_image">' .
				'<img src="' . get_stylesheet_directory_uri() . '/assets/images/interface/the_ball_2022_200_sq.png" ' .
					 'alt="' . esc_attr( __( 'The Ball 2022', 'theball2022' ) ) . '" ' .
					 'title="' . esc_attr( __( 'The Ball 2022', 'theball2022' ) ) . '" ' .
					 'style="width: 100px; height: 100px;" ' .
					 'id="the_ball_header" />' .
				'</a>' ;

	}



	/**
	 * Override supporters footer template file.
	 *
	 * @since 1.0.0
	 *
	 * @param str $default The default path to the template file.
	 * @return str $default The modified path to the template file.
	 */
	public function supporters_file_filter( $default ) {

		// Override with 2022 file.
		return get_stylesheet_directory() . '/assets/includes/supporters_2022.php';

	}



	/**
	 * Override users in "Team" template file.
	 *
	 * @since 1.0.0
	 *
	 * @param array $users The default set of users.
	 * @return array $users The modified set of users.
	 */
	public function team_members_filter( $default ) {

		// 2022 users.
		return [ 3, 5, 8, 7, 2, 4 ];

	}



	/**
	 * Modify the title of the Submenu Widget.
	 *
	 * @since 1.0.0
	 *
	 * @param string The instance title.
	 * @param array $instance Settings for the current widget instance.
	 * @param string The ID of the widget.
	 * @return string The modified instance title.
	 */
	public function widget_menu_title_filter( $title, $instance, $id_base ) {

		// Bail if not the Widget we're looking for.
		if ( empty( $instance['nav_menu'] ) ) {
			return $title;
		}
		if ( $instance['nav_menu'] != 2 ) {
			return $title;
		}

		// Wrap title in span.
		$title = '<span class="menu-toggle">' . $title . '<span>';

		/*
		$e = new \Exception();
		$trace = $e->getTraceAsString();
		error_log( print_r( [
			'method' => __METHOD__,
			'title' => $title,
			'instance' => $instance,
			'id_base' => $id_base,
			//'backtrace' => $trace,
		], true ) );
		*/

		// --<
		return $title;

	}



	/**
	 * Modify the title of the Child Pages Widget.
	 *
	 * @since 1.0.0
	 *
	 * @param string The instance title.
	 * @param array $instance Settings for the current widget instance.
	 * @param string The ID of the widget.
	 * @return string The modified instance title.
	 */
	public function widget_list_title_filter( $title, $instance, $id_base ) {

		// Bail if not the Widget we're looking for.
		if ( empty( $id_base ) ) {
			return $title;
		}
		if ( $id_base != 'widget_featured_page' ) {
			return $title;
		}

		// Wrap title in span.
		$title = '<span class="menu-toggle">' . $title . '<span>';

		/*
		$e = new \Exception();
		$trace = $e->getTraceAsString();
		error_log( print_r( [
			'method' => __METHOD__,
			'title' => $title,
			'instance' => $instance,
			'id_base' => $id_base,
			//'backtrace' => $trace,
		], true ) );
		*/

		// --<
		return $title;

	}



}



