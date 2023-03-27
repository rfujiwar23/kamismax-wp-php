<?php

/**
 * Template Name: トップページ (TOP)
 */

get_header(); ?>



<?php get_template_part('template-parts/register-login'); ?>

<?php get_template_part('template-parts/new-video-list'); ?>



<?php get_template_part('template-parts/tickers'); ?>

<?php get_template_part('template-parts/featured-stylist'); ?>






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

            <?php if (get_row_layout() == 'kamismax_features') : ?>

                <div class="kamismax_features container-fluid">

                    <h2><?php the_sub_field('section_title') ?></h2>
                    <?php if (have_rows('features_contents')) : $i = 0; ?>
                        <div class="main-points">
                            <?php while (have_rows('features_contents')) : the_row();
                                $i++;

                            ?>

                                <div class="point card">
                                    <h3 class="text-center"><span>ポイント <?php echo $i; ?></span></h3>
                                    <h4><?php the_sub_field('feature_header'); ?></h4>
                                    <div class="card-body">
                                        <?php the_sub_field('feature_description'); ?>
                                    </div>
                                    <div class="card-image p-2">
                                        <img src="<?php the_sub_field('feature_image'); ?>" alt="KAMISMAX　カミスマックス" class="img-fluid">
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

        <?php endwhile; ?>

    <?php endif; ?>






    <div class="container">
        <div class="read-more my-4">
            <h2 class="text-center">KAMISMAXからのお知らせ</h2>
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
                        <h4 class="time"><i class="las la-clock"></i> 投稿：<?php the_time('Y.m.d') ?></h4>
                        <p class="category"><span><?php the_category(' '); ?></span></p>
                        <p style="margin-bottom:0;"><?php echo mb_substr(get_the_excerpt(), 0, 50) . '...'; ?>
                            <a href="<?php the_permalink(); ?>">もっと読む</a>
                        </p>
                    </div>
                <?php endwhile;
            else : ?>
                <p class="text-center">投稿数：0件</p>
            <?php endif;
            wp_reset_postdata(); ?>

            <div class="more-articles">
                <a href="<?php bloginfo('url') ?>/news">記事一覧</a>
            </div>
        </div>
    </div>











</div>

<div class="service-information-area">
    <?php if (have_rows('service_information_area')) : ?>

        <?php while (have_rows('service_information_area')) : the_row(); ?>
            <div class="container">
                <?php if (get_row_layout() == 'txt-block') : ?>
                    <pre><?php get_field('text_area') ?></pre>
                <?php endif; ?>

            </div>
        <?php endwhile; ?>
    <?php endif; ?>
</div>



<?php get_template_part('template-parts/full-video-list'); ?>



<div class="service_information_area">
    <?php if (have_rows('service_information_area')) : ?>

        <?php while (have_rows('service_information_area')) : the_row(); ?>
            <div class="container">
                <?php if (get_row_layout() == 'txt-block') : ?>
                    <div class="div col-lg-10 offset-lg-1 col-md-12">
                    <p><?php the_sub_field('text_area') ?></p>
                    </div>
                <?php endif; ?>
                <?php if (get_row_layout() == 'small_area') : ?>

                    <?php if (have_rows('small_area_input')) : ?>
                        <div class="input-row">
                            <?php while (have_rows('small_area_input')) : the_row(); ?>
                                <div class="small_area_input">
                                    <h4><?php the_sub_field('small_area_header'); ?></h4>
                                    <!-- <p><?php the_sub_field('small_area_list'); ?></p> -->
                                    <p>
                                        <?php
                                        echo str_replace(array("\r\n"), '<li></li>', the_sub_field('small_area_list'));
                                        ?>
                                    </p>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>

                <?php endif; ?>

                <?php if (get_row_layout() == 'extra_info_block') :?>
                    <?php if (have_rows('extra_information_text')) : ?>
                        
                            <?php while (have_rows('extra_information_text')) : the_row(); ?>
                                <div class="extra_info_block">
                                    <h4>【<?php the_sub_field('extra_info_header'); ?>】</h4>
                                    <p><?php the_sub_field('extra_info_text'); ?></p>
                                </div>
                            <?php endwhile; ?>
                        
                    <?php endif; ?>
                <?php endif; ?>    
            </div>
        <?php endwhile; ?>

    <?php endif; ?>
</div>








<?php get_footer(); ?>