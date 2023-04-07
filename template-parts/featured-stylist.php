<?php
$args = array(
    'post_type' => 'video_list',
    'posts_per_page' => '8',
);
$release_query = new WP_Query($args);
?>

<section class="news col-lg-10 offset-lg-1 col-md-10 offset-md-1">
    <?php if ($release_query->have_posts()) : ?>
        <div>
            <h2 class="text-center">今月の注目の美容師たち！</h2>
            <!-- <div class="stylist-of-the-month row"> -->
            <div id="carousel2" class="owl-carousel owl-theme">
                <?php while ($release_query->have_posts()) : $release_query->the_post(); ?>
                    <?php
                    $featured_stylists = get_field('stylist');
                    if ($featured_stylists) : ?>
                        <?php foreach ((array)$featured_stylists as $featured_stylist) :
                            $permalink = get_permalink($featured_stylist->ID);
                            $title = get_the_title($featured_stylist->ID);
                            $lastName = get_field('lastName', $featured_stylist->ID);
                            $firstName = get_field('firstName', $featured_stylist->ID);
                            $instagram = get_field('instagram_account', $featured_stylist->ID);
                            $stylist_photo = get_field('profileImage', $featured_stylist->ID);
                        ?>
                            <div class="my-3 px-0">
                                <div class="featured-stylist">
                                    <div class="row row-flex mx-0">
                                        <div class="col-lg-4 col-md-4 col-4 px-0 image">
                                            <img src="<?php echo esc_html($stylist_photo); ?>" alt="<?php echo esc_html($lastName); ?>" class="img-fluid">
                                            <pre><?php echo esc_html($stylist_photo); ?></pre>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-8 px-0 d-flex justify-contents-center align-items-center info">
                                            <div class="contents">
                                                <h4><span><?php echo esc_html($lastName); ?> <?php echo esc_html($firstName); ?></span></h4>
                                                <p class="mb-0"><?php the_field('video_about'); ?></p>
                                            </div>
                                            <a href="<?php echo esc_html($instagram); ?>"><i class="lab la-instagram"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                <?php endwhile; ?>
            </div>
        </div>
    <?php endif;
    wp_reset_postdata(); ?>
</section>