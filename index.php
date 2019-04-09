<?php get_header(); ?>

<div class="row row-cards pt-4">

    <?php if(have_posts()) : while(have_posts()) : the_post(); ?>

        <div class="col-md-6 col-lg-4 pb-3">

            <?php get_template_part('template_parts/archive', 'post'); ?>
            
        </div>

    <?php endwhile; ?>
    <?php endif; ?>
    

</div>

<!-- pagination -->
<div class="row">

    <div class="col-md-12">
        <button class="btn btn-light btn-sm">
            <div class="nav-previous alignleft"><?php previous_posts_link('<i class="fa fa-2x fa-arrow-left"></i>'); ?></div>
        </button>
        <button class="btn btn-light btn-sm float-right">
            <div class="nav-next alignright"><?php next_posts_link('<i class="fa fa-2x fa-arrow-right"></i>'); ?></div>
        </button>
    </div>
    
</div>

<?php get_footer(); ?>