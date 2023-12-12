<?php

class BoomDevs_CPT {
    public function __construct() {
        add_action( 'init', [$this, 'plugin_checker_custom_post'], 0 );
        // add_action( 'init', [$this, 'boomdevs_demo_register_taxonomy'], 0 );
        $this->demo_metabox();
        $this->demo_product_metabox();
        // $this->select_product_metabox();
    }

    // Register Custom Post Type
    public function plugin_checker_custom_post() {

        $labels = array(
            'name'                  => _x( 'Demos', 'Post Type General Name', 'boomdevs' ),
            'singular_name'         => _x( 'Demo', 'Post Type Singular Name', 'boomdevs' ),
            'menu_name'             => __( 'Demo', 'boomdevs' ),
            'name_admin_bar'        => __( 'Demo', 'boomdevs' ),
            'archives'              => __( 'Demo Archives', 'boomdevs' ),
            'attributes'            => __( 'Demo Attributes', 'boomdevs' ),
            'parent_item_colon'     => __( 'Parent demo:', 'boomdevs' ),
            'all_items'             => __( 'All Demos', 'boomdevs' ),
            'add_new_item'          => __( 'Add New demo', 'boomdevs' ),
            'add_new'               => __( 'Add New', 'boomdevs' ),
            'new_item'              => __( 'New demo', 'boomdevs' ),
            'edit_item'             => __( 'Edit demo', 'boomdevs' ),
            'update_item'           => __( 'Update demo', 'boomdevs' ),
            'view_item'             => __( 'View demo', 'boomdevs' ),
            'view_items'            => __( 'View Demos', 'boomdevs' ),
            'search_items'          => __( 'Search demo', 'boomdevs' ),
            'not_found'             => __( 'Demo not found', 'boomdevs' ),
            'not_found_in_trash'    => __( 'Demo not found in Trash', 'boomdevs' ),
            'featured_image'        => __( 'Featured Image', 'boomdevs' ),
            'set_featured_image'    => __( 'Set featured image', 'boomdevs' ),
            'remove_featured_image' => __( 'Remove featured image', 'boomdevs' ),
            'use_featured_image'    => __( 'Use as featured image', 'boomdevs' ),
            'insert_into_item'      => __( 'Insert into demo', 'boomdevs' ),
            'uploaded_to_this_item' => __( 'Uploaded demo to this item', 'boomdevs' ),
            'items_list'            => __( 'Demos list', 'boomdevs' ),
            'items_list_navigation' => __( 'Demo list navigation', 'boomdevs' ),
            'filter_items_list'     => __( 'Filter demo list', 'boomdevs' ),
        );
        $args = array(
            'label'               => __( 'Demo', 'boomdevs' ),
            'labels'              => $labels,
            'supports'            => array( 'title' ),
            'hierarchical'        => false,
            'public'              => false,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'menu_position'       => 5,
            'menu_icon'           => 'dashicons-editor-insertmore',
            'show_in_admin_bar'   => true,
            'show_in_nav_menus'   => true,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'page',
            'show_in_rest'        => false,
        );
        register_post_type( 'boomdevs-demos', $args );

    }

    // public function boomdevs_demo_register_taxonomy() {
    //     register_taxonomy(
    //         'boomdevs-demos-categories',
    //         'boomdevs-demos',
    //         array(
    //             'hierarchical' => true,
    //             'label'        => 'Categories',
    //             'query_var'    => true,
    //             'rewrite'      => array(
    //                 'slug'       => 'themes',
    //                 'with_front' => false,
    //             ),
    //         )
    //     );
    // }

    public function demo_metabox() {

        if ( class_exists( 'CSF' ) ) {

            $prefix = 'demo_jsons';

            CSF::createMetabox( $prefix, array(
                'title'     => 'Upload demo jsons',
                'post_type' => 'boomdevs-demos',
            ) );

            CSF::createSection( $prefix, array(
                'fields' => array(
                    array(
                        'id'       => 'jsons',
                        'type'     => 'code_editor',
                        'title'    => 'JSON data',
                        'sanitize' => false,
                        'tabSize'  => 4,
                        'mode'     => 'js',
                    ),
                ),

            ) );
        }

    }

    public function demo_product_metabox() {

        if ( class_exists( 'CSF' ) ) {

            $prefix = 'demo_product';

            CSF::createMetabox( $prefix, array(
                'title'     => 'Select product',
                'post_type' => 'boomdevs-demos',
            ) );

            CSF::createSection( $prefix, array(
                'fields' => array(
                    array(
                        'id'             => 'product',
                        'type'           => 'select',
                        'title'          => esc_html__( 'Select Product', 'boomdevs-plugin-license-checker' ),
                        'options'     => 'posts',
                        'query_args'  => array(
                            'post_type' => 'product',
                            'post_status' => 'any'
                        ),
                    ),
                ),

            ) );
        }

    }

}

new BoomDevs_CPT();