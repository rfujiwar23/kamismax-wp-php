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
                            <div class="video-overlay">
                                <p><?php the_title(); ?></p>
                            </div>
                            
                        </div>

                    </div>
                <?php endwhile; ?>
            <?php endif;
            wp_reset_postdata(); ?>
        </div>
        <section class="ticker col-lg-10 offset-lg-1 col-md-10 offset-md-1">
            <?php if ($release_query->have_posts()) : ?>
                <div>
                    <span>Latest News</span>
                    <div class="stylist-of-the-month row">
                        <?php while ($release_query->have_posts()) : $release_query->the_post(); ?>

                        <li><a href="#">
                        <?php the_field('video_about'); ?>
                        </a></li>
                        <?php endwhile; ?>
                    </div>
                </div>
            <?php endif;
            wp_reset_postdata(); ?>
        </section>
        <section class="news col-lg-10 offset-lg-1 col-md-10 offset-md-1">
            <?php if ($release_query->have_posts()) : ?>
                <div>
                    <h2 class="text-center">今月の注目の美容師たち！</h2>
                    <div class="stylist-of-the-month row">
                        <?php while ($release_query->have_posts()) : $release_query->the_post(); ?>

                        <!-- <li><a href="#">
                        <?php the_field('video_about'); ?>
                        </a></li> -->
                            <?php
                            $featured_stylists = get_field('stylist');
                            if ($featured_stylists) : ?>
                            
                                <?php foreach ($featured_stylists as $featured_stylist) :
                                    $permalink = get_permalink($featured_stylist->ID);
                                    $title = get_the_title($featured_stylist->ID);
                                    $lastName = get_field('lastName', $featured_stylist->ID);
                                    $firstName = get_field('firstName', $featured_stylist->ID);
                                    $instagram = get_field('instagram_account', $featured_stylist->ID);
                                    $stylist_photo = get_field('profileImage', $featured_stylist->ID);
                                ?>
                                    <div class="col-6 my-4 px-0">
                                        <div class="featured-stylist">
                                            <div class="row row-flex mx-0">
                                                <div class="col-lg-4 px-0 image">
                                                <img src="<?php echo esc_html($stylist_photo); ?>" alt="<?php echo esc_html($lastName); ?>" class="img-fluid">
                                                
                                                </div>
                                                <div class="col-lg-8 px-0 d-flex justify-contents-center align-items-center info">
                                                <div class="contents">
                                                <h4><span><?php echo esc_html($lastName); ?> <?php echo esc_html($firstName); ?></span></h4>
                                                <p class="mb-0"><?php the_field('video_about'); ?></p>
                                                </div>
                                                <a href="<?php echo esc_html($instagram); ?>"><i class="lab la-instagram"></i></a>
                                                </div>
                                            </div>  
                                        </div>
                                    </div>
                                <?php endforeach; ?>

                            <?php endif; ?>




                        <?php endwhile; ?>
                                </div>







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












<?php get_footer(); ?>