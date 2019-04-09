    <div class="card card-custom bg-white border-white border-0">

        <div class="card-custom-header" <?php echo (new Luna_Util())->fetch_post_background_image_style(); ?> >
            <div class="card-custom-img">
                <h4 class="card-title"><?php the_title() ;?></h4>
            </div>
        </div>
        
        <div class="card-body d-flex flex-column" style="overflow-y: auto">
            <p class="card-text"><?php the_content(); ?></p>
        </div>

    </div>