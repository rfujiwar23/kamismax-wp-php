<?php
$post_objects = get_sub_field('sample_video');
if ($post_objects) : ?>
    <div class="container sample-video">
        <div class="col-lg-10 offset-lg-1">
            <div class="row row-flex">
                <?php foreach ($post_objects as $post) : ?>
                    <?php setup_postdata($post); ?>
                    <div class="col-sm-6 col-8 mb-3 mx-auto">
                        <div class="video-info" style="height: 100%;">
                            <div class="video">
                                <iframe src="<?php the_field('videoLink'); ?>" frameborder="0" allowfullscreen=""></iframe>
                            </div>
                            <p class="mb-0"><?php the_field('video_about'); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
<?php endif; ?>