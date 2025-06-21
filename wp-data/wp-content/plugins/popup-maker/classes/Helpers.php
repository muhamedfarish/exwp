<?php

// Exit if accessed directly

/*******************************************************************************
 * Copyright (c) 2017, WP Popup Maker
 ******************************************************************************/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class PUM_Helpers {

	/**
	 * Sort array by priority value
	 *
	 * @param $a
	 * @param $b
	 *
	 * @return int
	 */
	public static function sort_by_priority( $a, $b ) {
		if ( ! isset( $a['priority'] ) || ! isset( $b['priority'] ) || $a['priority'] === $b['priority'] ) {
			return 0;
		}

		return ( $a['priority'] < $b['priority'] ) ? - 1 : 1;
	}


	/**
	 * Sort nested arrays with various options.
	 *
	 * @param array $array
	 * @param string $type
	 * @param bool $reverse
	 *
	 * @return array
	 */
	public static function sort_array( $array = array(), $type = 'key', $reverse = false ) {
		if ( ! is_array( $array ) ) {
			return $array;
		}

		switch ( $type ) {
			case 'key':
				if ( ! $reverse ) {
					ksort( $array );
				} else {
					krsort( $array );
				}
				break;

			case 'natural':
				natsort( $array );
				break;
		}

		return array_map( array( __CLASS__, 'sort_array_by_key' ), $array, $type, $reverse );
	}

	public static function post_type_selectlist( $post_type, $args = array(), $include_total = false ) {

		$args = wp_parse_args( $args, array(
			'posts_per_page'         => 10,
			'post_type'              => $post_type,
			'post__in'               => null,
			'post__not_in'           => null,
			'post_status'            => null,
			'page'                   => 1,
			// Performance Optimization.
			'no_found_rows'          => ! $include_total ? true : false,
			'update_post_term_cache' => false,
			'update_post_meta_cache' => false,
		) );

		if ( $post_type == 'attachment' ) {
			$args['post_status'] = 'inherit';
		}

		// Query Caching.
		static $queries = array();

		$key = md5( serialize( $args ) );

		if ( ! isset( $queries[ $key ] ) ) {
			$query = new WP_Query( $args );

			$posts = array();
			foreach ( $query->posts as $post ) {
				$posts[ $post->post_title ] = $post->ID;
			}

			$results = array(
				'items'       => $posts,
				'total_count' => $query->found_posts,
			);

			$queries[ $key ] = $results;
		} else {
			$results = $queries[ $key ];
		}

		return ! $include_total ? $results['items'] : $results;
	}

	public static function taxonomy_selectlist( $taxonomies = array(), $args = array(), $include_total = false ) {
		if ( empty ( $taxonomies ) ) {
			$taxonomies = array( 'category' );
		}

		$args = wp_parse_args( $args, array(
			'hide_empty' => false,
			'number'     => 10,
			'search'     => '',
			'include'    => null,
			'offset'     => 0,
			'page'       => null,
		) );

		if ( $args['page'] ) {
			$args['offset'] = ( $args['page'] - 1 ) * $args['number'];
		}

		// Query Caching.
		static $queries = array();

		$key = md5( serialize( $args ) );

		if ( ! isset( $queries[ $key ] ) ) {
			$terms = array();

			foreach ( get_terms( $taxonomies, $args ) as $term ) {
				$terms[ $term->name ] = $term->term_id;
			}

			$total_args = $args;
			unset( $total_args['number'] );
			unset( $total_args['offset'] );

			$results = array(
				'items'       => $terms,
				'total_count' => $include_total ? wp_count_terms( $taxonomies, $total_args ) : null,
			);

			$queries[ $key ] = $results;
		} else {
			$results = $queries[ $key ];
		}

		return ! $include_total ? $results['items'] : $results;
	}

	public static function popup_theme_selectlist() {

		$themes = array();

		foreach ( popmake_get_all_popup_themes() as $theme ) {
			$themes[ $theme->ID ] = $theme->post_title;
		}

		return $themes;

	}

	public static function popup_selectlist() {
		$popup_list = array();

		$popups = PUM_Popups::get_all();

		foreach ( $popups->posts as $popup ) {
			$popup_list[ $popup->ID ] = $popup->post_title;
		}

		return $popup_list;
	}

}
