<div class="recommended-videos mt-5">
<?php
$post_objects = get_sub_field('select_videos');
if ($post_objects) : ?>

        <h2 class="text-center">オススメ動画</h2>
    
        <div class="col-lg-8 offset-lg-2">
            
            <div class="video-list">
                <?php foreach ($post_objects as $post) : ?>
                    <?php setup_postdata($post); ?>
                    
                        <div class="video">
                            <div class="thumbnail">
                                <div class="rec-overlay">
                                    <div class="text">
                                    <h4 class="mb-0"><?php the_field('video_about'); ?></h4>
                                <p><a href="<?php echo get_permalink(); ?>">
                                        動画を視聴する
                                    </a></p>
                                    </div>
                                </div>
                                <img src="<?php the_field('thumbnail'); ?>" alt="<?php the_field('stylist'); ?>" class="img-fluid">
                            </div>
                            
                            <!-- <p class="mb-0"><?php the_field('stylist'); ?></p> -->
                        </div>
                    
                <?php endforeach; ?>
                <?php wp_reset_postdata(); ?>
            </div>
            
        </div>
    
<?php endif; ?>
</div>