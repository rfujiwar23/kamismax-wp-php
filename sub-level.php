<?php

/**
 * Template Name: 下層ページ
 */

get_header(); ?>



<div class="main-contents-area">
  <?php if (have_rows('content')) : ?>

    <?php while (have_rows('content')) : the_row(); ?>

      <!-- 内部リンク -->
      <?php if (get_row_layout() == 'inner_links') : ?>
        <?php get_template_part('components/top', 'fscategory'); ?>
      <?php endif; ?>



      <!-- Free Text Area -->
      <?php if (get_row_layout() == 'free_text_area') : ?>
        <?php get_template_part('components/category', 'freetext'); ?>
      <?php endif; ?>


      <?php if (get_row_layout() == 'list-of-stylists') : ?>
        <?php get_template_part('components/category', 'stylists'); ?>
      <?php endif; ?>

      <?php if (get_row_layout() == 'list-of-videos') : ?>
        <?php get_template_part('components/category', 'newVideoList'); ?>
      <?php endif; ?>





    <?php endwhile; ?>

  <?php endif; ?>
</div>

<div class="container">
<?php if (have_rows('curriculum_contents')) : ?>

<?php while (have_rows('curriculum_contents')) : the_row(); ?>

  <?php if (get_row_layout() == 'choose_course') : ?>
    <?php
    $post_objects = get_sub_field('course');
    if ($post_objects) : ?>
      <div class="stylists px-2">
        <div class="container">
          <ul class="px-0 stylist-list col-lg-10 offset-lg-1">
            <h3>コース一覧</h3>
            <div class="flex-container">
              <ul>
                <?php foreach ($post_objects as $post) : ?>
                  <?php setup_postdata($post); ?>
                  <li>
                    <div>
                      <h4><?php the_field('course_kinds'); ?></h4>
                      <h5>コースID: <?php the_field('course_id'); ?></h5>
                      <p><?php the_field('course_sample_url'); ?></p>
                      <a href="<?php the_field('course_mov_url'); ?>">動画を見る</a>
                    </div>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
            <?php wp_reset_postdata(); ?>
          </ul>
        </div>
      </div>
    <?php endif; ?>
  <?php endif; ?>

<?php endwhile; ?>

<?php endif; ?>

</div>



<div class="container">
<?php if (have_rows('seminar_contents')) : ?>

<?php while (have_rows('seminar_contents')) : the_row(); ?>

  <?php if (get_row_layout() == 'choose_seminar') : ?>

    

    <?php
$post_objects = get_sub_field('seminar');
if ($post_objects) : ?>
    <div class="stylists px-2">

    <div class="kami-charisma col-lg-10 offset-lg-1">
    <p>
        <small>*カミカリスマ美容師として活躍されています</small>
    </p>
    
    </div>
        

        <ul class="px-0">
        
            <?php foreach ($post_objects as $post) : ?>

                
                <?php setup_postdata($post); ?>

                

                <li class="stylist">
                    <?php the_field('seminar_message') ?>
                </li><!-- /stylist -->
            <?php endforeach; ?>
            <?php wp_reset_postdata(); ?>
        </ul>
    </div><!-- /stylists -->
<?php endif; ?>



  <?php endif; ?>

<?php endwhile; ?>

<?php endif; ?>

</div>

<!-- <?php
      $args = array(
        'numberposts' => -1,
        'post_type'   => 'kmx_stylist',
        'order'       => 'ASC',
        'orderby'     => 'title'
      );
      $courses = get_posts($args);

      if ($courses) : ?>
  <ul>
    <?php foreach ($courses as $course) : setup_postdata($course); ?>
      <li><a href=""><?php echo get_the_field('lastName'); ?></a></li>
    <?php endforeach;
        wp_reset_postdata(); ?>
  </ul>
<?php endif; ?> -->


<?php get_footer(); ?>