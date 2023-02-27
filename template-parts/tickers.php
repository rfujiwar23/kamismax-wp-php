


<?php
        $args = array(
            'post_type' => 'video_list',
            'posts_per_page' => '8',
        );
        $release_query = new WP_Query($args);
        ?>




<section class="col-lg-10 offset-lg-1 col-md-10 offset-md-1">
        <span>Latest News</span>
            <?php if ($release_query->have_posts()) : ?>
                <div class="ticker">
                    
                    <div class="stylist-of-the-month" id="ticker-roll">
                        <ul>
                        <?php while ($release_query->have_posts()) : $release_query->the_post(); ?>

                            <li><a href="#">
                                    <?php the_field('video_about'); ?>
                                </a></li>
                        <?php endwhile; ?>
                        </ul>
                    </div>
                </div>
            <?php endif;
            wp_reset_postdata(); ?>
        </section>
        

        