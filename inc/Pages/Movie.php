<?php


/**
 * @package  AllInOnePlugin
 */

namespace Inc\Pages;

use Inc\Base\BaseController;

class Movie extends BaseController
{

    public function register()
    {
        add_action('init', array($this, 'movie_post_type'));
        add_filter('enter_title_here' , array($this, 'update_movie_title_placeholder'));


    }

    public function movie_post_type(){

        $labels = array(

            'name'                  => _x( 'Movies', 'Post type general name', 'saplugin' ),

            'singular_name'         => _x( 'Movie', 'Post type singular name', 'saplugin' ),

            'menu_name'             => _x( 'Movies', 'Admin Menu text', 'saplugin' ),

            'name_admin_bar'        => _x( 'Movie', 'Add New on Toolbar', 'saplugin' ),

            'add_new'               => __( 'Add New', 'saplugin' ),

            'add_new_item'          => __( 'Add New Movie', 'saplugin' ),

            'new_item'              => __( 'New Movie', 'saplugin' ),

            'edit_item'             => __( 'Edit Movie', 'saplugin' ),

            'view_item'             => __( 'View Movie', 'saplugin' ),

            'all_items'             => __( 'All Movies', 'saplugin' ),

            'search_items'          => __( 'Search Movies', 'saplugin' ),

            'parent_item_colon'     => __( 'Parent Movies:', 'saplugin' ),

            'not_found'             => __( 'No movie found.', 'saplugin' ),

            'not_found_in_trash'    => __( 'No movie found in Trash.', 'saplugin' ),

            'featured_image'        => _x( 'Movie Cover Image', '', 'saplugin' ),

            'set_featured_image'    => _x( 'Set cover image', '', 'saplugin' ),

            'remove_featured_image' => _x( 'Remove cover image', '', 'saplugin' ),

            'use_featured_image'    => _x( 'Use as cover image', '', 'saplugin' ),

            'archives'              => _x( 'Movie archives', '', 'saplugin' ),

            'insert_into_item'      => _x( 'Insert into movie', '', 'saplugin' ),

            'uploaded_to_this_item' => _x( 'Uploaded to this movie', '', 'saplugin' ),

            'filter_items_list'     => _x( 'Filter movies list', '', 'saplugin' ),

            'items_list_navigation' => _x( 'Movies list navigation', '', 'saplugin' ),

            'items_list'            => _x( 'Movies list', '', 'saplugin' ),

        );

        $args = array(

            'labels'             => $labels,

            'public'             => true,

            'publicly_queryable' => true,

            'show_ui'            => true,

            'show_in_menu'       => true,

            'query_var'          => true,

            'rewrite'            => array( 'slug' => 'movie' ),

            'capability_type'    => 'post',

            'has_archive'        => true,

            'hierarchical'       => false,

            'menu_position'      => null,

            'show_in_rest'       => false,   //this thing control the view of add new option(true/false)

            'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),

        );

        register_post_type( 'movie', $args );
    }


    /**
     * Update title placeholder
     */

    public function update_movie_title_placeholder() {
        $screen = get_current_screen();
        if( 'movie' === $screen->post_type ) {
            $title = 'Add movie name';
        }

        return $title;
    }

}


