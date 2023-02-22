<?php

/**
 * Template Name: 下層ページ
 */

get_header(); ?>



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

    <?php if (get_row_layout() == 'list-of-videos') : ?>
        <?php get_template_part('components/category', 'newVideoList'); ?>
    <?php endif; ?>

    

<?php endwhile; ?>

<?php endif; ?>
</div>

<?php get_footer(); ?>