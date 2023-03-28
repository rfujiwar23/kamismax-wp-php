<?php

/**
 * Template Name: セミナーページ
 */

get_header(); ?>


<div class="container">
<?php get_template_part('template-parts/featured-curriculum'); ?>
</div>

<!-- <div class="filters">

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
      <button class="button is-checked" data-filter=".Cut">Cut</button>
      <button class="button" data-filter=".Color">Color</button>
      <button class="button" data-filter=".Perm">Perm</button>
      <button class="button" data-filter=".Straight">Straight</button>
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
</div> -->


<?
get_footer(); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
    <script>

      // external js: isotope.pkgd.js

// init Isotope
var $grid = $('.grid').isotope({
  itemSelector: '.salon-info-block'
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