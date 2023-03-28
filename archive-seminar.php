<?php 
  global $title;
  $page = get_post(get_page_by_path('seminar'));
  $title = $page -> post_title;
  $post_type = get_post_type();
?>
<!DOCTYPE html>
<html lang="ja">
<head>

<?php
  get_header();
  echo $page -> post_content;
?>

<div class="container">
  <div class="contents">
    <?php
      $terms = get_terms('field');
      foreach($terms as $term) :
        $query = new WP_Query(array(
          'post_status' => 'publish',
          'post_type' => $post_type,
          'orderby' => 'menu_order',
          'order' => 'ASC',
          'tax_query' => array(
            array(
              'taxonomy' => 'field',
              'field' => 'slug',
              'terms' => $term->slug,
            )
          ),
          'posts_per_page' => 9999,
        ));
        if($query->have_posts()): while( $query->have_posts() ): $query->the_post();
    ?>
    <!-- class seminar の　あとに color/perm などのclass名が入るようにする -->
    <div class="seminar <?php echo $term -> slug; ?>">
      <!--　セミナーのタイトル、担当者  -->
      <div class="seminar-top">
        <div class="title-area column">
          <div class="type inner-column-left">
            <!-- ゼミのID ***入れない*** -->
            <?php echo $term -> name . get_field('seminar_id', $post->ID); ?>
          </div>
          <div class="title inner-column-left">
            <!-- ゼミのタイトル 15文字以内で設定 -->
            <?php the_title(); ?>
          </div>
        </div>
        <div class="instructor column">
          <div class="title inner-column-right">
            <!-- 担当講師 -->
            担当講師
          </div>
          <div class="instructor-list inner-column-right">
            <!-- 担当講師の一覧、リストで表示してCSSでInline-Blockで表示 -->
            <ul>
              <?php $t1 = get_field('seminar_teacher1', $post->ID); ?>
              <li><?php echo $t1['seminar_teacher1_salon'] . ' ' . $t1['seminar_teacher1_name']; ?></li>
              <?php $t2 = get_field('seminar_teacher2', $post->ID); if($t2['seminar_teacher2_name']): ?>
              <li><?php echo $t2['seminar_teacher2_salon'] . ' ' . $t2['seminar_teacher2_name']; ?></li>
              <?php endif; ?>
              <?php $t3 = get_field('seminar_teacher3', $post->ID); if($t3['seminar_teacher3_name']): ?>
              <li><?php echo $t3['seminar_teacher3_salon'] . ' ' . $t3['seminar_teacher3_name']; ?></li>
              <?php endif; ?>
              <?php $t4 = get_field('seminar_teacher4', $post->ID); if($t4['seminar_teacher4_name']): ?>
              <li><?php echo $t4['seminar_teacher4_salon'] . ' ' . $t4['seminar_teacher4_name']; ?></li>
              <?php endif; ?>
            </ul>
          </div>
        </div>
      </div>
      <!-- セミナーの内容 -->
      <div class="seminar-contents">
        <!-- セミナーの個数 -->
        <div class="number">
          <span>全<em><?php echo get_field('seminar_times', $post->ID); ?></em>回</span>
        </div>
        <div class="seminar-details">
          <!-- 短めの詳細 -->
          <div class="brief-details">
            <?php echo get_field('seminar_details', $post->ID); ?>
          </div>
          <div class="row mx-0">
            <!-- 学習項目一覧・対象 -->
            <div class="col-md-6 details">
              <div class="detail-top">
                <div class="column left">
                  <h4>主な学習項目</h4>
                </div>
                <!-- 対象スタイリスト -->
                <div class="column right">
                  <?php echo get_field('seminar_target', $post->ID); ?>
                </div>
              </div>
              <!-- 内容のリスト化 -->
              <div class="seminar-points">
                <ul>
                  <li><?php
                    echo str_replace(array("\r\n"), '</li><li>', get_field('seminar_points', $post->ID));
                  ?></li>
                </ul>
              </div>
            </div>
            <div class="col-md-6 stylists">
              <div class="instructor-image row d-flex justify-content-center align-items-center">
                <!-- 小さめで担当者の画像・名前を表示 -->
                <div class="stylist col-3">
                  <img src="<?php echo $t1['seminar_teacher1_img']; ?>" alt="<?php echo $t1['seminar_teacher1_name']; ?>"
                    class="img-fluid">
                  <h5><span><?php echo $t1['seminar_teacher1_name']; ?></span>氏
                    <?php echo $t1['seminar_teacher1_id']; ?></h5>
                </div>
                <?php if($t2['seminar_teacher2_name']): ?>
                <div class="stylist col-3">
                  <img src="<?php echo $t2['seminar_teacher2_img']; ?>" alt="<?php echo $t2['seminar_teacher2_name']; ?>"
                    class="img-fluid">
                  <h5><span><?php echo $t2['seminar_teacher2_name']; ?></span>氏
                    <?php echo $t2['seminar_teacher2_id']; ?></h5>
                </div>
                <?php endif; ?>
                <?php if($t3['seminar_teacher3_name']): ?>
                <div class="stylist col-3">
                  <img src="<?php echo $t3['seminar_teacher3_img']; ?>" alt="<?php echo $t3['seminar_teacher3_name']; ?>"
                    class="img-fluid">
                  <h5><span><?php echo $t3['seminar_teacher3_name']; ?></span>氏
                    <?php echo $t3['seminar_teacher3_id']; ?></h5>
                </div>
                <?php endif; ?>
                <?php if($t4['seminar_teacher4_name']): ?>
                <div class="stylist col-3">
                  <img src="<?php echo $t4['seminar_teacher4_img']; ?>" alt="<?php echo $t4['seminar_teacher4_name']; ?>"
                    class="img-fluid">
                  <h5><span><?php echo $t4['seminar_teacher4_name']; ?></span>氏
                    <?php echo $t4['seminar_teacher4_id']; ?></h5>
                </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <div class="message-from-instructor my-3">
            <div class="heading-text column"><span>担当講師から一言</span></div>
            <div class="message column">
              <!-- 講師からの一言を入れる -->
                <?php echo get_field('seminar_message', $post->ID); ?>
            </div>
          </div>

          <div class="link-to-videos">
            <a type="button" class="btn view-video" data-bs-toggle="modal" data-bs-target="#view-video-<?php echo $post->ID; ?>">動画を視聴する</a>
            <!-- data-bs-targetとmodalのidはview_video_idの値 -->
            <div class="modal fade" id="view-video-<?php echo $post->ID; ?>" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">サンプル動画</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <?php if($t1['youtube_video1']): ?>
                    <!-- youtube_video1のリンク -->
                    <div class="ratio ratio-16x9 text-center mt-4 mb-4">
                      <iframe class="embed-responsive-item" src="<?php echo $t1['youtube_video1']; ?>" style="max-width: 100%;height: 100%;" allowfullscreen></iframe>
                    </div>
                    <?php endif; ?><?php if($t2['youtube_video2']): ?>
                    <!-- youtube_video2のリンク -->
                    <div class="ratio ratio-16x9 text-center mt-4 mb-4">
                      <iframe class="embed-responsive-item" src="<?php echo $t2['youtube_video2']; ?>" style="max-width: 100%;height: 100%;" allowfullscreen></iframe>
                    </div>
                    <?php endif; ?><?php if($t3['youtube_video3']): ?>
                    <!-- youtube_video3のリンク -->
                    <div class="ratio ratio-16x9 text-center mt-4 mb-4">
                      <iframe class="embed-responsive-item" src="<?php echo $t3['youtube_video3']; ?>" style="max-width: 100%;height: 100%;" allowfullscreen></iframe>
                    </div>
                    <?php endif; ?><?php if($t4['youtube_video4']): ?>
                    <!-- youtube_video4のリンク -->
                    <div class="ratio ratio-16x9 text-center mt-4 mb-4">
                      <iframe class="embed-responsive-item" src="<?php echo $t4['youtube_video4']; ?>" style="max-width: 100%;height: 100%;" allowfullscreen></iframe>
                    </div>
                    <?php endif; ?>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
                    <a href="<?php echo get_field('seminar_url', $post->ID); ?>" target="_blank"><button type="button" class="btn btn-primary">本編はこちら</button></a>
                  </div>
                </div>
              </div>
            </div>
        </div>



        </div>
      </div>
    </div>
    <?php endwhile; endif; endforeach; wp_reset_postdata(); ?> 
  </div>
</div>

</div>

<?php
  get_footer();
?>

</body>

</html>