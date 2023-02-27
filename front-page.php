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



                <?php
                $post_objects = get_sub_field('sample_video');
                if ($post_objects) : ?>
                    
                        <div class="container sample-video">
                        <div class="row row-flex">
                            <?php foreach ($post_objects as $post) : ?>
                                <?php setup_postdata($post); ?>
                                <div class="col-sm-6 col-8 mb-3 mx-auto">
                                    <div class="video-info" style="height: 100%;">
                                        <div class="video">
                                            <iframe src="<?php the_field('videoLink'); ?>" frameborder="0" allowfullscreen=""></iframe>
                                        </div>
                                        <p class="mb-0"><?php the_field('video_about'); ?></p>
                                    </div>
                            </div>
                            <?php endforeach; ?>
                            <?php wp_reset_postdata(); ?>
                        </div>
                        </div>
                    
                <?php endif; ?>




            <?php endif; ?>


            <?php if (get_row_layout() == 'list-of-stylists') : ?>
                <?php get_template_part('components/category', 'stylists'); ?>
            <?php endif; ?>

            <?php if (have_rows('four-types')) : ?>
                <div class="row mx-0">
                    <?php while (have_rows('four-types')) : the_row();

                        $image = get_field('image');
                        $link = get_field('shotType');

                    ?>

                        <div class="col-6 px-0 image-shots" style="position:relative;">
                            <img src="<?php echo get_sub_field('image'); ?>" alt="" class="img-fluid">
                            <div class="type">
                                <?php echo get_sub_field('shotType'); ?>
                            </div>
                        </div>





                    <?php endwhile; ?>
                </div>
            <?php endif; ?>










        <?php endwhile; ?>

    <?php endif; ?>


    <?php get_template_part('template-parts/new-video-list'); ?>

    <?php get_template_part('template-parts/tickers'); ?>

    <?php get_template_part('template-parts/featured-stylist'); ?>

    <?php get_template_part('template-parts/full-video-list'); ?>











</div>












<?php get_footer(); ?>