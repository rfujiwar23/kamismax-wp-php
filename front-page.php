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

            <!-- Free Text Area -->
            <?php if (get_row_layout() == 'sample_youtube_video') : ?>
                <?php get_template_part('components/category', 'sampleVideo'); ?>
            <?php endif; ?>


            <?php if (get_row_layout() == 'list-of-stylists') : ?>
                <?php get_template_part('components/category', 'stylists'); ?>
            <?php endif; ?>

            <?php if (get_row_layout() == 'levels') : ?>
                <?php get_template_part('components/category', 'courseinformation'); ?>
            <?php endif; ?>


            <?php if (get_row_layout() == 'seminarArea') : ?>
                <?php get_template_part('components/category', 'seminarinformation'); ?>
            <?php endif; ?>


            <?php if (get_row_layout() == 'view_environment_block') : ?>
                <?php get_template_part('components/category', 'viewEnvinformation'); ?>
            <?php endif; ?>

        <?php endwhile; ?>

    <?php endif; ?>




    <?php get_template_part('template-parts/new-video-list'); ?>

    <?php get_template_part('template-parts/tickers'); ?>

    <?php get_template_part('template-parts/featured-stylist'); ?>
    <?php get_template_part('template-parts/featured-seminar'); ?>

    <?php get_template_part('template-parts/full-video-list'); ?>

    <div class="container">
    <div class="read-more text-center my-4">
    <?php
        //get the posts
        $args = array(
            // post per page
            'posts_per_page' => 3,
            // order by ID
            'orderby' => 'ID',
            // descending order
            'order' => 'DESC',
        );
        $the_query = new WP_Query($args);
        if ($the_query->have_posts()) :
            while ($the_query->have_posts()) :
                $the_query->the_post();
        ?>
                <div class="news">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                    <h4 class="time">投稿：<?php the_time('Y.m.d') ?></h4>
                    <!-- <p class="category"><span><?php the_category(' '); ?></span></p> -->
                    <p><?php echo mb_substr(get_the_excerpt(), 0, 50) . '...'; ?>
                        <a href="<?php the_permalink(); ?>">もっと読む</a>
                    </p>
                </div>
            <?php endwhile;
        else : ?>
            <p class="text-center">投稿数：0件</p>
        <?php endif;
        wp_reset_postdata(); ?>         
            
        <a class="btn btn-read-more" href="<?php bloginfo('url') ?>/news">記事一覧</a>
    </div>
    </div>











</div>












<?php get_footer(); ?>