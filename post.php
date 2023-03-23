<?php get_header(); 
/**
 * Template Name: Posts
 */

?>

<div class="container px-0">
<div class="bg-sub-banner" style="width:100%; background: #BFC9CA; background:<?php echo get_field('sub_banner_image'); ?>; background:linear-gradient(135deg, rgba(255,255,255,0.6) 0%, rgba(255,255,255,0.7) 100%), url(<?php echo get_field('sub_banner_image'); ?>);  background-position:center; background-size:cover; display:flex; align-items:center; justify-content: center;">
            <!-- <h2><?php echo get_the_title(); ?></h2> -->
            <div class="contents">
        <h3 class="text-center">KAMISMAXからのお知らせ</h3>
        <p class="text-center"><?php wpb_total_posts(); ?>件</p>
    </div>
</div>
</div>



<?php query_posts('posts_per_page=-1'); ?>
<?php if (have_posts()) : ?>
    <div class="container">
        <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-12 read-more">
            <?php while (have_posts()) : the_post(); ?>
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
            <?php endwhile; ?>
        </div>
    </div>
<?php endif; ?>

<?php get_footer(); ?>