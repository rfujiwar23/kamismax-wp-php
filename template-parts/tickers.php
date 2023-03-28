<?php
$args = array(
    'post_type' => 'video_list',
    'posts_per_page' => '8',
);
$release_query = new WP_Query($args);
?>




<section class="ticker-area col-lg-10 offset-lg-1 col-md-10 offset-md-1">
    <h2><span>Latest News</span></h2>
    
    <div class="col-lg-10 offset-lg-1">
    <div class="ticker-wrap">
    <div class="ticker-head">NEWS</div>
    <div class="ticker">
    <?php if ($release_query->have_posts()) : ?>
        <div class="ticker">
                <ul>
                    <?php while ($release_query->have_posts()) : $release_query->the_post(); ?>
                        <li class='ticker-item'><a href="<?php echo get_permalink(); ?>">
                        <span><?php the_time('Y.m.d'); ?></span> <?php the_field('video_about'); ?>
                            </a></li>
                    <?php endwhile; ?>
                </ul>
                </div>
    <?php endif;
    wp_reset_postdata(); ?>
    </div>
    </div>
    </div>

</section>




<script>
    (function(window, document) {
  const animTime = 5000; // Animation time (ms)
  const speed = 100; // Text moving speed (px)
  const limit = 0; // Breakpoint (px)
  let animId;
  let isRunning = false;

  const ticker = document.querySelector('.ticker');
  loadTicker();

  function loadTicker() {
    tickerAnim();
    animId = setInterval(tickerAnim, animTime);
    isRunning = true;
  }

  // Animation
  function tickerAnim() {
    const items = ticker.querySelectorAll('.ticker-item');
    const running = ticker.querySelector('.run');
    let idx, link, first, next;
    if (!running) {
      first = items[0];
      link = first.querySelector('a');
      first.classList.add('fadeInDown', 'run');
      first.style.zIndex = 1;
      setTimeout(textMove, 1000, link);
    } else {
      for (let i = 0; i < items.length; i++) {
        if (items[i] == running) {
          idx = i; // Get index of active element
          break;
        }
      }
      next = items[(idx + 1) % items.length];
      running.classList.replace('fadeInDown', 'fadeOutDown');
      setTimeout(() => {
        running.classList.remove('fadeOutDown', 'run');
        running.style.zIndex = 0;
        link = running.querySelector('a');
        link.style.transform = 'none';
        next.classList.add('fadeInDown', 'run');
        next.style.zIndex = 1;
        link = next.querySelector('a');
        setTimeout(textMove, 2000, link);
      }, 300);
    }
  }

  // Text animation
  function textMove(elm) {
    const move = elm.parentNode.clientWidth - elm.clientWidth;
    if (move < 0) {
      elm.style.transform = 'translateX(' + move + 'px)';
      elm.style.transitionDuration = Math.abs(move) / speed + 's';
    }
  }

  // Runs when window is resized
  window.addEventListener('resize', () => {
    const windowWidth = window.innerWidth;
    if (windowWidth <= limit) {
      ticker.style.display = 'none';
      clearInterval(animId);
      isRunning = false;
    } else {
      if (!isRunning) {
        ticker.style.display = 'block';
        animId = setInterval(tickerAnim, animTime);
        isRunning = true;
      }
    }
  });
})(window, document);
</script>

<style>
    .ticker-wrap {
  display: flex;
  background: #4c505a;
  width:100%;
  max-width:640px;
  margin:0 auto;
  padding: 2px;
  border-radius: 5px;
}
.ticker-head {
  width: calc(4em + 8px);
  font-style: italic;
  color: dodgerblue;
  padding: 0 4px;
  display: flex;
  align-items: center;
  justify-content: center;
}
.ticker {
  width: 100%;
  height: 30px;
  font-size: 15px;
  background: #fff;
  line-height: 30px;
  padding: 0 6px;
  overflow: hidden;
}
.ticker ul {
  position: relative;
  list-style: none;
  height: 100%;
  padding: 0;
  margin: 0;
}
.ticker-item {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  padding-right: 0;
  opacity: 0;
}
.ticker-item a {
  display: inline-block;
  width: auto;
  color: #333;
  white-space: nowrap;
  text-decoration: none;
  transition: transform 5s linear;
}
.ticker-item a span {
    font-weight: bold;
}
.ticker-new {
  color: red;
  margin-left: 10px;
  animation: blink 1s ease-in-out infinite alternate;
}
.fadeInDown {
  opacity: 0;
}
.fadeInDown.run {
  animation: fadeInDown 0.3s cubic-bezier(0.645, 0.045, 0.355, 1) forwards;
}
.fadeOutDown {
  opacity: 1;
}
.fadeOutDown.run {
  animation: fadeOutDown 0.3s cubic-bezier(0.645, 0.045, 0.355, 1) forwards;
}
@keyframes fadeInDown {
  0% {
    opacity: 0;
    transform: translateY(-30px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}
@keyframes fadeOutDown {
  0% {
    opacity: 1;
    transform: translateY(0);
  }
  100% {
    opacity: 0;
    transform: translateY(30px);
  }
}
@keyframes blink {
  0%, 100% {
    opacity: 1;
  }
  50% {
    opacity: 0;
  }
}
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

