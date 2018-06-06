<?php if ( ! defined( 'ABSPATH' ) ) {
    die( 'Direct access forbidden.' );
}

class Widget_FW_Instagram extends WP_Widget {

	function __construct() {
		$widget_ops = array( 'description' => esc_html__( 'Instagram widget', 'alone' ) );
		parent::__construct( false, esc_html__( 'Instagram - BT', 'alone' ), $widget_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );
		$params = array();

		foreach ( $instance as $key => $value ) {
			$params[ $key ] = $value;
		}

		$title = $before_title . $params['title'] . $after_title;
		unset( $params['title'] );

		$filepath = get_template_directory() . '/theme-includes/widgets/fw-instagram/views/widget.php';

		$data = array(
			'instance'      => $params,
			'title'         => $title,
			'before_widget' => str_replace( 'class="widget ', 'class="widget fw-widget-instagram ', $before_widget ),
			'after_widget'  => $after_widget,
		);

		echo fw_render_view( $filepath, $data );
	}

	function update( $new_instance, $old_instance ) {
		return $new_instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array(
			'title'         => '',
			'user'          => '',
			'number'        => '',
			'follow_button' => '',
		) );
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'alone' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'user' ) ); ?>"><?php esc_html_e( 'Username:', 'alone' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'user' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'user' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['user'] ); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of images:', 'alone' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['number'] ); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'follow_button' ) ); ?>"><?php esc_html_e( 'Follow button title:', 'alone' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'follow_button' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'follow_button' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['follow_button'] ); ?>"/>
		</p>
	<?php
	}
}