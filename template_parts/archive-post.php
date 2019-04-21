    <div class="card card-custom card-fixed-height bg-white border-white border-0">
        
        <div class="card-custom-header" <?php echo (new Luna_Util())->fetch_post_background_image_style(); ?> >
            <div class="card-custom-img">
                <a href="<?php the_permalink(); ?>">
                    <h4 class="card-title"><?php the_title() ;?></h4>
                    
                    <span class="date">
                        <span class="month"><?php the_time('M') ?></span>
                        <span class="day"><?php the_time('j') ?></span>
                        <span class="year"><?php the_time('Y') ?></span>
                    </span>
                </a>
            </div>
        </div>
        
        <div class="card-body d-flex flex-column" style="overflow-y: auto">
            <p class="card-text"><?php 

            if (has_excerpt() or strlen( wp_strip_all_tags(get_the_content())) > 400) {
                echo get_the_excerpt();
            }
            else {
                echo get_the_content();
            }
            
            ?></p>
        </div>
        <div class="card-footer" style="background: inherit; border-color: inherit;">
            <a href="<?php the_permalink(); ?>" class="btn btn-primary">More</a>
        </div>
    </div>