<?php 
$innerLinks = get_sub_field('inner-link');
?>
<!-- フルスクリーン動画用のコード -->
<?php foreach ($innerLinks as $link) : ?>
    
        <!-- should be from a video link from outside source
        <pre><?php echo $link['video-link']; ?></pre>
        <pre><?php echo $link['go_to_image']?></pre> -->
        <div class="bg_img_full_screen" style="background: url(<?php echo $link['go_to_image']?>); background-size:cover; background-position:center;">
            <!-- <img src="<?php echo $link['go_to_image']?>" alt="<?php echo $link['go_to_text']; ?>"> -->
            <div class="overlay">
            </div>
            <div class="text">
                <h2><?php echo $link['go_to_text']; ?></h2>
                <p><?php echo $link['go_to_text_jp']; ?></p>
                <p><?php echo $link['description']; ?></p>
                <div class="inner-link">
                    <a href="<?php echo $link['Link']; ?>"><?php echo $link['site_link_text']; ?> <i class="fa-solid fa-circle-arrow-right"></i></a>
                </div>
                <?php if ($link['ext_link']) : ?>
                    
                    <div class="ext-link">
                        <a href="<?php echo $link['ext_link']; ?>"><?php echo $link['link_text']; ?> <i class="fa-solid fa-circle-arrow-right"></i></a>
                    </div>
                <?php endif; ?>
            </div>
        </div>


<?php endforeach; ?>