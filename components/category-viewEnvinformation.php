<div class="container-fluid">
    <?php if (have_rows('viewInformation')) : ?>
        <?php while (have_rows('viewInformation')) : the_row(); ?>
            <?php if (get_row_layout() == 'view_environment_blocks') : ?>
                <div class="viewer_environment">
                    <?php if (have_rows('view_environment')) : ?>
                        <div class="view-row">
                            <?php while (have_rows('view_environment')) : the_row();
                            ?>
                                <div class="information">
                                    
                                        <div class="col-sm-2 col-2 icon-image mx-auto mb-3">
                                            <img src="<?php the_sub_field('icon'); ?>" alt="<?php the_sub_field('header'); ?> 画像" class="img-fluid">
                                        </div>
                                        <div class="text-area">
                                            <h3><?php the_sub_field('header'); ?></h3>
                                            <p><?php the_sub_field('about'); ?></p>
                                        </div>
                                    
                                    <div class="sample-image">
                                        <img src="<?php the_sub_field('sample_image'); ?>" alt="KAMISMAX">
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <?php if (get_row_layout() == 'view_contents') : ?>
                <p><?php echo get_sub_field('free_text_area_view_environment') ?></p>
            <?php endif; ?>
        <?php endwhile; ?>
    <?php endif; ?>
</div>