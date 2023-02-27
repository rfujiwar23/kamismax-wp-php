<?php
    $args = array(
        'post_type' => 'video_list',
    );
    $release_query = new WP_Query($args);
    ?>
    <div class="full-video-list">
        <h2>動画一覧</h2>
        <div class="full-video-list">
            <?php if ($release_query->have_posts()) : ?>
                <ul class="video">
                    <?php while ($release_query->have_posts()) : $release_query->the_post(); ?>
                        <li>
                            <div class="about">
                                <a href="<?php the_field('videoLink'); ?>" alt="<?php the_title(); ?>">
                                    <img src="<?php the_field('thumbnail'); ?>" class="img-fluid" alt="KAMISMAX">
                                </a>
                                <p><?php the_title(); ?></p>
                            </div>
                        </li>
                    <?php endwhile; ?>
                </ul>
            <?php endif;
            wp_reset_postdata(); ?>
        </div>
    </div>