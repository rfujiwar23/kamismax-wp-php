<div class="new-video-list" style="background:linear-gradient(rgba(255,255,255,0.7),rgba(255,255,255,0.8)), url(<?php echo get_template_directory_uri(); ?>/img/temp-pic.png);">
        <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-10 offset-1">
        <h1><img src="<?php echo get_template_directory_uri(); ?>/img/kmax-logo@2x.png" alt="KAMISMAX" class="img-fluid"></h1>
        </div>
        <!-- <h2>新着動画</h2> -->
        <!-- <h4>最新8件</h4> -->
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
                                    <a href="<?php echo get_permalink(); ?>">
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