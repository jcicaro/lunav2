<?php

    $args = array(
        'posts_per_page' => -1,
        'post_type' => 'task'
    );
    $tasks = get_posts($args); ?>

    <div class="table-responsive">
    <table class="table">
    <tbody>

    <?php foreach($tasks as $index=>$task) { ?>

        <tr>
            <td>
                <a href="<?php the_permalink($task->ID); ?>" >
                    <?php echo $task->ID ?>
                </a>
            </td>
            <td>
                <a href="<?php the_permalink($task->ID); ?>">
                    <?php echo get_the_title($task->ID) ;?>
                </a>
            </td>
            <td>
                <?php echo $task->post_content; ?>
            </td>
            <td></td>
            <td></td>

        </tr>
    <?php } ?>
    
    </tbody>
    </table>
    </div>