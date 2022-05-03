<?php

/**
 * @author Divi Space
 * @copyright 2022
 */

if ( ! defined('ABSPATH') ) {
	die();
}

add_action('wp_enqueue_scripts', 'ds_ct_enqueue_parent');

function ds_ct_enqueue_parent() {
	wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}

add_action('wp_enqueue_scripts', 'ds_ct_loadjs');

function ds_ct_loadjs() {
	wp_enqueue_script('ds-theme-script', get_stylesheet_directory_uri() . '/ds-script.js', array('jquery'));
}

include('login-editor.php');


function partner_banner( $atts )
{
	$atts = shortcode_atts(
  array(
      'view' => 'front',
  ), $atts, 'partner_banner' );

	$the_query = new WP_Query( array(
	    'post_type' => 'partner',
	) );

	$ret .= '<div class="partner-banner">';
	while ( $the_query->have_posts() ) :
	    $the_query->the_post();
	    $ret .= '<div class="partner-banner__item">';
				$ret .= '<div class="partner-banner__inner">';
					$ret .= '<img src="'.get_the_post_thumbnail_url().'" />';
				$ret .= '</div>';
	    $ret .= '</div>';
	endwhile;
	$ret .= '</div>';

	return $ret;
}

add_shortcode('partner_banner', 'partner_banner');
