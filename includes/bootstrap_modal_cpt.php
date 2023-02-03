<?php
// Register Custom Post Type
function bootstrap_modal_post_type() {

  $labels = array(
    'name'                  => _x( 'Modals', 'Post Type General Name', 'bootstrap_modal' ),
    'singular_name'         => _x( 'Modal', 'Post Type Singular Name', 'bootstrap_modal' ),
    'menu_name'             => __( 'Modals', 'bootstrap_modal' ),
    'name_admin_bar'        => __( 'Modal', 'bootstrap_modal' ),
    'archives'              => __( 'Modal Archive', 'bootstrap_modal' ),
    'attributes'            => __( 'Model Attribute', 'bootstrap_modal' ),
    'parent_item_colon'     => __( 'Modal:', 'bootstrap_modal' ),
    'all_items'             => __( 'All Modals:', 'bootstrap_modal' ),
    'add_new_item'          => __( 'Add New Modal', 'bootstrap_modal' ),
    'add_new'               => __( 'Add New', 'bootstrap_modal' ),
    'new_item'              => __( 'New Modal', 'bootstrap_modal' ),
    'edit_item'             => __( 'Edit Modal', 'bootstrap_modal' ),
    'update_item'           => __( 'Update Modal', 'bootstrap_modal' ),
    'view_item'             => __( 'View Modal', 'bootstrap_modal' ),
    'view_items'            => __( 'View Modals', 'bootstrap_modal' ),
    'search_items'          => __( 'Search Modals', 'bootstrap_modal' ),
    'not_found'             => __( 'Not found', 'bootstrap_modal' ),
    'not_found_in_trash'    => __( 'Not found in Trash', 'bootstrap_modal' ),
    'featured_image'        => __( 'Featured Image', 'bootstrap_modal' ),
    'set_featured_image'    => __( 'Set featured image', 'bootstrap_modal' ),
    'remove_featured_image' => __( 'Remove featured image', 'bootstrap_modal' ),
    'use_featured_image'    => __( 'Use as featured image', 'bootstrap_modal' ),
    'insert_into_item'      => __( 'Insert into item', 'bootstrap_modal' ),
    'uploaded_to_this_item' => __( 'Uploaded to this item', 'bootstrap_modal' ),
    'items_list'            => __( 'Items list', 'bootstrap_modal' ),
    'items_list_navigation' => __( 'Items list navigation', 'bootstrap_modal' ),
    'filter_items_list'     => __( 'Filter items list', 'bootstrap_modal' ),
  );
  $args = array(
    'label'                 => __( 'Modal', 'bootstrap_modal' ),
    'description'           => __( 'Content to be Output in a Modal', 'bootstrap_modal' ),
    'labels'                => $labels,
    'supports'              => array( 'title', 'editor', 'revisions', 'custom-fields', ),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'menu_icon'             => 'dashicons-slides',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => false,
    'exclude_from_search'   => true,
    'publicly_queryable'    => true,
    'capability_type'       => 'page',
    'show_in_rest'          => true,
  );
  register_post_type( 'bootstrap_modal', $args );

}
add_action( 'init', 'bootstrap_modal_post_type', 0 );
