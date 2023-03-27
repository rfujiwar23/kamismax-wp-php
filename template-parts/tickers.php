<?php
$args = array(
    'post_type' => 'video_list',
    'posts_per_page' => '8',
);
$release_query = new WP_Query($args);
?>




<section class="rolling-ticker col-lg-10 offset-lg-1 col-md-10 offset-md-1" style="font-family: 'Caveat', cursive;">
    <h2><span>Latest News</span></h2>
    <?php if ($release_query->have_posts()) : ?>
            <div class="ticker" id="ticker-roll">
                <ul style="list-style-type: none; padding:0;">
                    <?php while ($release_query->have_posts()) : $release_query->the_post(); ?>
                        <li><a href="#">
                        <?php the_time('Y.m.d'); ?>　<?php the_field('video_about'); ?>
                            </a></li>
                    <?php endwhile; ?>
                </ul>
            </div>
    <?php endif;
    wp_reset_postdata(); ?>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
