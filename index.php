<?php get_header(); 

$post_type = get_post_type( $video_list );

?>

<div class="wrapper mt-3">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-10 offset-sm-1">
                <div class="list-group mb-3">

                    <h2 class="title text-center mb-4">NEWS</h2>

                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                            <a href="<?php the_permalink(); ?>" class="list-group-item list-group-item-action small">
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-3 d-flex align-items-center justify-content-center">
                                        <?php

                                        if (has_post_thumbnail()) { ?>
                                            <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url() ?>" alt="<? echo get_the_title() ?>">
                                        <?php } else { ?>
                                            <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/image/placeholder.png" alt="<? echo get_the_title() ?>">
                                        <?php }

                                        ?>

                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-10 col-9">
                                        <h3 class="fs-5 fw-600"><?php echo get_the_title(); ?></h3>
                                        <p><?php echo get_the_excerpt(); ?></p>
                                    </div>
                                </div>
                            </a>
                        <?php endwhile;
                    else : ?>
                        <p><?php esc_html_e('Sorry, no posts matched your criteria.'); ?></p>
                    <?php endif; ?>

                </div>
            </div>

            

        </div>
    </div>
</div>

<?php get_footer(); ?>