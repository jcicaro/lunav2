<?php get_header(); ?>

<div class="row row-cards pt-4">

    <?php if(have_posts()) : while(have_posts()) : the_post(); ?>

        <div class="col-md-12 pb-3">

            <?php get_template_part('template_parts/content', 'post'); ?>
            
        </div>

    <?php endwhile; ?>
    <?php endif; ?>

</div>

<?php get_footer(); ?>