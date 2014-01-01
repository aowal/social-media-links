<?php
/*
Plugin Name: Social Media Links
Plugin URI: 
Description: A easy-to-use,CSS and icon font driven social media links widget.
Author: Pioneerb64,pxlrlab
Author URI: 

Version: 1.0

License: GNU General Public License v2.0 (or later)
License URI: http://www.opensource.org/licenses/gpl-license.php
*/

class Social_Media_Links_Widget extends WP_Widget {

	/**
	 * Default widget values.
	 *
	 * @var array
	 */
	protected $defaults;

	/**
	 * Default widget values.
	 *
	 * @var array
	 */
	protected $sizes;

	/**
	 * Default widget values.
	 *
	 * @var array
	 */
	protected $profiles;

	/**
	 * Constructor method.
	 *
	 * Set some global values and create widget.
	 */
	function __construct() {

		/**
		 * Default widget option values.
		 */
		$this->defaults = array(
			'title'                  => '',
			'new_window'             => 0,
			'size'                   => 14,
			'icon_color'             => '#babdbf',
			'icon_color_hover'       => '#fe0657',
			'link_color_hover'       => '#ffffff',
			'alignment'              => 'alignleft',
			'dribbble'               => '',
			'email'                  => '',
			'facebook'               => '',
			'flickr'                 => '',
			'github'                 => '',
			'gplus'                  => '',
			'instagram'              => '',
			'linkedin'               => '',
			'pinterest'              => '',
			'rss'                    => '',
			'stumbleupon'            => '',
			'tumblr'                 => '',
			'twitter'                => '',
			'vimeo'                  => '',
			'youtube'                => '',
		);



		/**
		 * Social profile choices.
		 */
		$this->profiles = array(
			'support' => array(
				'label'   => __( 'Support URI', 'smlw' ),
				'pattern' => '<li><a href="%s" class="support"><span><i class="fa fa-info-circle"></i></span> Support</a></li>',
			),
			'email' => array(
				'label'   => __( 'Email Us URI', 'smlw' ),
				'pattern' => '<li><a href="%s" class="email"><span><i class="fa fa-envelope"></i></span> Email Us</a></li>',
			),
			'chat' => array(
				'label'   => __( 'Chat With Us URI', 'smlw' ),
				'pattern' => '<li><a href="%s" class="chat"><span><i class="fa fa-comments"></i></span> Chat With Us</a></li>',
			),
			'telephone' => array(
				'label'   => __( 'Telephone URI', 'smlw' ),
				'pattern' => '<li><a href="%s" class="telephone"><span><i class="fa fa-phone"></i></span> +1-888-748-3526</a></li>',
			),
			'login' => array(
				'label'   => __( 'Client Login URI', 'smlw' ),
				'pattern' => '<li><a href="%s" class="login"><span><i class="fa fa-user"></i></span> Client Login</a></li>',
			),
			'dribbble' => array(
				'label'   => __( 'Dribbble URI', 'smlw' ),
				'pattern' => '<li><a href="%s" class="login"><span><i class="fa fa-dribble"></i></span> Dribble</a></li>',
			),
			'facebook' => array(
				'label'   => __( 'Facebook URI', 'smlw' ),
				'pattern' => '<li><a href="%s" class="login"><span><i class="fa fa-facebook"></i></span> Facebook</a></li>',
			),
			'flickr' => array(
				'label'   => __( 'Flickr URI', 'smlw' ),
				'pattern' => '<li><a href="%s" class="social-flickr"><span><i class="fa fa-flickr"></i></span> Flickr</a></li>',
			),
			'github' => array(
				'label'   => __( 'GitHub URI', 'smlw' ),
				'pattern' => '<li><a href="%s" class="social-github"><span><i class="fa fa-github"></i></span> Github</a></li>',
			),
			'gplus' => array(
				'label'   => __( 'Google+ URI', 'smlw' ),
				'pattern' => '<li><a href="%s" class="social-gplus"><span><i class="fa fa-google-plus-square"></i></span> Google Plus</a></li>',
			),
			'instagram' => array(
				'label'   => __( 'Instagram URI', 'smlw' ),
				'pattern' => '<li><a href="%s" class="social-instagram"><span><i class="fa fa-instagram"></i></span> Instagram</a></li>',
			),
			'linkedin' => array(
				'label'   => __( 'Linkedin URI', 'smlw' ),
				'pattern' => '<li><a href="%s" class="social-linkedin"><span><i class="fa fa-linkedin"></i></span> Linkedin</a></li>',
			),
			'pinterest' => array(
				'label'   => __( 'Pinterest URI', 'smlw' ),
				'pattern' => '<li><a href="%s" class="social-pinterest"><span><i class="fa fa-pinterest"></i></span> Pinterest</a></li>',
			),
			'rss' => array(
				'label'   => __( 'RSS URI', 'smlw' ),
				'pattern' => '<li><a href="%s" class="social-rss"><span><i class="fa fa-rss-square"></i></span> RSS Feed</a></li>',
			),
			'tumblr' => array(
				'label'   => __( 'Tumblr URI', 'smlw' ),
				'pattern' => '<li><a href="%s" class="social-tumblr"><span><i class="fa fa-tumblr"></i></span> Tumblr</a></li>',
			),
			'twitter' => array(
				'label'   => __( 'Twitter URI', 'smlw' ),
				'pattern' => '<li><a href="%s" class="social-twitter"><span><i class="fa fa-twitter"></i></span> Twitter</a></li>',
			),
			'vimeo' => array(
				'label'   => __( 'Vimeo URI', 'smlw' ),
				'pattern' => '<li><a href="%s" class="social-vimeo"><span><i class="fa fa-vimeo-square"></i></span> Vimeo</a></li>',
			),
			'youtube' => array(
				'label'   => __( 'YouTube URI', 'smlw' ),
				'pattern' => '<li><a href="%s" class="social-youtube"><span><i class="fa fa-youtube"></i></span> Youtube</a></li>',
			),
		);

		$widget_ops = array(
			'classname'   => 'social-media-links',
			'description' => __( 'Displays select social icons.', 'smlw' ),
		);

		$control_ops = array(
			'id_base' => 'social-media-links',
		);

		$this->WP_Widget( 'social-media-links', __( 'Social Media Links', 'smlw' ), $widget_ops, $control_ops );
		
		add_action( 'wp_enqueue_scripts', array( $this, 'webendev_load_font_awesome' ) );


		// /** Enqueue icon font */
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_css' ) );

		/** Load CSS in <head> */
		add_action( 'wp_head', array( $this, 'css' ) );

	}

	/**
	 * Widget Form.
	 *
	 * Outputs the widget form that allows users to control the output of the widget.
	 *
	 */
	function form( $instance ) {

		/** Merge with defaults */
		$instance = wp_parse_args( (array) $instance, $this->defaults );
		?>

		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" /></p>

		<p><label><input id="<?php echo $this->get_field_id( 'new_window' ); ?>" type="checkbox" name="<?php echo $this->get_field_name( 'new_window' ); ?>" value="1" <?php checked( 1, $instance['new_window'] ); ?>/> <?php esc_html_e( 'Open links in new window?', 'smlw' ); ?></label></p>

		<p><label for="<?php echo $this->get_field_id( 'size' ); ?>"><?php _e( 'Icon Size', 'smlw' ); ?>:</label> <input id="<?php echo $this->get_field_id( 'size' ); ?>" name="<?php echo $this->get_field_name( 'size' ); ?>" type="text" value="<?php echo esc_attr( $instance['size'] ); ?>" size="3" />px</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'alignment' ); ?>"><?php _e( 'Alignment', 'smlw' ); ?>:</label>
			<select id="<?php echo $this->get_field_id( 'alignment' ); ?>" name="<?php echo $this->get_field_name( 'alignment' ); ?>">
				<option value="alignleft" <?php selected( 'alignright', $instance['alignment'] ) ?>><?php _e( 'Align Left', 'smlw' ); ?></option>
				<option value="aligncenter" <?php selected( 'aligncenter', $instance['alignment'] ) ?>><?php _e( 'Align Center', 'smlw' ); ?></option>
				<option value="alignright" <?php selected( 'alignright', $instance['alignment'] ) ?>><?php _e( 'Align Right', 'smlw' ); ?></option>
			</select>
		</p>

		<hr style="background: #ccc; border: 0; height: 1px; margin: 20px 0;" />

		<p><label for="<?php echo $this->get_field_id( 'icon_color' ); ?>"><?php _e( 'Icon Font Color:', 'smlw' ); ?></label> <input id="<?php echo $this->get_field_id( 'icon_color' ); ?>" name="<?php echo $this->get_field_name( 'icon_color' ); ?>" type="text" value="<?php echo esc_attr( $instance['icon_color'] ); ?>" size="6" /></p>

		<p><label for="<?php echo $this->get_field_id( 'icon_color_hover' ); ?>"><?php _e( 'Icon Font Hover Color:', 'smlw' ); ?></label> <input id="<?php echo $this->get_field_id( 'icon_color_hover' ); ?>" name="<?php echo $this->get_field_name( 'icon_color_hover' ); ?>" type="text" value="<?php echo esc_attr( $instance['icon_color_hover'] ); ?>" size="6" /></p>

		<p><label for="<?php echo $this->get_field_id( 'link_color_hover' ); ?>"><?php _e( 'Link Hover Color:', 'smlw' ); ?></label> <input id="<?php echo $this->get_field_id( 'link_color_hover' ); ?>" name="<?php echo $this->get_field_name( 'link_color_hover' ); ?>" type="text" value="<?php echo esc_attr( $instance['link_color_hover'] ); ?>" size="6" /></p>

		<hr style="background: #ccc; border: 0; height: 1px; margin: 20px 0;" />

		<?php
		foreach ( (array) $this->profiles as $profile => $data ) {

			printf( '<p><label for="%s">%s:</label></p>', esc_attr( $this->get_field_id( $profile ) ), esc_attr( $data['label'] ) );
			printf( '<p><input type="text" id="%s" name="%s" value="%s" class="widefat" />', esc_attr( $this->get_field_id( $profile ) ), esc_attr( $this->get_field_name( $profile ) ), esc_url( $instance[$profile] ) );
			printf( '</p>' );

		}

	}

	/**
	 * Form validation and sanitization.
	 *
	 * Runs when you save the widget form. Allows you to validate or sanitize widget options before they are saved.
	 *
	 */
	function update( $newinstance, $oldinstance ) {

		foreach ( $newinstance as $key => $value ) {

			/** Border radius and Icon size must not be empty, must be a digit */
			if (('size' == $key ) && ( '' == $value || ! ctype_digit( $value ) ) ) {
				$newinstance[$key] = 0;
			}

			/** Validate hex code colors */
			elseif ( strpos( $key, '_color' ) && 0 == preg_match( '/^#(([a-fA-F0-9]{3}$)|([a-fA-F0-9]{6}$))/', $value ) ) {
				$newinstance[$key] = $oldinstance[$key];
			}

			/** Sanitize Profile URIs */
			elseif ( array_key_exists( $key, (array) $this->profiles ) ) {
				$newinstance[$key] = esc_url( $newinstance[$key] );
			}

		}

		return $newinstance;

	}

	/**
	 * Widget Output.
	 *
	 * Outputs the actual widget on the front-end based on the widget options the user selected.
	 *
	 */
	function widget( $args, $instance ) {

		extract( $args );

		/** Merge with defaults */
		$instance = wp_parse_args( (array) $instance, $this->defaults );

		echo $before_widget;

			if ( ! empty( $instance['title'] ) )
				echo $before_title . apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base ) . $after_title;

			$output = '';

			$new_window = $instance['new_window'] ? 'target="_blank"' : '';

			$profiles = (array) $this->profiles;

			foreach ( $profiles as $profile => $data ) {

				if ( empty( $instance[ $profile ] ) )
					continue;

				if ( is_email( $instance[ $profile ] ) )
					$output .= sprintf( $data['pattern'], 'mailto:' . esc_attr( $instance[$profile] ), $new_window );
				else
					$output .= sprintf( $data['pattern'], esc_url( $instance[$profile] ), $new_window );

			}

			if ( $output )
				printf( '<ul class="%s">%s</ul>', $instance['alignment'], $output );

		echo $after_widget;

	}

	/**
	* Enqueue Font Awesome Stylesheet from MaxCDN
	*
	*/
	function webendev_load_font_awesome() {
		if ( ! is_admin() ) {
	 
			wp_enqueue_style( 'font-awesome', '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css', null, '4.0.3' );
	 
		}
	 
	}


	function enqueue_css() {
		wp_enqueue_style( 'social-media-links-font', plugin_dir_url( __FILE__ ) . 'css/style.css', array(), '1.0' );
	}

	/**
	 * Custom CSS.
	 *
	 * Outputs custom CSS to control the look of the icons.
	 */
	function css() {

		/** Pull widget settings, merge with defaults */
		$all_instances = $this->get_settings();
		$instance = wp_parse_args( $all_instances[$this->number], $this->defaults );



		/** The CSS to output */
		$css = '
		.social-media-links ul li a,
		.social-media-links ul li a:hover {
			color: ' . $instance['icon_color'] . ' !important;
			font-size: ' . $instance['size'] . 'px;
		}

		.social-media-links ul li a:hover{
			color: ' . $instance['link_color_hover'] . ' !important;
		}

		.social-media-links ul li a:hover span {
			color: ' . $instance['icon_color_hover'] . ' !important;
		}';

		/** Minify a bit */
		$css = str_replace( "\t", '', $css );
		$css = str_replace( array( "\n", "\r" ), ' ', $css );

		/** Echo the CSS */
		echo '<style type="text/css" media="screen">' . $css . '</style>';

	}

}

add_action( 'widgets_init', 'smlw_load_widget' );
/**
 * Widget Registration.
 *
 * Register Social Media Links widget.
 *
 */
function smlw_load_widget() {

	register_widget( 'Social_Media_Links_Widget' );

}