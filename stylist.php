<?php 

$stylist = get_field('stylist');

get_header(); ?>

<div class="stylist-jumbotron">
<p><?php the_field('lastName'); ?></p>
</div>
<?php get_footer(); ?>