<?php

function cptui_register_my_taxes() {

	/**
	 * Taxonomy: Recipe categories.
	 */

	$labels = [
		"name" => __( "Recipe categories", "bootscore" ),
		"singular_name" => __( "Recipe category", "bootscore" ),
		"menu_name" => __( "Recipe categories", "bootscore" ),
		"all_items" => __( "All recipe categories", "bootscore" ),
		"edit_item" => __( "Edit recipe category", "bootscore" ),
		"view_item" => __( "View recipe category", "bootscore" ),
		"update_item" => __( "Update recipe category name", "bootscore" ),
		"add_new_item" => __( "Add new recipe category", "bootscore" ),
		"new_item_name" => __( "New recipe category name", "bootscore" ),
		"parent_item" => __( "Parent recipe category", "bootscore" ),
		"parent_item_colon" => __( "Parent recipe category:", "bootscore" ),
		"search_items" => __( "Search recipe categories", "bootscore" ),
		"popular_items" => __( "Popular recipe categories", "bootscore" ),
		"separate_items_with_commas" => __( "Separate recipe categories with commas", "bootscore" ),
		"add_or_remove_items" => __( "Add or remove recipe categories", "bootscore" ),
		"choose_from_most_used" => __( "Choose from the most used recipe categories", "bootscore" ),
		"not_found" => __( "No recipe categories found", "bootscore" ),
		"no_terms" => __( "No recipe categories", "bootscore" ),
		"items_list_navigation" => __( "recipe categories list navigation", "bootscore" ),
		"items_list" => __( "recipe categories list", "bootscore" ),
		"back_to_items" => __( "Back to recipe categories", "bootscore" ),
	];

	
	$args = [
		"label" => __( "Recipe categories", "bootscore" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'recipe-categories', 'with_front' => true,  'hierarchical' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "bs_recipe_category",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		"show_in_graphql" => false,
		"default_term" => ['name' => 'All'],
	];
	register_taxonomy( "bs_recipe_category", [ "bs_recipe" ], $args );

	/**
	 * Taxonomy: Recipe Tags.
	 */

	$labels = [
		"name" => __( "Recipe Tags", "bootscore" ),
		"singular_name" => __( "Recipe Tag", "bootscore" ),
		"menu_name" => __( "Recipe Tags", "bootscore" ),
		"all_items" => __( "All Recipe Tags", "bootscore" ),
		"edit_item" => __( "Edit Recipe Tag", "bootscore" ),
		"view_item" => __( "View Recipe Tag", "bootscore" ),
		"update_item" => __( "Update Recipe Tag name", "bootscore" ),
		"add_new_item" => __( "Add new Recipe Tag", "bootscore" ),
		"new_item_name" => __( "New Recipe Tag name", "bootscore" ),
		"parent_item" => __( "Parent Recipe Tag", "bootscore" ),
		"parent_item_colon" => __( "Parent Recipe Tag:", "bootscore" ),
		"search_items" => __( "Search Recipe Tags", "bootscore" ),
		"popular_items" => __( "Popular Recipe Tags", "bootscore" ),
		"separate_items_with_commas" => __( "Separate Recipe Tags with commas", "bootscore" ),
		"add_or_remove_items" => __( "Add or remove Recipe Tags", "bootscore" ),
		"choose_from_most_used" => __( "Choose from the most used Recipe Tags", "bootscore" ),
		"not_found" => __( "No Recipe Tags found", "bootscore" ),
		"no_terms" => __( "No Recipe Tags", "bootscore" ),
		"items_list_navigation" => __( "Recipe Tags list navigation", "bootscore" ),
		"items_list" => __( "Recipe Tags list", "bootscore" ),
		"back_to_items" => __( "Back to Recipe Tags", "bootscore" ),
	];

	
	$args = [
		"label" => __( "Recipe Tags", "bootscore" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => false,
		"show_in_nav_menus" => false,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'recipe-tags', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "bs_recipe_tags",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		"show_in_graphql" => false,
		"default_term" => ['name' => 'recipe'],
	];
	register_taxonomy( "bs_recipe_tags", [ "bs_recipe" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes' );
