<!-- <div class="container d-flex justify-content-center align-item-center">
    <img src="<?php echo get_template_directory_uri(); ?>/img/kmax-logo@2x.png" alt="KAMISMAX" class="img-fluid">
</div> -->
<?php while (have_rows('service_information_area')) : the_row(); ?>

    <div class="container">

        <?php if (get_row_layout() == 'txt-block') : ?>
            <div class="div col-lg-10 offset-lg-1 col-md-12">
                <p><?php the_sub_field('text_area') ?></p>
            </div>
        <?php endif; ?>
        <?php if (get_row_layout() == 'small_area') : ?>

            <?php if (have_rows('small_area_input')) : ?>
                <div class="input-row">
                    <?php while (have_rows('small_area_input')) : the_row(); ?>
                        <div class="small_area_input">
                            <h4><?php the_sub_field('small_area_header'); ?></h4>
                            <!-- <p><?php the_sub_field('small_area_list'); ?></p> -->
                            <p>
                                <?php
                                echo str_replace(array("\r\n"), '<li></li>', the_sub_field('small_area_list'));
                                ?>
                            </p>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>

        <?php endif; ?>

        <?php if (get_row_layout() == 'extra_info_block') : ?>
            <?php if (have_rows('extra_information_text')) : ?>

                <?php while (have_rows('extra_information_text')) : the_row(); ?>
                    <div class="extra_info_block">
                        <h4>【<?php the_sub_field('extra_info_header'); ?>】</h4>
                        <p><?php the_sub_field('extra_info_text'); ?></p>
                    </div>
                <?php endwhile; ?>

            <?php endif; ?>
        <?php endif; ?>
        <div class="service_information_image col-md-10 offset-md-1">
            <?php if (get_row_layout() == 'image') : ?>
                <img src="<?php the_sub_field('service_information_image'); ?>" alt="KAMISMAX" class="img-fluid">
            <?php endif; ?>
        </div>
    </div>
<?php endwhile; ?>