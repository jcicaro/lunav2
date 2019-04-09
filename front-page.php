<?php get_header(); ?>



    <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
    <div class="jumbotron-container" <?php echo (new Luna_Util())->fetch_post_background_image_style(); ?> >
        <div class="jumbotron">

            <div class="row pt-4">

                <div class="col-md-12 pb-3">

                    
                    <h1 class="display-4"><?php the_title(); ?></h1>
                    <div class=""><?php the_content(); ?></div>
                    <div class="">
                        <!-- <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a> -->
                    </div>
                </div>
                
            </div> <!-- .row -->

            
        </div> <!-- .jumbotron -->
    </div> <!-- .jumbotron background -->
    <?php endwhile; ?>
    <?php endif; ?>
    



<div class="row row-cards pt-4">

    <?php 

        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => get_option( 'posts_per_page' ),
            'paged' => $paged
        );

        $custom_query = new WP_Query($args);
        
    ?>

    <?php if($custom_query->have_posts()) : while($custom_query->have_posts()) : $custom_query->the_post(); ?>

        <div class="col-md-6 col-lg-4 pb-3">

            <?php get_template_part('template_parts/archive', 'post'); ?>
            
        </div>

    <?php endwhile; ?>
    <?php endif; ?>
    
    <?php wp_reset_postdata(); ?>

</div>

<!-- pagination -->
<div class="row">

    <div class="col-md-12">
        <button class="btn btn-light btn-sm float-right">
            <div class="nav-next alignright">
                <a href="<?php echo site_url() . '/' . get_the_title(get_option('page_for_posts')) . '/page/2'; ?>"><i class="fa fa-2x fa-arrow-right"></i></a>
            </div>
        </button>
    </div>
    
</div>

<?php get_footer(); ?>