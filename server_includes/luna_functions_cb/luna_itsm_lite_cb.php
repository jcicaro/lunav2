<?php

    
    function lil_task_init() {
        register_post_type('task', array(
            'labels' => array(
                'name' => __('Tasks'),
                'singular_name' => __('Task'),
                'add_new' => __('Create Task'),
                'add_new_item' => __('Create New Task'),
                'edit_item' => __('Edit Task'),
                'search_items' => __('Search Tasks')
            ),
            'menu_position' => 5,
            'public' => true,
            'has_archive' => false,
            'register_meta_box_cb' => 'lil_meta_box_cb',
            'supports' => array('title', 'editor', 'thumbnail', 'comments')
        ));
    }

    
    function lil_meta_box_cb() {
        add_meta_box('lil_meta_box_custom', 'ITSM Custom Fields', 'lil_meta_box_display', 'task', 'normal', 'high');
    }
    function lil_meta_box_display() {
        global $post;
        $task_state = get_post_meta($post->ID, 'task_state', true);
        $task_priority = get_post_meta($post->ID, 'task_priority', true);
        ?>

        <input type="text" name="task_state" placeholder="Task State" value="<?php echo $task_state; ?>">
        <input type="text" name="task_priority" placeholder="Task Priority" value="<?php echo $task_priority; ?>">

        <?php
    }  

    
    function lil_task_save($post_id) {
        $is_autosave = wp_is_post_autosave($post_id);
        $is_revision = wp_is_post_revision($post_id);

        if ($is_autosave || $is_revision) {
            return;
        }

        $post = get_post($post_id);
        if ($post->post_type == 'task') {
            if (array_key_exists('task_state', $_POST)) {
                update_post_meta($post_id, 'task_state', $_POST['task_state']);
            }
            if (array_key_exists('task_priority', $_POST)) {
                update_post_meta($post_id, 'task_priority', $_POST['task_priority']);
            }
        }
    }

    
    function lil_list_tasks() {

        get_template_part('template_parts/archive', 'task');

    }
