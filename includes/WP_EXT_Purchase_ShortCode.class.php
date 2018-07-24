<?php

/**
 * Class WP_EXT_Purchase_ShortCode
 */
class WP_EXT_Purchase_ShortCode extends WP_EXT_Purchase {

	/**
	 * Constructor.
	 */
	public function __construct() {
		parent::__construct();

		$this->run();
	}

	/**
	 * Plugin: `initialize`.
	 */
	public function run() {
		add_shortcode( $this->archive_ID, [ $this, 'shortcode' ] );
	}

	/**
	 * ShortCode.
	 */
	public function shortcode( $atts, $content = null ) {

		/**
		 * Global variables.
		 */
		global $wp_query;

		/**
		 * Options.
		 */
		$defaults = [
			'type' => '',
		];

		$atts = shortcode_atts( $defaults, $atts, $this->archive_ID );

		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

		$args = [
			'post_type'      => $this->pt_ID,
			'post_status'    => 'publish',
			'posts_per_page' => 6,
			'paged'          => $paged,
			'tax_query'      => [
				[
					'taxonomy' => $this->pt_ID . '_meta',
					'field'    => 'slug',
					'terms'    => 'archive',
					'operator' => 'NOT IN',
				]
			],
		];

		/**
		 * Rendering data.
		 */
		$wp_query = new WP_Query( $args );

		if ( $wp_query->have_posts() ) {
			echo '<table class="wp-ext-' . $this->domain_ID . '">';
			echo '<thead>';
			echo '<tr>';
			echo '<th>' . esc_html__( '#', 'wp-ext-' . $this->domain_ID ) . '</th>';
			echo '<th>' . esc_html__( 'Номер в ЕИС', 'wp-ext-' . $this->domain_ID ) . '</th>';
			echo '<th>' . esc_html__( 'Номер лота', 'wp-ext-' . $this->domain_ID ) . '</th>';
			echo '<th>' . esc_html__( 'Дата', 'wp-ext-' . $this->domain_ID ) . '</th>';
			echo '<th>' . esc_html__( 'Статус', 'wp-ext-' . $this->domain_ID ) . '</th>';
			echo '</tr>';
			echo '</thead>';
			echo '<tbody>';

			while ( $wp_query->have_posts() ) {
				$wp_query->the_post();

				echo '<tr>';
				echo '<td><a href="http://zakupki.gov.ru/epz/order/extendedsearch/results.html?searchString=&amp;morphology=on&amp;openMode=USE_DEFAULT_PARAMS&amp;fz223=on&amp;orderNumber=' . sanitize_text_field( get_the_title() ) . '&amp;placingWaysList=&amp;placingWaysList223" target="_blank"><i class="fas fa-briefcase fa-fw"></i></a></td>';
				echo '<td><a href="' . esc_url( get_permalink() ) . '">' . get_the_title() . '</a></td>';
				echo '<td>' . get_field( $this->pt_ID . '_lot_id' ) . '</td>';
				echo '<td>' . get_the_date() . '</td>';
				echo '<td>' . get_field( $this->pt_ID . '_status' ) . '</td>';
				echo '</tr>';
			}

			echo '</tbody>';
			echo '</table>';

			do_action( 'genesis_after_endwhile' );
		}

		/**
		 * Reset query.
		 */
		wp_reset_query();
	}
}

/**
 * Helper function to retrieve the static object without using globals.
 *
 * @return WP_EXT_Purchase_ShortCode
 */
function WP_EXT_Purchase_ShortCode() {
	static $object;

	if ( null == $object ) {
		$object = new WP_EXT_Purchase_ShortCode;
	}

	return $object;
}

/**
 * Initialize the object on `plugins_loaded`.
 */
add_action( 'plugins_loaded', [ WP_EXT_Purchase_ShortCode(), 'run' ] );
