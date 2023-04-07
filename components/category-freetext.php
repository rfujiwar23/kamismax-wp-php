<div class="free-text">
<?php if (get_sub_field('section_header')) : ?>
    <div class="title" style="color:<?php echo get_sub_field('section_header_font_color'); ?>; background:<?php echo get_sub_field('section_header_bg_color'); ?>; padding:10px 20px;">
        <h3 class="text-center m-0"><span><?php echo get_sub_field('section_header'); ?></span></h3>
    </div>
<?php endif; ?>
    <div class="text-area" > 
    <div class="text-body" style="padding: 3vh 20px; background: linear-gradient(rgba(255,255,255,0.7),rgba(255,255,255,0.8)), url(<?php echo get_sub_field('text_area_image'); ?>); background:<?php echo get_sub_field('text_area_background'); ?>; background-position:center; background-size: cover; ">
        <div class="col-md-10 offset-md-1 col-sm-10 offset-sm-1">
        <p><?php echo get_sub_field('text_area_only') ?></p>
        </div>
    </div>
    </div>
</div>