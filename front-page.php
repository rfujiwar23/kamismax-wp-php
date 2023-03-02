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

    <?php get_template_part('template-parts/full-video-list'); ?>











</div>












<?php get_footer(); ?>