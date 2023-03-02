<div class="container">
    <?php if (have_rows('seminarInformation')) : ?>
        <?php while (have_rows('seminarInformation')) : the_row(); ?>
            <?php if (get_row_layout() == 'types_of_seminar') : ?>
                <div class="seminarType">
                    <?php if (have_rows('menu_type')) : ?>
                        <ul style="list-style-type:none;">
                            <?php while (have_rows('menu_type')) : the_row();
                            ?>
                                <li style="display:inline-block;">
                                    <div class="seminarInfo">
                                        <h3><?php the_sub_field('menu-name'); ?></h3>
                                        <p><?php the_sub_field('seminar'); ?></p>
                                    </div>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <?php if (get_row_layout() == 'seminar_contents') : ?>
                <div class="seminar-information-area">
                <p><?php echo get_sub_field('free_text_area_seminar') ?></p>
                </div>
            <?php endif; ?>
        <?php endwhile; ?>
    <?php endif; ?>
</div>