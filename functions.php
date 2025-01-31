<?php

// Supporter les images à la une
add_theme_support('post-thumbnails');
add_theme_support('menu-thumbnails');
add_theme_support('ad-thumbnails');
set_post_thumbnail_size(600, 600);

add_image_size('intro-image', 1920, 320, true);
add_image_size('menu-list', 330, 330, true);
add_image_size('ad-desktop', 358, 510, true);
add_image_size('ad-mobile', 330, 233, true);


//ENREGISTRER LES MENUS DANS L'INTERFACE WORDPRESS
register_nav_menus( array( 'menu_principal' => 'Menu principal',  'menu_sociaux' => 'Menu réseaux sociaux',
    'menu_langues' => 'Menu langues', ) );
add_action('init', 'enregistrer_menu');


//PERMET D'AJOUTER DES FICHIERS SVG DANS L'INTERFACE WORDPRESS
function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

//Vérifie si ACFpro est installé
if( function_exists('acf_add_options_page') ) {
//Ajoute une page BATIFOL-theme-options-generales dans l’admin
    acf_add_options_page(array(
        'page_title'   => 'Options générales de mon thème',
        'menu_title'   => 'Options générales',
        'menu_slug'    => 'batifol-theme-options-generales',
        'capability'   => 'edit_posts',
        'redirect'    => false
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Options de la zone Hero',
        'menu_title' => 'Zone Hero',
        'parent_slug' => 'batifol-theme-options-generales',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Options de la section introduction',
        'menu_title' => 'Introduction',
        'parent_slug' => 'batifol-theme-options-generales',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Options du pied de page',
        'menu_title' => 'Pied de page',
        'parent_slug' => 'batifol-theme-options-generales',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Options de la page 404',
        'menu_title' => 'Page 404',
        'parent_slug' => 'batifol-theme-options-generales',
    ));
}

// Register Custom Post Type
function batifol_img_galerie() {

    $labels = array(
        'name'                  => _x( 'Images de galerie', 'Post Type General Name', 'batifol_theme' ),
        'singular_name'         => _x( 'Image de galerie', 'Post Type Singular Name', 'batifol_theme' ),
        'menu_name'             => __( 'Images de galerie', 'batifol_theme' ),
        'name_admin_bar'        => __( 'Post Type', 'batifol_theme' ),
        'archives'              => __( 'Item Archives', 'batifol_theme' ),
        'attributes'            => __( 'Item Attributes', 'batifol_theme' ),
        'parent_item_colon'     => __( 'Parent Item:', 'batifol_theme' ),
        'all_items'             => __( 'Toutes les images de galerie', 'batifol_theme' ),
        'add_new_item'          => __( 'Ajouter une nouvelle image', 'batifol_theme' ),
        'add_new'               => __( 'Ajouter image', 'batifol_theme' ),
        'new_item'              => __( 'Nouvelle image', 'batifol_theme' ),
        'edit_item'             => __( 'Modifier image', 'batifol_theme' ),
        'update_item'           => __( 'MAJ image', 'batifol_theme' ),
        'view_item'             => __( 'View Item', 'batifol_theme' ),
        'view_items'            => __( 'View Items', 'batifol_theme' ),
        'search_items'          => __( 'Search Item', 'batifol_theme' ),
        'not_found'             => __( 'Not found', 'batifol_theme' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'batifol_theme' ),
        'featured_image'        => __( 'Featured Image', 'batifol_theme' ),
        'set_featured_image'    => __( 'Set featured image', 'batifol_theme' ),
        'remove_featured_image' => __( 'Remove featured image', 'batifol_theme' ),
        'use_featured_image'    => __( 'Use as featured image', 'batifol_theme' ),
        'insert_into_item'      => __( 'Insert into item', 'batifol_theme' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'batifol_theme' ),
        'items_list'            => __( 'Items list', 'batifol_theme' ),
        'items_list_navigation' => __( 'Items list navigation', 'batifol_theme' ),
        'filter_items_list'     => __( 'Filter items list', 'batifol_theme' ),
    );
    $args = array(
        'label'                 => __( 'Image de galerie', 'batifol_theme' ),
        'description'           => __( 'Galerie d\'images', 'batifol_theme' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail' ),
        'taxonomies'            => array( 'category', 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-format-gallery',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type( 'batifol_img_galerie', $args );

}
add_action( 'init', 'batifol_img_galerie', 0 );

/// Register Custom Post Type
function batifol_menu() {

    $labels = array(
        'name'                  => _x( 'Menus', 'Post Type General Name', 'batifol_theme' ),
        'singular_name'         => _x( 'Menu', 'Post Type Singular Name', 'batifol_theme' ),
        'menu_name'             => __( 'Menus', 'batifol_theme' ),
        'name_admin_bar'        => __( 'Menus', 'batifol_theme' ),
        'archives'              => __( 'Menu Archives', 'batifol_theme' ),
        'attributes'            => __( 'Menu Attributes', 'batifol_theme' ),
        'parent_item_colon'     => __( 'Parent Menu:', 'batifol_theme' ),
        'all_items'             => __( 'All Items', 'batifol_theme' ),
        'add_new_item'          => __( 'Add New Item', 'batifol_theme' ),
        'add_new'               => __( 'Add Menu', 'batifol_theme' ),
        'new_item'              => __( 'New Menu', 'batifol_theme' ),
        'edit_item'             => __( 'Edit Menu', 'batifol_theme' ),
        'update_item'           => __( 'Update Menu', 'batifol_theme' ),
        'view_item'             => __( 'View Menu', 'batifol_theme' ),
        'view_items'            => __( 'View Menus', 'batifol_theme' ),
        'search_items'          => __( 'Search Menu', 'batifol_theme' ),
        'not_found'             => __( 'Not found', 'batifol_theme' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'batifol_theme' ),
        'featured_image'        => __( 'Featured Image', 'batifol_theme' ),
        'set_featured_image'    => __( 'Set featured image', 'batifol_theme' ),
        'remove_featured_image' => __( 'Remove featured image', 'batifol_theme' ),
        'use_featured_image'    => __( 'Use as featured image', 'batifol_theme' ),
        'insert_into_item'      => __( 'Insert into menu', 'batifol_theme' ),
        'uploaded_to_this_item' => __( 'Uploaded to this menu', 'batifol_theme' ),
        'items_list'            => __( 'Menus list', 'batifol_theme' ),
        'items_list_navigation' => __( 'Menus list navigation', 'batifol_theme' ),
        'filter_items_list'     => __( 'Filter menus list', 'batifol_theme' ),
    );
    $args = array(
        'label'                 => __( 'Menu', 'batifol_theme' ),
        'description'           => __( 'Liste des repas et breuvages proposés aux clients', 'batifol_theme' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'taxonomies'            => array( 'category', 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type( 'post_menu', $args );

}
add_action( 'init', 'batifol_menu', 0 );

/// Register Custom Post Type
function batifol_ad() {

    $labels = array(
        'name'                  => _x( 'Publicités', 'Post Type General Name', 'batifol_theme' ),
        'singular_name'         => _x( 'Publicité', 'Post Type Singular Name', 'batifol_theme' ),
        'menu_name'             => __( 'Publicités', 'batifol_theme' ),
        'name_admin_bar'        => __( 'Publicités', 'batifol_theme' ),
        'archives'              => __( 'Publicité Archives', 'batifol_theme' ),
        'attributes'            => __( 'Publicité Attributes', 'batifol_theme' ),
        'parent_item_colon'     => __( 'Parent Publicité:', 'batifol_theme' ),
        'all_items'             => __( 'All Items', 'batifol_theme' ),
        'add_new_item'          => __( 'Add New Item', 'batifol_theme' ),
        'add_new'               => __( 'Add Publicité', 'batifol_theme' ),
        'new_item'              => __( 'New Publicité', 'batifol_theme' ),
        'edit_item'             => __( 'Edit Publicité', 'batifol_theme' ),
        'update_item'           => __( 'Update Publicité', 'batifol_theme' ),
        'view_item'             => __( 'View Publicité', 'batifol_theme' ),
        'view_items'            => __( 'View Publicités', 'batifol_theme' ),
        'search_items'          => __( 'Search Menu', 'batifol_theme' ),
        'not_found'             => __( 'Not found', 'batifol_theme' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'batifol_theme' ),
        'featured_image'        => __( 'Featured Image', 'batifol_theme' ),
        'set_featured_image'    => __( 'Set featured image', 'batifol_theme' ),
        'remove_featured_image' => __( 'Remove featured image', 'batifol_theme' ),
        'use_featured_image'    => __( 'Use as featured image', 'batifol_theme' ),
        'insert_into_item'      => __( 'Insert into ad', 'batifol_theme' ),
        'uploaded_to_this_item' => __( 'Uploaded to this menu', 'batifol_theme' ),
        'items_list'            => __( 'Publicités list', 'batifol_theme' ),
        'items_list_navigation' => __( 'Publicités list navigation', 'batifol_theme' ),
        'filter_items_list'     => __( 'Filter Publicité list', 'batifol_theme' ),
    );
    $args = array(
        'label'                 => __( 'Publicité', 'batifol_theme' ),
        'description'           => __( 'Liste des repas et breuvages proposés aux clients', 'batifol_theme' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'taxonomies'            => array( 'category', 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type( 'post_ad', $args );

}
add_action( 'init', 'batifol_ad', 0 );


// Register Custom Post Type
function batifol_equipe() {

    $labels = array(
        'name'                  => _x( 'Membres de l\'équipe', 'Post Type General Name', 'batifol_theme' ),
        'singular_name'         => _x( 'Membre de l\'équipe', 'Post Type Singular Name', 'batifol_theme' ),
        'menu_name'             => __( 'Membres de l\'équipe', 'batifol_theme' ),
        'name_admin_bar'        => __( 'Post Type', 'batifol_theme' ),
        'archives'              => __( 'Item Archives', 'batifol_theme' ),
        'attributes'            => __( 'Item Attributes', 'batifol_theme' ),
        'parent_item_colon'     => __( 'Parent Item:', 'batifol_theme' ),
        'all_items'             => __( 'Toutes les images de galerie', 'batifol_theme' ),
        'add_new_item'          => __( 'Ajouter un nouveau membre', 'batifol_theme' ),
        'add_new'               => __( 'Ajouter membre', 'batifol_theme' ),
        'new_item'              => __( 'Nouvelle membre', 'batifol_theme' ),
        'edit_item'             => __( 'Modifier membre', 'batifol_theme' ),
        'update_item'           => __( 'MAJ membre', 'batifol_theme' ),
        'view_item'             => __( 'View Item', 'batifol_theme' ),
        'view_items'            => __( 'View Items', 'batifol_theme' ),
        'search_items'          => __( 'Search Item', 'batifol_theme' ),
        'not_found'             => __( 'Not found', 'batifol_theme' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'batifol_theme' ),
        'featured_image'        => __( 'Featured Membre', 'batifol_theme' ),
        'set_featured_image'    => __( 'Set featured membre', 'batifol_theme' ),
        'remove_featured_image' => __( 'Remove featured membre', 'batifol_theme' ),
        'use_featured_image'    => __( 'Use as featured membre', 'batifol_theme' ),
        'insert_into_item'      => __( 'Insert into item', 'batifol_theme' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'batifol_theme' ),
        'items_list'            => __( 'Items list', 'batifol_theme' ),
        'items_list_navigation' => __( 'Items list navigation', 'batifol_theme' ),
        'filter_items_list'     => __( 'Filter items list', 'batifol_theme' ),
    );
    $args = array(
        'label'                 => __( 'Membre de l\'équipe', 'batifol_theme' ),
        'description'           => __( 'Membre de l\'équipe', 'batifol_theme' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail' ),
        'taxonomies'            => array( 'category', 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-groups',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type( 'batifol_equipe', $args );

}
add_action( 'init', 'batifol_equipe', 0 );

// Register Custom Post Type
function batifol_reservation() {
    $labels = array(
        'name'                  => _x( 'Réservations', 'Post Type General Name', 'batifol_theme' ),
        'singular_name'         => _x( 'Réservation', 'Post Type Singular Name', 'batifol_theme' ),
        'menu_name'             => __( 'Réservations', 'batifol_theme' ),
        'name_admin_bar'        => __( 'Post Type', 'batifol_theme' ),
        'archives'              => __( 'Item Archives', 'batifol_theme' ),
        'attributes'            => __( 'Item Attributes', 'batifol_theme' ),
        'parent_item_colon'     => __( 'Parent Item:', 'batifol_theme' ),
        'all_items'             => __( 'Toutes les images de galerie', 'batifol_theme' ),
        'add_new_item'          => __( 'Ajouter une nouvelle section', 'batifol_theme' ),
        'add_new'               => __( 'Ajouter section', 'batifol_theme' ),
        'new_item'              => __( 'Nouvelle section', 'batifol_theme' ),
        'edit_item'             => __( 'Modifier section', 'batifol_theme' ),
        'update_item'           => __( 'MAJ section', 'batifol_theme' ),
        'view_item'             => __( 'View Item', 'batifol_theme' ),
        'view_items'            => __( 'View Items', 'batifol_theme' ),
        'search_items'          => __( 'Search Item', 'batifol_theme' ),
        'not_found'             => __( 'Not found', 'batifol_theme' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'batifol_theme' ),
        'featured_image'        => __( 'Featured section', 'batifol_theme' ),
        'set_featured_image'    => __( 'Set featured section', 'batifol_theme' ),
        'remove_featured_image' => __( 'Remove featured section', 'batifol_theme' ),
        'use_featured_image'    => __( 'Use as featured section', 'batifol_theme' ),
        'insert_into_item'      => __( 'Insert into item', 'batifol_theme' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'batifol_theme' ),
        'items_list'            => __( 'Items list', 'batifol_theme' ),
        'items_list_navigation' => __( 'Items list section', 'batifol_theme' ),
        'filter_items_list'     => __( 'Filter items list', 'batifol_theme' ),
    );
    $args = array(
        'label'                 => __( 'Réservation', 'batifol_theme' ),
        'description'           => __( 'Réservation', 'batifol_theme' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail' ),
        'taxonomies'            => array( 'category', 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-clock',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type( 'batifol_reservation', $args );

}
add_action( 'init', 'batifol_reservation', 0 );
?>
