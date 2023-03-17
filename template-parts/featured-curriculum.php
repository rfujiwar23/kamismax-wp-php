<?php
$args = array(
    'post_type' => 'course',
);
$release_query = new WP_Query($args);
?>
<div class="">
    <h2>コース一覧</h2>

    <?php if ($release_query->have_posts()) : ?>
        <div class="seminar-list">
            <?php while ($release_query->have_posts()) : $release_query->the_post(); ?>

                <div class="seminar color">
                    
                    <div class="seminar-contents">
                    <?php the_title(); ?>
                        
                    </div>
                </div>

            <?php endwhile; ?>
        </div>
    <?php endif;
    wp_reset_postdata(); ?>

</div>