<?php
function cptui_register_my_cpts() {

/**
 * Post Type: Recipes.
 */

$labels = [
    "name" => __( "Recipes", "bootscore" ),
    "singular_name" => __( "Recipe", "bootscore" ),
    "menu_name" => __( "My Recipes", "bootscore" ),
    "all_items" => __( "All Recipes", "bootscore" ),
    "add_new" => __( "Add new", "bootscore" ),
    "add_new_item" => __( "Add new Recipe", "bootscore" ),
    "edit_item" => __( "Edit Recipe", "bootscore" ),
    "new_item" => __( "New Recipe", "bootscore" ),
    "view_item" => __( "View Recipe", "bootscore" ),
    "view_items" => __( "View Recipes", "bootscore" ),
    "search_items" => __( "Search Recipes", "bootscore" ),
    "not_found" => __( "No Recipes found", "bootscore" ),
    "not_found_in_trash" => __( "No Recipes found in trash", "bootscore" ),
    "parent" => __( "Parent Recipe:", "bootscore" ),
    "featured_image" => __( "Featured image for this Recipe", "bootscore" ),
    "set_featured_image" => __( "Set featured image for this Recipe", "bootscore" ),
    "remove_featured_image" => __( "Remove featured image for this Recipe", "bootscore" ),
    "use_featured_image" => __( "Use as featured image for this Recipe", "bootscore" ),
    "archives" => __( "Recipe archives", "bootscore" ),
    "insert_into_item" => __( "Insert into Recipe", "bootscore" ),
    "uploaded_to_this_item" => __( "Upload to this Recipe", "bootscore" ),
    "filter_items_list" => __( "Filter Recipes list", "bootscore" ),
    "items_list_navigation" => __( "Recipes list navigation", "bootscore" ),
    "items_list" => __( "Recipes list", "bootscore" ),
    "attributes" => __( "Recipes attributes", "bootscore" ),
    "name_admin_bar" => __( "Recipe", "bootscore" ),
    "item_published" => __( "Recipe published", "bootscore" ),
    "item_published_privately" => __( "Recipe published privately.", "bootscore" ),
    "item_reverted_to_draft" => __( "Recipe reverted to draft.", "bootscore" ),
    "item_scheduled" => __( "Recipe scheduled", "bootscore" ),
    "item_updated" => __( "Recipe updated.", "bootscore" ),
    "parent_item_colon" => __( "Parent Recipe:", "bootscore" ),
];

$args = [
    "label" => __( "Recipes", "bootscore" ),
    "labels" => $labels,
    "description" => "This custom post types is made for recipes only",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "rewrite" => [ "slug" => "recipe-foods", "with_front" => true ],
    "query_var" => true,
    "menu_icon" => "dashicons-food",
    "supports" => [ "title", "editor", "thumbnail", "excerpt", "custom-fields", "author" ],
    "show_in_graphql" => false,
];

register_post_type( "bs_recipe", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );
