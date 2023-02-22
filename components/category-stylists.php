<?php
$post_objects = get_sub_field('stylist');
if ($post_objects) : ?>
    <div class="stylists px-2">

        <div class="kami-charisma col-lg-10 offset-lg-1">


        </div>


        <div class="container">
            <ul class="px-0 stylist-list col-lg-10 offset-lg-1">

                <h3>注目のスタイリスト！</h3>

                <div class="flex-container">
                    <?php foreach ($post_objects as $post) : ?>

                        <?php setup_postdata($post); ?>
                        <div id="<?php echo esc_attr($post->post_name); ?>" class="stylist-card">
                            <div class="image-youtube px-2 py-2">
                                <img src="<?php the_field('profileImage'); ?>" alt="<?php the_field('lastName'); ?><?php the_field('firstName'); ?>">
                                <div class="youtube-link">
                                    <a 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#<?php the_field('lastNameEng'); ?><?php the_field('firstNameEng'); ?>">
                                    <i class="fa-solid fa-video"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="py-2 px-3 profile">
                                <h2><?php the_field('salonName'); ?></h2>
                                <h4><?php the_field('lastName'); ?> <?php the_field('firstName'); ?></h4>
                                <p><?php the_field('user_voice'); ?></p>
                                <a href="<?php the_field('instagram_account'); ?>" target="_blank">インスタ</a>
                            </div>
                        </div><!-- /stylist -->
                        <!-- Modal -->
                        <div class="modal fade" id="<?php the_field('lastNameEng'); ?><?php the_field('firstNameEng'); ?>" tabindex="-1" aria-labelledby="<?php the_field('lastNameEng'); ?><?php the_field('firstNameEng'); ?>Label" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <p class="modal-title" id="<?php the_field('lastNameEng'); ?><?php the_field('firstNameEng'); ?>Label">
                                            <?php the_field('lastName'); ?> <?php the_field('firstName'); ?>
                                        </p>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="hs-responsive-embed-youtube">
                                            <iframe src="<?php the_field('youtubeVideo'); ?>" frameborder="0" allowfullscreen="">
                                            </iframe>
                                            
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
                                        <button type="button" class="btn btn-primary">登録する</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php wp_reset_postdata(); ?>
            </ul>
        </div>
    </div><!-- /stylists -->
<?php endif; ?>