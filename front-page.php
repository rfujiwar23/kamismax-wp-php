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

            <?php if (get_row_layout() == 'levels') : ?>
               <div class="container">
               <?php if( have_rows('level_type') ): ?>
                    
                    <div class="col-lg-8 offset-lg-2">
                    <?php while( have_rows('level_type') ): the_row(); 
                        $image = get_sub_field('levelType');
                        ?>
                        <div class="row mb-3">
                            <div class="col-sm-4 d-flex justify-content-center align-items-center" style="background:<?php the_sub_field('choose_color'); ?>; color: #fff; padding:20px 10px; ">
                            <p class="mb-0"><?php the_sub_field('levelType'); ?></p>
                            </div>
                            <div class="col-sm-8 d-flex justify-content-center align-items-center" style="border: 1px solid <?php the_sub_field('choose_color'); ?>;">
                            <p class="mb-0"><?php the_sub_field('level_description'); ?></p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    </div>
                    
                <?php endif; ?>
               </div>
               <?php echo get_sub_field('free_text_area') ?>
               
            <?php endif; ?>


            <?php if(get_row_layout() == 'seminarArea') : ?>
                <div class="container">
                <?php if( have_rows('seminarInformation') ): ?>
                    <?php while( have_rows('seminarInformation') ): the_row(); ?>
                        
                        <?php if( get_row_layout() == 'types_of_seminar' ): ?>
                            <div class="seminarType">
                            <?php if( have_rows('menu_type') ): ?>
                                <ul style="list-style-type:none;">
                                <?php while( have_rows('menu_type') ): the_row(); 
                                    
                                    ?>
                                    <li style="display:inline-block;">
                                        <div class="seminarInfo">
                                        <h3><?php the_sub_field('menu-name'); ?></h3>
                                        <p><?php the_sub_field('seminar'); ?></p>
                                        </div>
                                    </li>
                                <?php endwhile; ?>
                                </ul>
                            <?php endif; ?>
                            </div>
                        <?php endif; ?>

                        <?php if (get_row_layout() == 'seminar_contents') : ?>
                            <p><?php echo get_sub_field('free_text_area_seminar') ?></p>
                        <?php endif; ?>
                        
                        
                    <?php endwhile; ?>
                <?php endif; ?>
                </div> 
            <?php endif; ?>  
            
            
            <?php if(get_row_layout() == 'view_environment_block') : ?>
                <div class="container">
                <?php if( have_rows('viewInformation') ): ?>
                    <?php while( have_rows('viewInformation') ): the_row(); ?>
                        
                        <?php if( get_row_layout() == 'view_environment_blocks' ): ?>
                            <div class="viewer_environment">
                            <?php if( have_rows('view_environment') ): ?>
                                <div class="col-md-10 offset-md-1">
                                <?php while( have_rows('view_environment') ): the_row(); 
                                    
                                    ?>
                                    <div class="information">
                                        <div class="row">
                                            <div class="col-sm-2 col-3 icon-image">
                                                <img src="<?php the_sub_field('icon'); ?>" alt="<?php the_sub_field('header'); ?> 画像" class="img-fluid">
                                            </div>
                                            <div class="text-area col-sm-10 col-9">
                                            <h3><?php the_sub_field('header'); ?></h3>
                                            <p><?php the_sub_field('about'); ?></p>
                                            </div>
                                        </div>
                                        <div class="sample-image">
                                        <img src="<?php the_sub_field('sample_image'); ?>" alt="KAMISMAX" class="img-fluid">
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                                </div>
                            <?php endif; ?>
                            </div>
                        <?php endif; ?>

                        <?php if (get_row_layout() == 'view_contents') : ?>
                            <p><?php echo get_sub_field('free_text_area_view_environment') ?></p>
                        <?php endif; ?>
                        
                        
                    <?php endwhile; ?>
                <?php endif; ?>
                </div> 
            <?php endif; ?>  

            <?php if (have_rows('four-types')) : ?>
                <div class="container">
                    <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
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
                    </div>
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