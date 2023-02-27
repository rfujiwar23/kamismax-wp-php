<div class="new-video-list">
        <h2>新着動画</h2>
        <h4>最新8件</h4>
        <?php
        $args = array(
            'post_type' => 'video_list',
            'posts_per_page' => '8',
        );
        $release_query = new WP_Query($args);
        ?>
        <div id="carousel" class="owl-carousel owl-theme">
            <?php if ($release_query->have_posts()) : ?>
                <?php while ($release_query->have_posts()) : $release_query->the_post(); ?>
                    
                    
                    <div class="video">
                        
                        <div class="about">
                            <img src="<?php the_field('thumbnail'); ?>" class="img-fluid" alt="KAMISMAX">
                            <div class="video-overlay">
                                <div class="contents">
                                    
                                    <p><?php the_title(); ?></p>
                                    <a href="<?php the_field('videoLink'); ?>">
                                        動画を視聴する
                                    </a>
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                    
                    
                <?php endwhile; ?>

                
                
            <?php endif;
            wp_reset_postdata(); ?>
            
            
        </div>
        
        
        
        

    </div>