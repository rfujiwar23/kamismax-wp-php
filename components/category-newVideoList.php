<?php
        $args = array(
            'post_type' => 'video_list',
        );
        $release_query = new WP_Query($args);
        ?>
        <div class="full-video-list">
            <?php if ($release_query->have_posts()) : ?>
                <?php while ($release_query->have_posts()) : $release_query->the_post(); ?>
                    <div class="video" >

                        <div class="about">
                            <a href="<?php the_field('videoLink'); ?>" alt="<?php the_title(); ?>">
                                <img src="<?php the_field('thumbnail'); ?>" class="img-fluid" alt="KAMISMAX">
                            </a>
                            <p><?php the_title(); ?></p>
                            <!-- <p class="todays-date">本日：
                                <?php
                                $datetime1 = new DateTime($post->post_date);
                                $datetime2 = new DateTime();
                                $interval = $datetime1->diff($datetime2);
                                echo $datetime1->format('Y-m-d');
                                echo $datetime2->format('Y-m-d');;
                                ?> 
                            </p> -->
                        </div>

                    </div>
                <?php endwhile; ?>
            <?php endif;
            wp_reset_postdata(); ?>
        </div>