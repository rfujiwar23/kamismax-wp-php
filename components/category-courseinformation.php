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
                $image = get_sub_field('levelType');
            ?>

                <?php if (get_row_index() % 2 == 0) : ?>
                    <div class="type-right row col-lg-8 offset-lg-2 col-md-10 offset-md-1 p-3">
                        <div class="col-lg-2 d-flex justify-content-center align-items-center number">
                        <h2><?php echo $i; ?></h2>
                        </div>
                        <div class="description col-lg-10">
                       
                        <h4 class="mb-0"><?php the_sub_field('course_type_header'); ?></h4>
                        <p class="mb-0"><?php the_sub_field('course_type_about'); ?></p>
                        </div>
                        
                    </div>
                <?php else : ?>
                    <div class="type-left row col-lg-8 offset-lg-2 col-md-10 offset-md-1 p-3">
                        
                        
                        <div class="description col-lg-10">
                        
                        <h4 class="mb-0"><?php the_sub_field('course_type_header'); ?></h4>
                        <p class="mb-0"><?php the_sub_field('course_type_about'); ?></p>
                        </div>
                        <div class="col-lg-2 d-flex justify-content-center align-items-center number">
                        <h2><?php echo $i; ?></h2>
                        </div>
                    </div>
                <?php endif; ?>


            <?php $i++;
            endwhile; ?>


        </div>

    <?php endif; ?>
</div>
<?php echo get_sub_field('free_text_area') ?>