<?php if (get_row_layout() == 'top_page') : ?>
    <div class="bg-video-wrap">
        <video src="<?php echo get_sub_field('movie'); ?>" loop muted autoplay playsinline poster="<?php echo get_sub_field('image'); ?>">
        </video>
        <div class="overlay">
        </div>
        <div class="title">
            
            
            <h1><img src="<?php echo get_sub_field('title-logo'); ?>" alt="<?php echo get_sub_field('web-site-catch-phrase') ?>" class="img-fluid"></h1>
            <div class="links mt-5">
            
            
            
            <div class="col-sm-6 link">
            <a href="<?php echo the_sub_field('button1_link') ?>">
            <div class="link-contents">
            <p>会員の方々</p>
            <h4><?php echo the_sub_field('button1') ?></h4>
            </div>
            </a>
            </div>
            
            <div class="col-sm-6 link">
            <a href="<?php echo the_sub_field('button2_link') ?>">
            <div class="link-contents">
            <p>無料動画を観る</p>
            <h4><?php echo the_sub_field('button2') ?></h4>
            </div>
            </a>
            </div>
        </div>
        </div>
       
        
        
    </div>
<?php endif; ?>