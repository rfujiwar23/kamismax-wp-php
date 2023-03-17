<?php
  $seminar_posts = get_sub_field('seminar');
  if ($seminar_posts) : ?>
    <div class="stylists px-2">
      <div class="container">
        <ul class="px-0 stylist-list col-lg-10 offset-lg-1">
          <h3>コース一覧</h3>
          <div class="flex-container">
          
              <?php foreach ($seminar_posts as $seminar) : ?>
                <?php setup_postdata($seminar); ?>
                  yes
                  <div>
                <?php echo $seminar ?>
                    <p><?php the_field('seminar_message'); ?></p>
                  <!-- <pre><?php the_field('seminar_id'); ?></pre>
                  <pre><?php the_field('seminar_details'); ?></pre>
                  <pre><?php the_field('seminar_times'); ?></pre>
                  <pre><?php the_field('seminar_target'); ?></pre>
                  <pre><?php the_field('seminar_points'); ?></pre>
                  <pre><?php the_field('seminar_message'); ?></pre> -->
                  </div>
                
              <?php endforeach; ?>
           
          </div>
          <?php wp_reset_postdata(); ?>
        </ul>
      </div>
    </div><!-- /stylists -->
  <?php endif; ?>
  