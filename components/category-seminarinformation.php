
    <?php if (have_rows('seminarInformation')) : ?>
        <?php while (have_rows('seminarInformation')) : the_row(); ?>
            <div class="container">
            <?php if (get_row_layout() == 'types_of_seminar') : ?>
                <div class="seminarType">
                    <?php if (have_rows('menu_type')) : ?>
                        <ul style="list-style-type:none;">
                            <?php while (have_rows('menu_type')) : the_row();
                            ?>
                                <li>
                                    <div class="seminarInfo row">
                                        <div class="col-sm-3 d-flex align-items-center justify-content-center" style="background:<?php the_sub_field('background_color'); ?>">
                                        <h3 class="my-0"><?php the_sub_field('menu-name'); ?></h3>
                                        </div>
                                        <div class="col-sm-9 d-flex align-items-center justify-content-center" style="border:1px solid <?php the_sub_field('background_color'); ?>; ">
                                        <p><?php the_sub_field('seminar'); ?></p>
                                        </div>
                                    </div>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            </div>
            <div class="container-fluid px-0">
            <?php if (get_row_layout() == 'seminar_contents') : ?>
                <div class="seminar-information-area">
                <p><?php echo get_sub_field('free_text_area_seminar') ?></p>
                </div>
            <?php endif; ?>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
                