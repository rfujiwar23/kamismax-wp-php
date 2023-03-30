<?php ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <?php ?>
    <h1 class="blog-detail__title"><?php the_title(); ?></h1>
    
    <?php ?>

    <?php ?>
    <?php if(has_post_thumbnail()): ?>
    <div class="blog-detail__image">
        <img src="<?php the_post_thumbnail_url('large'); ?>">
    </div>
    <?php endif; ?>
    <?php ?>

    <?php ?>
    <div class="blog-detail__body">
        <div class="blog-content"><?php echo the_content(); ?></div>
    </div>
    <?php ?>

<?php endwhile; endif; ?>
<?php ?>