<?php

    require_once(get_template_directory() . '/server_includes/luna_util.php');
    require_once(get_template_directory() . '/server_includes/luna_master_list.php');

    require_once(get_template_directory() . '/server_includes/luna_functions_cb/luna_itsm_lite_cb.php');

    require_once(get_template_directory() . '/admin_utilities/rest_explorer/functions_cb.php');
    require_once(get_template_directory() . '/admin_utilities/options/functions_cb.php');
    require_once(get_template_directory() . '/admin_utilities/luna_utilities_cb.php');

    require_once(get_template_directory() . '/server_includes/luna_functions_cb/customize_style_cb.php');

    

    add_action('wp_enqueue_scripts', 'luna_theme_styles');
    function luna_theme_styles() {
        
        // wp_enqueue_style('font-awesome-css', '//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css', array());
        wp_enqueue_style('font-awesome-css', get_template_directory_uri() . '/client_dependencies/font-awesome-4.7.0/css/font-awesome.min.css', array());

        // wp_enqueue_style('bootstrap-css', '//stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css', array());
        wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/client_dependencies/bootstrap-4.0.0-dist/css/bootstrap.min.css', array());

        wp_enqueue_style('main', get_template_directory_uri() . '/client_public/css/main.css', false, rand(1, 100), 'all');

    }


    add_action('wp_enqueue_scripts', 'luna_theme_scripts');
    function luna_theme_scripts() {

        $show_in_footer = true; // set this to true later, need wp_footer() in footer.php
        
        // wp_enqueue_script('jquery', '//code.jquery.com/jquery-3.3.1.slim.min.js', array(), '1.7.5', $show_in_footer); // WP already has jQuery

        // wp_enqueue_script('popper', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js', array(), '1.14.6', $show_in_footer);
        wp_enqueue_script('popper', get_template_directory_uri() . '/client_dependencies/popper/popper.min.js', array(), '1.14.6', $show_in_footer);

        // wp_enqueue_script('bootstrap-js', '//stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js', array(), '4.2.1', $show_in_footer);
        wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/client_dependencies/bootstrap-4.0.0-dist/js/bootstrap.min.js', array('jquery'), '4.0.0', $show_in_footer);

        // wp_enqueue_script('angular1', '//cdnjs.cloudflare.com/ajax/libs/angular.js/1.7.5/angular.min.js', array(), '1.7.5', $show_in_footer);
        wp_enqueue_script('angular1', get_template_directory_uri() . '/client_dependencies/angular-1.7.7/angular.min.js', array(), '1.7.7', $show_in_footer);


        wp_enqueue_script('script', get_template_directory_uri() . '/client_public/js/main.js', array(), rand(1, 100), $show_in_footer);
        
    }


    // Add nav menu feature
    add_action('after_setup_theme', 'luna_register_nav_menu'); 
    function luna_register_nav_menu() {
        register_nav_menus( array( 
            'header' => 'Header menu', 
            'footer' => 'Footer menu' 
        ) );
    }


    // remove the 32px margin at the top
    add_action('get_header', 'luna_remove_filter_head'); 
    function luna_remove_filter_head() {
        remove_action('wp_head', '_admin_bar_bump_cb');
    }

    // Remove admin bar on the front end
    add_filter('show_admin_bar', '__return_false');

    // enable featured image in posts
    add_theme_support('post-thumbnails');


    // Theme Options; admin_utilities/luna_utilities_cb.php, option/functions_cb.php, rest_explorer/functions_cb.php
    add_action('admin_menu', 'luna_utilities'); 


    // Theme Customization; customize_style_cb.php
    add_action( 'customize_register', 'luna_customize_register' ); 
    add_action( 'wp_head', 'luna_customize_css'); 
    

    // Luna ITSM Lite; luna_itsm_lite_cb.php
    add_action('init', 'lil_task_init');
    add_action('add_meta_boxes', 'lil_meta_box_cb');
    add_action('save_post', 'lil_task_save');
    add_shortcode('list_tasks', 'lil_list_tasks');

    /**
	 * Comment form hidden fields
	 */
	function comment_form_hidden_fields()
	{
		comment_id_fields();
		if ( current_user_can( 'unfiltered_html' ) )
		{
			wp_nonce_field( 'unfiltered-html-comment_' . get_the_ID(), '_wp_unfiltered_html_comment', false );
		}
	}


	add_action('rest_api_init', function() {
		register_rest_field('post', 'display_date', [
			'get_callback' => function() {
				return [
					'day' => get_the_time('j'),
					'month' => get_the_time('M'),
					'year' => get_the_time('Y')
				];
			}
		]);
	});

