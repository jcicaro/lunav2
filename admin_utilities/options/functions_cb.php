<?php

    function luna_options() {
        require_once(get_template_directory() . '/admin_utilities/options/options.php');
    }

    function luna_custom_settings() {
        $option_group = 'luna-settings-group';
        $option_name = 'enable_debug';
        register_setting($option_group, $option_name);
        
        $section_id = 'luna-settings-section';
        $section_title = 'Debugging';
        $section_page = 'luna-utilities';
        add_settings_section($section_id, $section_title, 'luna_settings_section', $section_page);

        $field_id = 'luna-enable-debug';
        $field_title = 'Enable Debug';
        add_settings_field($field_id, $field_title, 'luna_settings_field', $section_page, $section_id);
    }
    function luna_settings_section() {
        echo "Debugging options";
    }
    function luna_settings_field() {
        $enableDebug = esc_attr(get_option('enable_debug'));
        ?>

        <input name="enable_debug" type="checkbox" value="true" <?php checked('true', get_option('enable_debug')); ?> />

        <?php
    }