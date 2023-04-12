<div class="container">
    <?php if (have_rows('level_type')) : ?>

        <div class="col-lg-10 offset-lg-1">
            <?php while (have_rows('level_type')) : the_row();
                $image = get_sub_field('levelType');
            ?>
                <div class="row level_type p-2">
                    <div class="level col-md-4 d-flex justify-content-center align-items-center" style="background:<?php the_sub_field('choose_color'); ?>; color: #fff; ">
                        <p class="mb-0"><?php the_sub_field('levelType'); ?></p>
                    </div>
                    <div class="level_description col-md-8 d-flex justify-content-center align-items-center" style="border: 1px solid <?php the_sub_field('choose_color'); ?>;">
                        <p class="mb-0"><?php the_sub_field('level_description'); ?></p>
                    </div>
                </div>
                <div class="arrow-down">
                    <h5 class="text-center"><i class="las la-caret-down"></i></h5>
                </div>
            <?php endwhile; ?>
            <div class="arrow-down">
                <h5 class="text-center">一流のスタイリストへ</h5>
            </div>

        </div>

    <?php endif; ?>
</div>
<div class="container-fluid">
    <?php if (have_rows('types_of_courses')) : ?>

        <div class="types_of_courses">
            <?php
            $i = 1;
            while (have_rows('types_of_courses')) : the_row();
                
            ?>

                <?php if (get_row_index() % 2 == 0) : ?>
                    <div class="type-right row">
                       
                        <div class="description" style="background:linear-gradient(rgba(255,255,255,0.8),rgba(255,255,255,0.7)), url(<?php the_sub_field('background_image'); ?>) no-repeat; background-position:center; background-size:cover; padding:4vh 10px; ">
                       
                        <h4 class="mb-0" style="color: <?php the_sub_field('course_type_header_color'); ?>"><em style="text-style:normal; padding: 10px; color: <?php the_sub_field('course_type_header_bg'); ?>;"><?php the_sub_field('course_type_header'); ?></em></h4>
                        <div class="desc-text" style="color: <?php the_sub_field('course_type_about_text_color') ?>">
                        <?php the_sub_field('course_type_about'); ?>
                        </div>
                        </div>
                        
                    </div>
                <?php else : ?>
                    <div class="type-left row">
                        
                        
                        <div class="description" 
                        style="background:linear-gradient(rgba(255,255,255,0.8),rgba(255,255,255,0.7)), url(<?php the_sub_field('background_image'); ?>) no-repeat; 
                        background-position:center; background-size:cover;
                        background:<?php the_sub_field('background_color'); ?>; padding:4vh 10px; ">
                        
                        <h4 class="mb-0" style="color: <?php the_sub_field('course_type_header_color'); ?>"><em style="text-style:normal; padding: 10px; color: <?php the_sub_field('course_type_header_bg'); ?>;"><?php the_sub_field('course_type_header'); ?></em></h4>
                        <div class="desc-text" style="color: <?php the_sub_field('course_type_about_text_color') ?>">
                        <?php the_sub_field('course_type_about'); ?>
                        </div>
                        </div>
                        
                    </div>
                <?php endif; ?>


            <?php $i++;
            endwhile; ?>


        </div>

    <?php endif; ?>
</div>
<!-- <?php echo get_sub_field('free_text_area') ?> -->