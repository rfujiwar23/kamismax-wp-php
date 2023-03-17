<?php 
  global $title;
  $page = get_post(get_page_by_path('course'));
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

<div class="container-fluid pb-5" id="list">
  <div class="clist py-4">
    <div class="course-table">
      <ul class="nav">
        <li>ベーシック</li>
        <li>スタンダード</li>
        <li>ハイレベル</li>
      </ul>
      <ul class="snav s1">
        <li data-name="カット">CUT</li>
        <li data-name="カラー">COLOR</li>
        <li data-name="パーマ">PERM</li>
        <li data-name="ストレート">STRAIGHT</li>
        <li data-name="デジタルパーマ">DIGITAL PERM</li>
      </ul>
      <ul class="snav s2">
      <li data-name="カット">CUT</li>
        <li data-name="カラー">COLOR</li>
        <li data-name="パーマ">PERM</li>
        <li data-name="ストレート">STRAIGHT</li>
        <li data-name="デジタルパーマ">DIGITAL PERM</li>
      </ul>
      <ul class="snav s3">
      <li data-name="カット">CUT</li>
        <li data-name="カラー">COLOR</li>
        <li data-name="パーマ">PERM</li>
        <li data-name="ストレート">STRAIGHT</li>
        <li data-name="デジタルパーマ">DIGITAL PERM</li>
      </ul>
      <div class="show-contents">
        <?php
          $query = new WP_Query(array(
            'post_status' => 'publish',
            'post_type' => $post_type,
            'posts_per_page' => -1,
            'orderby' => 'menu_order',
            'order' => 'ASC',
            /*
            'tax_query' => array(
              array(
                'taxonomy' => 'level',
                'field' => 'slug',
                'terms' => $level->slug,
              ),
              array(
                'taxonomy' => 'skill',
                'field' => 'slug',
                'terms' => $skill->slug,
              ),
              array(
                'taxonomy' => 'hairstyle',
                'field' => 'slug',
                'terms' => $hairstyle->slug,
              )
            ),
            */
          ));

          $levels = get_terms('level');
          $skills = get_terms('skill');
          $hairstyles = get_terms('hairstyle');
          foreach($levels as $level) :
            foreach($skills as $skill) :
        ?> 
        

        <?php $terms = wp_get_post_terms( $post_id, $taxonomy, $args ); ?>
        
        <div class="cont">
            <!-- <pre><?php echo $terms; ?></pre> -->
            
          <?php foreach($hairstyles as $hairstyle) : ?> 

          <?php
            $prev_hairstyle = '';
            while( $query->have_posts() ):
            $query->the_post();

            if( in_array($level, get_the_terms($post->ID, 'level'))
              && in_array($skill, get_the_terms($post->ID, 'skill'))
              && in_array($hairstyle, get_the_terms($post->ID, 'hairstyle')) ) :
              if($prev_hairstyle !== $hairstyle->name) :

            $termsArray = get_the_terms( $post->ID, "skill" ); 
            $termsString = ""; 
              foreach ( $termsArray as $term ) { 
                $termsString .= $term->slug.' '; 
            }

            $levelsArray = get_the_terms( $post->ID, "level" );  
            $levelsString = ""; 
              foreach ( $levelsArray as $level ) { 
                $levelsString .= $level->slug.' '; 
            }



            
          ?>
          <!--   -->
          <dl class="list_table d-flex <?php echo $termsString; ?><?php echo $levelsString;?>">
            <dt><?php echo $hairstyle->name; ?>
            </dt>
            <dd>
              <div class="row p-0 g-0">
                <div class="column table-header">種類</div>
                <div class="column table-header">サロン</div>
                <div class="column table-header">スタイリスト</div>
                <div class="column table-header">講座ID</div>
                <div class="column table-header">プレビュー</div>
              </div>
              <?php endif; ?>
              <div class="row g-0">
                <div class="column type"><?php echo get_field('course_kinds', $post->ID); ?></div>
                <div class="column"><?php echo get_field('course_salon', $post->ID); ?></div>
                <div class="column"><?php echo get_field('course_stylist', $post->ID); ?></div>
                <div class="column"><?php echo get_field('course_id', $post->ID); ?></div>
                <div class="column">
                  <button type="button" class="btn btn-primary video-btn" data-bs-toggle="modal"
                    data-src="<?php echo get_field('course_sample_url', $post->ID); ?>" data-bs-target="#id<?php echo $post->ID; ?>">
                    動画を視聴する
                  </button>
                </div>
                <div class="modal fade" id="id<?php echo $post->ID; ?>" tabindex="-1" aria-labelledby="stylistModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="stylistModalLabel">サンプル動画</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="ratio ratio-16x9">
                          <iframe width="560" height="315" src="<?php echo get_field('course_sample_url', $post->ID); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a href="<?php echo get_field('course_mov_url', $post->ID); ?>" target="_blank"><button type="button" class="btn btn-primary">本編はこちら</button></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="course-details">
              <p>level：<?php echo $levelsString;?><br>type：<?php echo $termsString; ?></p>
              <p>要略：<?php echo get_field('course_details', $post->ID); ?></p>
              </div>
              <?php $prev_hairstyle = $hairstyle->name; endif; endwhile; ?> 

            </dd>
          </dl>
        <?php endforeach; ?> 
        </div>
        <?php endforeach; endforeach; wp_reset_postdata(); ?> 
      </div>
    </div>

    <div class="d-flex justify-content-center">
      <a href="" target="_blank" class="my-4 btn video-list-data" id="video-list-data"><span id="video-list-data-name"></span>コース一覧<br>（会員の方はこちらから本編映像をご覧いただけます）</a>
    </div>

  </div>
</div>


<div class="filters">

  <div class="ui-group">
    <h3>レベル</h3>
    <div class="button-group js-radio-button-group" data-filter-group="color">
      <button class="button is-checked" data-filter="">ALL</button>
      <button class="button" data-filter=".basic">ベーシック</button>
      <button class="button" data-filter=".standard">スタンダード</button>
      <button class="button" data-filter=".high">ハイレベル</button>
    </div>
  </div>

  <div class="ui-group">
    <h3>サイズ</h3>
    <div class="button-group js-radio-button-group" data-filter-group="size">
      <button class="button" data-filter="">ALL</button>
      <button class="button is-checked" data-filter=".Cut">カット</button>
      <button class="button" data-filter=".Color">カラー</button>
      <button class="button" data-filter=".Perm">パーマ</button>
      <button class="button" data-filter=".Straight">ストレート</button>
    </div>
  </div>



</div>

<div class="grid">
  <div class="salon-info-block Cut basic">ABBEY</div>
  <div class="salon-info-block Cut standard">PEEK A BOO</div>
  <div class="salon-info-block Cut high">SYAN</div>
  <div class="salon-info-block Cut basic">BEAUTRIUM</div>
  <div class="salon-info-block Cut standard">OCEAN TOKYO</div>
  <div class="salon-info-block Cut high">iLe</div>
  <div class="salon-info-block Color basic">MINX</div>
  <div class="salon-info-block Color standard">ZeLo</div>
  <div class="salon-info-block Color high">LUXE</div>
  <div class="salon-info-block Color basic">Violet</div>
  <div class="salon-info-block Color standard">Sun Valley</div>
  <div class="salon-info-block Color high">grico</div>
  <div class="salon-info-block Perm basic">sleepy</div>
  <div class="salon-info-block Perm standard">loness</div>
  <div class="salon-info-block Perm high">THE GARDEN TOKYO</div>
  <div class="salon-info-block Perm basic">FILMS</div>
  <div class="salon-info-block Perm standard">Men's Lapis</div>
  <div class="salon-info-block Perm high">AI TOKYO</div>
  <div class="salon-info-block Straight basic">Dayt</div>
  <div class="salon-info-block Straight standard">Genuine</div>
  <div class="salon-info-block Straight high">ANTI</div>
  <div class="salon-info-block Straight basic">Cocoon</div>
  <div class="salon-info-block Straight standard">APISH</div>
  <div class="salon-info-block Straight high">cache cache</div>
</div>

<?php
  get_footer();
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script>
    $(document).ready(function() {
      "use strict"

      $('.modal').on('hidden.bs.modal', function (e) {
        $iframe = $(this).find("iframe");
        $iframe.attr("src", $iframe.attr("src"));
      });

      $(".nav li").click(function() {
        var idx = $(this).index();
        $(".snav").hide();
        $(".nav li").removeClass("on");
        $(this).addClass("on");
        var $snav = $(".snav.s" + (idx + 1));
        $snav.show();
        $snav.find("li").eq(0).trigger("click");
      });

      $(".snav li").click(function() {
        var tabNum = $(this).parent("ul").attr("class").replace("snav s", "");
        var idx = $(this).index() + 1;
        $(".snav li").removeClass("on");
        $(this).addClass("on");
        $(".cont").hide();
        $(".cont" + tabNum + "_" + idx).show();
        const level = $('.nav li').eq((tabNum - 1)).text();
        const skill = $(this).data('name');
        $("#video-list-data").attr('href', 'https://kamismax.kamisma.com/search?words=' + level + skill + 'コース');
        $("#video-list-data-name").text(level + skill);
      });

      tabInit(0);
    });

    function tabInit(index) {
      $(".nav li").eq(index).trigger("click");
    }
  </script>


  
</body>

<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
    <script>

      // external js: isotope.pkgd.js

// init Isotope
var $grid = $('.grid').isotope({
  itemSelector: '.salon-info-block',
  filter: '.basic',
});

// store filter for each group
var filters = {};

$('.filters').on( 'click', '.button', function( event ) {
  var $button = $( event.currentTarget );
  // get group key
  var $buttonGroup = $button.parents('.button-group');
  var filterGroup = $buttonGroup.attr('data-filter-group');
  // set filter for group
  filters[ filterGroup ] = $button.attr('data-filter');
  // combine filters
  var filterValue = concatValues( filters );
  // set filter for Isotope
  $grid.isotope({ filter: filterValue });

  console.log(filterValue);
});

// change is-checked class on buttons
$('.button-group').each( function( i, buttonGroup ) {
  var $buttonGroup = $( buttonGroup );
  $buttonGroup.on( 'click', 'button', function( event ) {
    $buttonGroup.find('.is-checked').removeClass('is-checked');
    var $button = $( event.currentTarget );
    $button.addClass('is-checked');
  });
});

// flatten object by concatting values
function concatValues( obj ) {
  var value = '';
  for ( var prop in obj ) {
    value += obj[ prop ];
  }
  return value;
}

    </script>



</html>