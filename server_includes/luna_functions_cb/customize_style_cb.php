<?php

    // customize_register
    function luna_customize_register($wp_customize) {

        $section_name = 'luna_options';
        $theme_name = 'luna';

        $wp_customize->add_section($section_name, array(
            'title' => __('Luna Options', $theme_name),
            'priority' => 30
        ));

        // Primary Color
        $wp_customize->add_setting('color_primary' , array(
            'default' => '#2F3C48',
            'transport' => 'refresh'
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'color_primary', array(
            'label' => __('Primary Color', $theme_name),
            'section' => $section_name,
            'settings' => 'color_primary'
        )));

        // Secondary Color
        $wp_customize->add_setting('color_secondary' , array(
            'default' => '#6F7F8C',
            'transport' => 'refresh'
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'color_secondary', array(
            'label' => __('Secondary Color', $theme_name),
            'section' => $section_name,
            'settings' => 'color_secondary'
        )));

        // Success Color
        $wp_customize->add_setting('color_success' , array(
            'default' => '#3E4D59',
            'transport' => 'refresh'
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'color_success', array(
            'label' => __('Success Color', $theme_name),
            'section' => $section_name,
            'settings' => 'color_success'
        )));

        // Danger Color
        $wp_customize->add_setting('color_danger' , array(
            'default' => '#CC330D',
            'transport' => 'refresh'
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'color_danger', array(
            'label' => __('Danger Color', $theme_name),
            'section' => $section_name,
            'settings' => 'color_danger'
        )));

        // Info Color
        $wp_customize->add_setting('color_info' , array(
            'default' => '#5C8F94',
            'transport' => 'refresh'
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'color_info', array(
            'label' => __('Info Color', $theme_name),
            'section' => $section_name,
            'settings' => 'color_info'
        )));

        // Warning Color
        $wp_customize->add_setting('color_warning' , array(
            'default' => '#CC9108',
            'transport' => 'refresh'
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'color_warning', array(
            'label' => __('Warning Color', $theme_name),
            'section' => $section_name,
            'settings' => 'color_warning'
        )));

        // Light Color
        $wp_customize->add_setting('color_light' , array(
            'default' => '#ECEEEC',
            'transport' => 'refresh'
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'color_light', array(
            'label' => __('Light Color', $theme_name),
            'section' => $section_name,
            'settings' => 'color_light'
        )));

        // Dark Color
        $wp_customize->add_setting('color_dark' , array(
            'default' => '#1E2B37',
            'transport' => 'refresh'
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'color_dark', array(
            'label' => __('Dark Color', $theme_name),
            'section' => $section_name,
            'settings' => 'color_dark'
        )));

        // Text Color
        $wp_customize->add_setting('color_text' , array(
            'default' => '#212529', // 'rgb(33, 37, 41)',
            'transport' => 'refresh'
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'color_text', array(
            'label' => __('Text Color', $theme_name),
            'section' => $section_name,
            'settings' => 'color_text'
        )));

        
        // Font URL
        $wp_customize->add_setting('font_url',
            array(
                'default' => get_theme_file_uri() . '/fonts/lato-v14-latin-regular.eot', // 'https://fonts.googleapis.com/css?family=Roboto+Mono',
                'transport' => 'refresh'
            )
        ); 
        $wp_customize->add_control('font_url',
            array(
                'label' => __('Font URL'),
                'description' => esc_html__( 'The URL of the font to be used, eg. a Google Font URL' ),
                'section' => $section_name,
                'type' => 'url', // Can be either text, email, url, number, hidden, or date
            )
        );

        // Font Name
        $wp_customize->add_setting('font_name',
            array(
                'default' => 'Lato',
                'transport' => 'refresh'
            )
        );   
        $wp_customize->add_control('font_name',
            array(
                'label' => __('Font Name'),
                'description' => esc_html__( 'The name of the font to be used, eg. Lato' ),
                'section' => $section_name,
                'type' => 'text', // Can be either text, email, url, number, hidden, or date
            )
        );
        

        // Background Image Grayscale Percentage
        $wp_customize->add_setting('bg_grayscale_percent',
            array(
                'default' => '100',
                'transport' => 'refresh'
            )
        );   
        $wp_customize->add_control('bg_grayscale_percent',
            array(
                'label' => __('Background Image Grayscale Percentage'),
                'description' => esc_html__( 'The percent value of the grayscale CSS attribute for the background, ie. 0 to 100' ),
                'section' => $section_name,
                'type' => 'number', // Can be either text, email, url, number, hidden, or date
            )
        );

        // Generic function which will be used to sanitize checkboxes
        // will be used below
        function luna_sanitize_checkbox( $checked ) {
            // Boolean check.
            return ( ( isset( $checked ) && true == $checked ) ? true : false );
        }

        // Show Navbar Brand Logo
        $wp_customize->add_setting( 'show_brand_logo', array(
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'luna_sanitize_checkbox',
            'default' => true
        ));
        $wp_customize->add_control( 'show_brand_logo', array(
            'type' => 'checkbox',
            'section' => $section_name, // Add a default or your own section
            'label' => __( 'Show Navbar Brand Logo' ),
            'description' => __( 'Show the logo on the navbar area.' ),
        ));
        
        // Show Banner Image
        $wp_customize->add_setting( 'show_banner_image', array(
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'luna_sanitize_checkbox',
            'default' => false
        ));
        $wp_customize->add_control( 'show_banner_image', array(
            'type' => 'checkbox',
            'section' => $section_name, // Add a default or your own section
            'label' => __( 'Show Banner Image' ),
            'description' => __( 'Show the banner image at the top of the navbar area.' ),
        ));

        // Banner Image URL
        $wp_customize->add_setting('banner_image_url',
            array(
                // 'default' => site_url() . '/wp-content/uploads/2019/02/wordpress-logo-e1553313728251.gif',
                'default' => get_theme_file_uri() . '/client_public/images/__jumbotron-default.jpg',
                'transport' => 'refresh'
            )
        ); 
        $wp_customize->add_control('banner_image_url',
            array(
                'label' => __('Banner Image URL'),
                'description' => esc_html__( 'The URL of the banner image to show on top of the menu.' ),
                'section' => $section_name,
                'type' => 'url', // Can be either text, email, url, number, hidden, or date
            )
        );
        
        // Show Banner Image
        $wp_customize->add_setting( 'dark_nav_bar', array(
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'luna_sanitize_checkbox',
            'default' => true
        ));
        $wp_customize->add_control( 'dark_nav_bar', array(
            'type' => 'checkbox',
            'section' => $section_name, // Add a default or your own section
            'label' => __( 'Dark Navigation Bar' ),
            'description' => __( 'Use the dark theme for the navigation bar.' ),
        ));

        // Footer
        $wp_customize->add_setting('luna_footer_page',
            array(
                'default' => '',
                'transport' => 'refresh'
            )
        );   
        $wp_customize->add_control('luna_footer_page',
            array(
                'label' => __('Footer Page'),
                'description' => esc_html__( 'The page that will be used as the footer' ),
                'section' => $section_name,
                'type' => 'dropdown-pages', // Can be either text, email, url, number, hidden, or date
            )
        );
    }

    // wp_head
    function luna_customize_css(){
        ?>
            <style type="text/css">

                @import url("<?php echo get_theme_mod('font_url', get_theme_file_uri() . '/fonts/lato-v14-latin-regular.eot'); ?>"); 

                body {
                    font-family: "<?php echo get_theme_mod('font_name', 'Lato'); ?>", monospace, sans-serif; 
                }

                body,
                .nav-next a i, .nav-previous a i,
                footer.footer-simple .footer-icon {
                    color: <?php echo get_theme_mod('color_text', '#212529'); ?> !important;
                }


                .card-custom-header {
                    filter: grayscale(<?php echo get_theme_mod('bg_grayscale_percent', '100'); ?>%);
                }

                #navbarSupportedContent .current-menu-item {
                    background-color: <?php echo get_theme_mod('color_light', '#ECEEEC'); ?> !important;
                    border-color: <?php echo get_theme_mod('color_light', '#ECEEEC'); ?> !important;
                    
                }

                #navbarSupportedContent .current-menu-item a {
                    color: <?php echo get_theme_mod('color_text', 'rgb(33, 37, 41)'); ?> !important;
                }

                .navbar-brand {
                    display: <?php 
                        $display_val = get_theme_mod('show_brand_logo', true) == true ? 'block' : 'none';
                        echo $display_val; 
                    ?>
                }

                .btn-primary,
                .bg-primary { 
                    background-color: <?php echo get_theme_mod('color_primary', '#2F3C48'); ?> !important;
                    border-color: <?php echo get_theme_mod('color_primary', '#2F3C48'); ?> !important;
                }

                .border-primary { 
                    border-color: <?php echo get_theme_mod('color_primary', '#2F3C48'); ?> !important;
                }

                .text-primary {
                    color: <?php echo get_theme_mod('color_primary', '#2F3C48'); ?> !important;
                }

                .btn-secondary,
                .bg-secondary { 
                    background-color: <?php echo get_theme_mod('color_secondary', '#6F7F8C'); ?> !important;
                    border-color: <?php echo get_theme_mod('color_secondary', '#6F7F8C'); ?> !important;
                }

                .border-secondary { 
                    border-color: <?php echo get_theme_mod('color_secondary', '#6F7F8C'); ?> !important;
                }

                .text-secondary {
                    color: <?php echo get_theme_mod('color_secondary', '#6F7F8C'); ?> !important;
                }

                .btn-success,
                .bg-success { 
                    background-color: <?php echo get_theme_mod('color_success', '#3E4D59'); ?> !important;
                    border-color: <?php echo get_theme_mod('color_success', '#3E4D59'); ?> !important;
                }

                .border-success { 
                    border-color: <?php echo get_theme_mod('color_success', '#3E4D59'); ?> !important;
                }

                .text-success {
                    color: <?php echo get_theme_mod('color_success', '#3E4D59'); ?> !important;
                }

                .btn-danger,
                .bg-danger { 
                    background-color: <?php echo get_theme_mod('color_danger', '#CC330D'); ?> !important;
                    border-color: <?php echo get_theme_mod('color_danger', '#CC330D'); ?> !important;
                }

                .border-danger { 
                    border-color: <?php echo get_theme_mod('color_danger', '#CC330D'); ?> !important;
                }

                .text-danger {
                    color: <?php echo get_theme_mod('color_danger', '#CC330D'); ?> !important;
                }

                .btn-info,
                .bg-info { 
                    background-color: <?php echo get_theme_mod('color_info', '#5C8F94'); ?> !important;
                    border-color: <?php echo get_theme_mod('color_info', '#5C8F94'); ?> !important;
                }

                .border-info { 
                    border-color: <?php echo get_theme_mod('color_info', '#5C8F94'); ?> !important;
                }

                .text-info {
                    color: <?php echo get_theme_mod('color_info', '#5C8F94'); ?> !important;
                }

                .btn-warning,
                .bg-warning { 
                    background-color: <?php echo get_theme_mod('color_warning', '#d1d108'); ?> !important;
                    border-color: <?php echo get_theme_mod('color_warning', '#d1d108'); ?> !important;
                }

                .border-warning { 
                    border-color: <?php echo get_theme_mod('color_warning', '#d1d108'); ?> !important;
                }

                .text-warning {
                    color: <?php echo get_theme_mod('color_warning', '#d1d108'); ?> !important;
                }

                .btn-light,
                .bg-light { 
                    background-color: <?php echo get_theme_mod('color_light', '#ECEEEC'); ?> !important;
                    border-color: <?php echo get_theme_mod('color_light', '#ECEEEC'); ?> !important;
                }

                .border-light { 
                    border-color: <?php echo get_theme_mod('color_light', '#ECEEEC'); ?> !important;
                }

                .text-light {
                    color: <?php echo get_theme_mod('color_light', '#ECEEEC'); ?> !important;
                }

                .btn-dark,
                .bg-dark { 
                    background-color: <?php echo get_theme_mod('color_dark', '#1E2B37'); ?> !important;
                    border-color: <?php echo get_theme_mod('color_dark', '#1E2B37'); ?> !important;
                }

                .border-dark { 
                    border-color: <?php echo get_theme_mod('color_dark', '#1E2B37'); ?> !important;
                }

                .text-dark {
                    color: <?php echo get_theme_mod('color_dark', '#1E2B37'); ?> !important;
                }

                
            </style>
        <?php
    }