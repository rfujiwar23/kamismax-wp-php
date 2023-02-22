<?php

/**
 * Template Name: トップページ (TOP)
 */

get_header(); ?>



<?php if (have_rows('top-image-video')) : ?>
    <?php while (have_rows('top-image-video')) : the_row(); ?>
        <?php get_template_part('components/top', 'carousel'); ?>
    <?php endwhile; ?>
<?php endif; ?>






<div class="main-contents-area">
    <?php if (have_rows('content')) : ?>

        <?php while (have_rows('content')) : the_row(); ?>

            <!-- 内部リンク -->
            <?php if (get_row_layout() == 'inner_links') : ?>
                <?php get_template_part('components/top', 'fscategory'); ?>
            <?php endif; ?>



            <!-- Free Text Area -->
            <?php if (get_row_layout() == 'free_text_area') : ?>
                <?php get_template_part('components/category', 'freetext'); ?>
            <?php endif; ?>


            <?php if (get_row_layout() == 'list-of-stylists') : ?>
                <?php get_template_part('components/category', 'stylists'); ?>
            <?php endif; ?>










        <?php endwhile; ?>

    <?php endif; ?>
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
        <section class="news">
            <?php if ($release_query->have_posts()) : ?>
                <div>
                    <span>Latest News</span>
                    <ul class="stylist-of-the-month">
                        <?php while ($release_query->have_posts()) : $release_query->the_post(); ?>

                        <!-- <li><a href="#">
                        <?php the_field('video_about'); ?>
                        </a></li> -->
                            <?php
                            $featured_stylists = get_field('stylist');
                            if ($featured_stylists) : ?>
                                <!-- <ul style="list-style-type: none; padding:0;"> -->
                                <?php foreach ($featured_stylists as $featured_stylist) :
                                    $permalink = get_permalink($featured_stylist->ID);
                                    $title = get_the_title($featured_stylist->ID);
                                    $lastName = get_field('lastName', $featured_stylist->ID);
                                    $firstName = get_field('firstName', $featured_stylist->ID);
                                    $instagram = get_field('instagram_account', $featured_stylist->ID);
                                    $instagram = get_field('instagram_account', $featured_stylist->ID);
                                ?>
                                    <li>
                                        <div class="featured-stylist">
                                            <h4><span><?php echo esc_html($lastName); ?> <?php echo esc_html($firstName); ?></span></h4>
                                            <p class="mb-0"><?php the_field('video_about'); ?></p>
                                            <a href="<?php echo esc_html($instagram); ?>"><i class="lab la-instagram"></i></a>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                                <!-- </ul> -->
                            <?php endif; ?>




                        <?php endwhile; ?>
                    </ul>







                </div>
            <?php endif;
            wp_reset_postdata(); ?>
        </section>
        <section>

        </section>


    </div>





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





</div>

<div class="featured_stylists_of_the_month">
    <?php
    $post_objects = get_field('featured_stylists_of_the_month');
    if ($post_objects) : ?>
        <div class="stylists px-2">
            <ul class="px-0">
                <?php foreach ($post_objects as $post) : ?>
                    <?php setup_postdata($post); ?>
                    <li class="stylist">
                        <div class="stylist-info">
                            <?php the_field('lastName'); ?><?php the_field('firstName'); ?>
                            <a href="<?php the_field('instagram_account') ?>">インスタ</a>
                        </div>
                    </li>
                <?php endforeach; ?>
                <?php wp_reset_postdata(); ?>
            </ul>
        </div><!-- /stylists -->
    <?php endif; ?>
</div>










<?php get_footer(); ?>