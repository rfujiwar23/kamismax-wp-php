<?php 

$stylist = get_field('stylist');

get_header(); ?>

<div class="stylist-wrapper">
<div class="container px-0">
<div style="aspect-ratio: 16/9">
  <iframe
    frameborder="0"
    height="100%"
    width="100%"
    src="<?php the_field('youtubeVideo'); ?>?autoplay=1&controls=0&mute=1&loop=1"
  >
  </iframe>
</div> 
<div class="row">
    <div class="col-md-3 col-6 mx-auto">
    <img src="<?php the_field('profileImage') ?>" alt="<?php the_field('lastName'); ?> <?php the_field('firstName'); ?>" class="img-fluid">
    </div>
    <div class="col-md-6">
    <div class="col-10 offset-1">
    
    <h2>名前：<?php the_field('lastName'); ?> <?php the_field('firstName'); ?></h2>
    <h4>サロン：<?php the_field('salonName'); ?></h4>
    
    </div>
    </div>
</div>
</div>


</div>
<?php get_footer(); ?>