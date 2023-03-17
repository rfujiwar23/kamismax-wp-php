<?php
    $args = array(
        'post_type' => 'video_list',
    );
    $release_query = new WP_Query($args);
    ?>
    <div class="full-video-list" 
    style="background:linear-gradient(rgba(255,255,255,0.3),rgba(255,255,255,0.5)), url(<?php echo get_template_directory_uri(); ?>/img/ksmx-sample.png) no-repeat; background-position:center; background-size:cover;"
    >
        <h2>動画一覧</h2>
        <div class="full-video-list">
            <?php if ($release_query->have_posts()) : ?>
                <ul class="video">
                    <?php while ($release_query->have_posts()) : $release_query->the_post(); ?>
                        <li>
                            
                            <div class="about">
                                <a href="<?php the_field('videoLink'); ?>" alt="<?php the_title(); ?>">
                                    <img src="<?php the_field('thumbnail'); ?>" class="img-fluid" alt="KAMISMAX">
                                </a>
                                <p><?php the_title(); ?></p>
                                <!-- Modal -->

                                
                            </div>
                        
                        </li>
                    <?php endwhile; ?>
                </ul>
                
            <?php endif;
            wp_reset_postdata(); ?>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
    $(function(){
  $('.modal').on('hidden.bs.modal', function (e) {
    $iframe = $(this).find("iframe");
    $iframe.attr("src", $iframe.attr("src"));
  });
  
  

  

  $(".modal").on('hide.bs.modal', function() {
    $(".stylistVideo").attr('src', '');
        console.log('VideoStopped');
        // location.reload(true);
  });



  

  
});

  </script>