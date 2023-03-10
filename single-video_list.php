<?php 

// Template Post Type: video_list




get_header(); ?>
<div class="container px-0" id="article">
    <?php ?>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <div class="video-title text-center" style="background:linear-gradient(rgba(255,255,255,0.4),rgba(255,255,255,0.4)), url(<?php echo the_field('thumbnail') ?>) no-repeat; background-position:center; background-size: cover;">
                <h2 class="blog-detail__title"><span><?php the_title(); ?></span></h2>
            </div>

            <?php ?>
            <div class="col-md-8 offset-md-2 col-sm-10 offset-sm-1 col-12 pt-2 pb-3 px-4 post-page mt-5">
                <div class="videoInfo">
                    <?php
                    $related_post = get_field('stylist'); ?>
                
                    <div class="information-block">
                    <?php 
    $terms = get_the_terms( $post->ID, 'genre' ); 

?>
                        <p>スタイリスト：<?php echo $related_post[0]->post_title ?></p>
                        

                        <p><span>動画について</span><br>
                            <?php echo the_field('newVideoDescription') ?></p>

                        

                        <!-- <a href="#"></a> -->
                        <div class="embed-video">
                            <iframe src="<?php echo the_field('videoLink') ?>" frameborder="0"></iframe>
                        </div>
                        <div class="register">
                            <a class="btn btn-kamismax">KAMISMAXに登録する</a>
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

                

            </div>
            <?php ?>

    <?php endwhile;
    endif; ?>
    <?php ?>
</div>

<?php get_footer(); ?>