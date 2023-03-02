<?php get_header(); ?>

<!-- <div class="container px-0">
<div class="jumbotron" style="aspect-ratio: 16/9; background: url(<?php echo the_field('thumbnail') ?>) no-repeat; background-position:center; background-size:cover;">
</div>
</div> -->



<div class="container post-page" id="article">
    <?php ?>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>


            <div class="col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1">
                <?php ?>
                   <h2 class="blog-detail__title"><?php the_title(); ?></h2>
                <hr>
                <!-- <p class="postmetadata"><?php _e('カテゴリ：'); ?> <span><?php the_category(' '); ?></span></p> -->
                <?php ?>
                <!-- <p class="post-time"><i class="fa-solid fa-clock"></i>公開日: <?php the_time('Y.m.d') ?>
                    <br><i class="fa-solid fa-clock"></i>更新日: <?php the_modified_date('Y.m.d') ?>
                </p> -->
            </div>



            <?php ?>
            <div class="col-lg-10 offset-lg-1 pt-2 pb-3 px-4 post-page">
                <div class="videoInfo">

                    <div class="information-block">
                        <h5><?php echo the_field('video_about') ?></h5>
                        <p><span>動画について</span><br>
                            <?php echo the_field('newVideoDescription') ?></p>
                        <!-- <?php echo the_field('videoLink') ?> -->
                        <!-- <a href="#"><img src="<?php echo the_field('thumbnail') ?>" alt="" class="img-fluid"></a> -->
                        <div class="embed-video">
                            <iframe src="<?php echo the_field('videoLink') ?>" frameborder="0"></iframe>
                        </div>
                        <div class="register">
                            KAMISMAXに登録する
                        </div>
                    </div>

                </div>

                <div class="previous-and-next">
                    <?php the_post_navigation(array(
                        'prev_text'  => __('← 前の動画'),
                        'next_text'  => __('次の動画 →'),
                    ));
                    ?>
                </div>

                <a href="<?php bloginfo('url') ?>/news">一覧を見る</a>

            </div>
            <?php ?>

    <?php endwhile;
    endif; ?>
    <?php ?>
</div>

<?php get_footer(); ?>