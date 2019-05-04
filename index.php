<?php
/**
 * Plugin Name:       Tournament
 * Plugin URI:        http://andit.co
 * Description:       This is a plugin for tournament posting
 * Version:           1.0
 * Author:            And IT
 * Author URI:        http://andit.co
 * Text Domain:       tournament
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */


/* Activation */

require_once dirname( __FILE__ ) . '/lib/class-tgm-plugin-activation.php';

function tourn_register_required_plugins() {
	
	$plugins = array(

		array(
			'name'      => 'Fields',
			'slug'      => 'advanced-custom-fields',
			'required'  => true,
		),

	);


	$config = array(
		'id'           => 'tournament',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'parent_slug'  => 'plugins.php',
		'capability'   => 'manage_options',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',

	);

	tgmpa( $plugins, $config );
}

add_action( 'tgmpa_register', 'tourn_register_required_plugins' );

function cptui_register_my_cpts_tournament() {

	/*  Post Type: Tournaments. */

	$labels = array(
		"name" => __( "Tournaments", "twentynineteen" ),
		"singular_name" => __( "Tournament", "twentynineteen" ),
		"menu_name" => __( "Tournaments", "twentynineteen" ),
		"all_items" => __( "All Tournaments", "twentynineteen" ),
		"add_new_item" => __( "Add New Tournament", "twentynineteen" ),
		"edit_item" => __( "Edit Tournament", "twentynineteen" ),
		"new_item" => __( "New Tournament", "twentynineteen" ),
		"view_item" => __( "View Tournament", "twentynineteen" ),
		"view_items" => __( "View Tournaments", "twentynineteen" ),
		"search_items" => __( "Search Tournament", "twentynineteen" ),
		"not_found" => __( "No Tournament Fount", "twentynineteen" ),
		"featured_image" => __( "Tournament Cover Image", "twentynineteen" ),
		"set_featured_image" => __( "Set Tournament Cover Image", "twentynineteen" ),
		"remove_featured_image" => __( "Remove Tournament Cover Image", "twentynineteen" ),
		"use_featured_image" => __( "Use as Tournament Cover Image", "twentynineteen" ),
		"archives" => __( "Tournament Archive", "twentynineteen" ),
		"insert_into_item" => __( "Insert Into Tournament", "twentynineteen" ),
	);

	$args = array(
		"label" => __( "Tournaments", "twentynineteen" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"rewrite" => array( "slug" => "tournament", "with_front" => true ),
		"query_var" => true,
		"menu_icon" => "dashicons-megaphone",
		"supports" => array( "title", "thumbnail" ),
	);

	register_post_type( "tournament", $args );
}

add_action( 'init', 'cptui_register_my_cpts_tournament' );


function cptui_register_my_taxes_tournament_category() {

	/* Taxonomy: Tournament Categories. */

	$labels = array(
		"name" => __( "Tournament Categories", "twentynineteen" ),
		"singular_name" => __( "Tournament Categorie", "twentynineteen" ),
	);

	$args = array(
		"label" => __( "Tournament Categories", "twentynineteen" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'tournament_category', 'with_front' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "tournament_category",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		);
	register_taxonomy( "tournament_category", array( "tournament" ), $args );
}
add_action( 'init', 'cptui_register_my_taxes_tournament_category' );


/* Custom Field */

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5ccd90f443998',
	'title' => 'Tournament',
	'fields' => array(
		array(
			'key' => 'field_5ccd910233eee',
			'label' => 'Tournament ID',
			'name' => 'tournament_id',
			'type' => 'number',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => 'Tournament ID',
			'prepend' => '',
			'append' => '',
			'min' => '',
			'max' => '',
			'step' => '',
		),
		array(
			'key' => 'field_5ccd91aa33eef',
			'label' => 'Game',
			'name' => 'game',
			'type' => 'text',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => 'Game',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5ccd91c833ef0',
			'label' => 'Team Size',
			'name' => 'team_size',
			'type' => 'text',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => 'Team Size',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5ccd91e833ef1',
			'label' => 'Currently Registered',
			'name' => 'currently_registered',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 0,
			'ui' => 1,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
		array(
			'key' => 'field_5ccd91f933ef2',
			'label' => 'Currently Checked in',
			'name' => 'currently_checked_in',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 0,
			'ui' => 1,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
		array(
			'key' => 'field_5ccd923a33ef3',
			'label' => 'Entry Fee',
			'name' => 'entry_fee',
			'type' => 'number',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => 'Entry Fee',
			'prepend' => '',
			'append' => '',
			'min' => '',
			'max' => '',
			'step' => '',
		),
		array(
			'key' => 'field_5ccd925533ef4',
			'label' => 'Prize Pool',
			'name' => 'prize_pool',
			'type' => 'text',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5ccd927233ef5',
			'label' => 'Mode',
			'name' => 'mode',
			'type' => 'text',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => 'Mode',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5ccd927e33ef6',
			'label' => 'Map',
			'name' => 'map',
			'type' => 'text',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => 'Map',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5ccd929c33ef7',
			'label' => 'Start Time',
			'name' => 'start_time',
			'type' => 'text',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => 'Start Time',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5ccd92d633ef8',
			'label' => 'Check-in time',
			'name' => 'check-in_time',
			'type' => 'text',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => 'Check-in time',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5ccd92f133ef9',
			'label' => 'Information about the tournamen',
			'name' => 'information_about_the_tournamen',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'tabs' => 'visual',
			'toolbar' => 'full',
			'media_upload' => 1,
			'delay' => 0,
		),
		array(
			'key' => 'field_5ccd931033efa',
			'label' => 'Rules for the tournament',
			'name' => 'rules_for_the_tournament',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'tabs' => 'all',
			'toolbar' => 'full',
			'media_upload' => 1,
			'delay' => 0,
		),
		array(
			'key' => 'field_5ccd931d33efb',
			'label' => 'Participants',
			'name' => 'participants',
			'type' => 'number',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => 'Participants',
			'prepend' => '',
			'append' => '',
			'min' => '',
			'max' => '',
			'step' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'tournament',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

endif;