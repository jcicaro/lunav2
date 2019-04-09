<?php

    function luna_utilities() {

        $main_menu_slug = 'luna-utilities';
        $capability = 'manage_options';

        add_menu_page('REST Explorer Utility', 'Luna Utilities', $capability, $main_menu_slug, 'luna_options', 'dashicons-hammer', null);

        add_submenu_page($main_menu_slug, 'Luna Theme Options', 'Theme Options', $capability, 'luna-options', 'luna_options');
        add_submenu_page($main_menu_slug, 'REST Explorer Utility', 'REST Explorer', $capability, 'luna-rest-explorer', 'luna_rest_explorer');
        
        
        remove_submenu_page($main_menu_slug, $main_menu_slug);
        add_action('admin_init', 'luna_custom_settings');
    }
    