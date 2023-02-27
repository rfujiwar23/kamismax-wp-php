<?php 

$stylist = get_field('stylist');

get_header(); ?>

<div class="stylist-jumbotron">
<div class="profile-pic-container" style="background:linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)), url(<?php the_post_thumbnail_url(); ?>) no-repeat; background-size:cover; background-position:center;">
<!-- <img src="<?php the_post_thumbnail_url(); ?>" alt="Post" style="object-fit:cover;"> -->
</div>
</div>
<div class="container post-page">
<div class="about-stylist">
<div class="name info">
<h4><ruby><?php the_field('last-name'); ?><rt><?php the_field('furigana-last'); ?></rt></ruby> <ruby><?php the_field('first-name'); ?><rt><?php the_field('furigana-first'); ?></rt></ruby> 氏</h4>
</div>
<div class="salon info">
<p>所属サロン：<?php the_field('salon-name'); ?><br>エリア：<?php the_field('salon-area'); ?></p>
</div>
</div>
<hr>
<div class="row">
<div class="col-sm-3 col-6">
    <img src="<?php the_field('logo'); ?>" alt="<?php the_field('salon-name'); ?> <?php the_field('last-name'); ?>" class="img-fluid">
</div>
<div class="col-sm-9 biography-details d-flex justify-content-center align-items-center">
<div class="details">
<?php echo the_content(); ?>
<a href="<?php the_field('kamisma-page'); ?>">もっと詳しく見る</a>
</div>
</div>
</div>
</div>
<?php get_footer(); ?>