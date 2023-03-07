<?php

$stylist = get_field('kmx_stylist');

get_header(); ?>

<div class="container px-0">
    <div class="stylist-page d-flex align-items-center justify-content-center">
        <div class="stylist-title">
            <h2>スタイリスト紹介</h2>
            <h5 class="text-center">
                <ruby><?php the_field('lastName'); ?><rt><?php the_field('lastNameHIR'); ?></rt></ruby>
                <ruby><?php the_field('firstName'); ?><rt><?php the_field('firstnameHIR'); ?></rt></ruby>
            </h5>

        </div>
    </div>

</div>
<div class="container">
    <div class="stylist-contents">
        <div class="row mt-5 mx-0 stylist">
            <div class="col-lg-3 col-md-5 px-0">
                <img src="<?php the_field('profileImage'); ?>" alt="<?php the_field('lastName'); ?><?php the_field('firstName'); ?>" class="img-fluid">
            </div>
            <div class="col-lg-9 col-md-7 px-0 d-flex justify-content-center align-items-center">
                <div class="stylist-information">
                <h4>
                    <ruby><?php the_field('lastName'); ?><rt><?php the_field('lastNameHIR'); ?></rt></ruby>
                    <ruby><?php the_field('firstName'); ?><rt><?php the_field('firstnameHIR'); ?></rt></ruby>
                </h4>

                <h5><?php the_field('salonName'); ?></h5>
                <p><strong>スタイルストから一言：</strong><br><span><?php the_field('user_voice'); ?></span></p>

                </div>
            </div>
        </div>

        <!-- <div>
        関連動画：
        </div> -->
    </div>
</div>
<?php get_footer(); ?>