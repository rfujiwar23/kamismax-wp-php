<?php get_header(); ?>



<div class="bg-sub-banner" style="width:100%; aspect-ratio:16/7; background: linear-gradient(180deg, rgba(21,43,68,1) 0%, rgba(181,243,246,0.6) 100%); display:flex; align-items:center; justify-content: center;">
            <div class="contents">
            <h3 class="text-center">検索結果：<q><?php echo get_search_query(); ?></q></h3>
        
    </div>
</div>



<div class="search-result container py-5">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <a href="<?php the_permalink(); ?>" class="list-group-item list-group-item-action small">
                <div class="row my-3">
<!--                     <div class="col-lg-2 col-md-2 col-sm-2 col-3 d-flex align-items-center justify-content-center">
                        <?php

                        if (has_post_thumbnail()) { ?>
                            <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url() ?>" alt="<? echo get_the_title() ?>">
                        <?php } else { ?>
                            <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/image/placeholder.png" alt="<? echo get_the_title() ?>">
                        <?php }

                        ?>

                    </div> -->
                    <div class="read-more" style="padding:0;">
                    <div class="news">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                    <h4 class="time"><i class="las la-clock"></i> 投稿：<?php the_time('Y.m.d') ?></h4>
                    <p class="category"><span><?php the_category(' '); ?></span></p>
                    <p style="margin-bottom:0;"><?php echo mb_substr(get_the_excerpt(), 0, 50) . '...'; ?>
                        <a href="<?php the_permalink(); ?>">もっと読む</a>
                    </p>
                    </div>
                    </div>
                </div>
            </a>
        <?php endwhile;
    else : ?>
        <p><?php esc_html_e('Sorry, no posts matched your criteria.'); ?></p>
    <?php endif; ?>
    <div class="read-more text-center my-4">
            <a class="btn btn-primary" href="/">トップへ戻る</a>
        </div>
</div>

<?php get_footer(); ?>