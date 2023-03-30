<?php

get_header(); ?>

<div class="container px-0">
    <div class="stylist-page d-flex align-items-center justify-content-center">
        <div class="stylist-title">
            <h2>コース</h2>
            

        </div>
    </div>

</div>
<div class="container">
    <div class="course-contents">
        <div class="row mt-5 mx-0 stylist">
        <pre><?php echo the_field('course_kinds');?></pre>
        <pre><?php echo the_field('course_id');?></pre>
        <pre><?php echo the_field('course_sample_url');?></pre>
        <pre><?php echo the_field('course_mov_url');?></pre>
        <pre><?php echo the_field('stylist');?></pre>

        </div>

        <!-- <div>
        関連動画：
        </div> -->
    </div>
</div>
<?php get_footer(); ?>