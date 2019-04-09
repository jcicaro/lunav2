<?php get_header(); ?>

<?php   
    $post_id = get_the_ID();
    if(isset($_POST['task_submit'])){ //check if form was submitted

        if (array_key_exists('task_state', $_POST)) {
            update_post_meta($post_id, 'task_state', $_POST['task_state']);
        }
        if (array_key_exists('task_priority', $_POST)) {
            update_post_meta($post_id, 'task_priority', $_POST['task_priority']);
        }

        $post = array(
            'ID'             => esc_sql($post_id),
            'post_content'   => apply_filters('the_content', $_POST['task_content']),
            'post_title'     => esc_sql($_POST['task_title'])
        );
        wp_update_post($post);


        $message = "Success! State: " . $_POST['task_state'] . 
            '; Priority: ' . $_POST['task_priority'] .
            '; Title: ' . $_POST['task_title'] .
            '; Content: ' . $_POST['task_content'];


        
    }    

    $task_id = get_post_field('ID', $post_id);
    $task_title = get_the_title($post_id);
    $task_content = get_post_field('post_content', $post_id);
    $task_content = apply_filters('the_content', $task_content);
    $task_state = get_post_meta($post_id, 'task_state');
    $task_priority = get_post_meta($post_id, 'task_priority');

    $wp_editor_settings = array(
        // 'wpautop' => true, // use wpautop?
        'media_buttons' => true, // show insert/upload button(s)
        'textarea_name' => 'task_content', // set the textarea name to something different, square brackets [] can be used here
        // 'textarea_rows' => 5, //get_option('default_post_edit_rows', 5), // rows="..."
        // 'editor_height' => 10, // In pixels, takes precedence and has no default value
        // 'tabindex' => '',
        'editor_css' => '', // intended for extra styles for both visual and HTML editors buttons, needs to include the <style> tags, can use "scoped".
        'editor_class' => '', // add extra class(es) to the editor textarea
        'teeny' => false, // output the minimal editor config used in Press This
        // 'dfw' => false, // replace the default fullscreen with DFW (supported on the front-end in WordPress 3.4)
        // 'tinymce' => true, // load TinyMCE, can be used to pass settings directly to TinyMCE using an array()
        'quicktags' => true // load Quicktags, can be used to pass settings directly to Quicktags using an array()
    );
?>

<div class="row row-cards pt-4">
    <?php // echo json_encode((new Luna_Master_List())->task_states()); ?>
    <?php if(have_posts()) : while(have_posts()) : the_post(); ?>

        <div class="col-md-12 pb-3">

                <div class="card card-custom bg-white border-white border-0">

                    

                        <div class="card-custom-header" <?php echo (new Luna_Util())->fetch_post_background_image_style(); ?> >
                            <div class="card-custom-img">
                                <h4 class="card-title"><?php echo ($task_id . ' - ' . $task_title); ?></h4>
                                
                            </div>
                            
                        </div>
                        
                        <div class="card-body d-flex flex-column" style="overflow-y: auto">

                            <form method="POST" action="" autocomplete="off">
                                
                                
                                <?php 
                                    if (isset($message)) { 
                                        ?>

                                        <div class="alert alert-success" role="alert">
                                        <?php echo $message; ?>
                                        </div>

                                        <?php 
                                    } 
                                    
                                ?>
                            
                                <div class="form-group">
                                    <label for="task_title">Title</label>
                                    <input type="text" class="form-control" id="task_title" name="task_title" value="<?php echo $task_title; ?>">
                                </div>
                                
                                <div class="form-group">
                                    <label for="task_content">Description</label>
                                    <?php wp_editor($task_content, 'task_content'); ?>
                                </div>
                                

                                <div class="form-group">
                                    <label for="task_state">State</label>
                                    <select class="form-control" id="task_state" name="task_state">
                                        <option value="">--</option>
                                        <?php foreach ((new Luna_Master_List())->task_states() as $state) { ?>
                                            <option value="<?php echo $state['key'] ?>"
                                                <?php if($state['key'] == $task_state[0]) { echo 'selected'; } ?>
                                            ><?php echo $state['label'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="task_priority">Priority</label>
                                    <select class="form-control" id="task_priority" name="task_priority">
                                        <option value="">--</option>
                                        <?php foreach ((new Luna_Master_List())->task_priorities() as $priority) { ?>
                                            <option value="<?php echo $priority['key'] ?>"
                                                <?php if($priority['key'] == $task_priority[0]) { echo 'selected'; } ?>
                                            ><?php echo $priority['label'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <button type="submit" name="task_submit" class="btn btn-primary">Update</button>
                                </div>

                            </form>

                            <?php comments_template('', $post_id); ?>

                        </div> <!-- .card-body -->

                    
                    
                </div> <!-- .card -->

        </div>

    <?php endwhile; ?>
    <?php endif; ?>

</div>

<?php get_footer(); ?>