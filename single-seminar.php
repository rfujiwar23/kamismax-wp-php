<?php

get_header(); ?>

<div class="container px-0">
    <div class="stylist-page d-flex align-items-center justify-content-center">
        <div class="stylist-title">
            <h2>コース</h2>


        </div>
    </div>

</div>
<div class="container">
    <div class="course-contents">
        <div class="row mt-5 mx-0 stylist">
            <pre><?php echo the_field('seminar_details'); ?></pre>
            <pre><?php echo the_field('seminar_points'); ?></pre>
            <pre><?php echo the_field('seminar_target'); ?></pre>
            <pre><?php echo the_field('seminar_message'); ?></pre>
            <div class="seminar color">
                <!-- セミナーのタイトル、担当者  -->
                <div class="seminar-top">
                    <div class="title-area column">
                        <div class="type inner-column-left">
                            <?php echo the_field('seminar_target'); ?>
                            <!-- {Seminar ID} -->
                        </div>
                        <div class="title inner-column-left">
                            ゼミのタイトル 15文字以内で設定
                            <!-- {Seminar Title} -->
                        </div>
                    </div>
                    <div class="instructor column">
                        <div class="title inner-column-right">
                            担当講師
                            <!-- {Seminar Teachers} -->
                        </div>
                        <div class="instructor-list inner-column-right">
                            <!-- 担当講師の一覧、リストで表示してCSSでInline-Blockで表示 -->
                            <ul>
                                <li>{teacher}</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- セミナーの内容 -->
                <div class="seminar-contents">
                    <!-- セミナーの個数 -->
                    <div class="number">
                        <span>全<em><?php echo the_field('seminar_times'); ?></em>回</span>
                    </div>
                    <div class="seminar-details">
                        <!-- 短めの詳細 -->
                        <div class="brief-details">
                            <?php echo the_field('seminar_details'); ?>
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
                                        <p>対象：<?php echo the_field('seminar_target'); ?></p>
                                    </div>
                                </div>
                                <!-- 内容のリスト化 -->
                                <div class="seminar-points">
                                    <!-- <ul>
                                            <li>{seminar points} </li>
                                        </ul> -->
                                    <?php
                                    $list_items1 = explode("<p>", $bulletlist);
                                    echo '<ul>';
                                    foreach ($list_items1 as $list_item) {
                                        if ($list_item != '') {
                                            echo '<li>' . $list_item . '</li>';
                                        }
                                    }
                                    echo '</ul>'; ?>
                                    <p>
                                        <?php echo the_field('seminar_points'); ?>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6 stylists">
                                <div class="instructor-image row d-flex justify-content-center align-items-center">
                                    <!-- loop through instructor -->
                                    <div class="stylist col-3">

                                        <?php
                                        $hero = get_field('seminar_teacher1');
                                        if ($hero) : ?>
                                            <div id="hero">
                                                <div class="content">
                                                    <p><?php echo $hero['seminar_teacher_name_field']; ?><br>
                                                        <?php echo $hero['seminar_teacher1_id']; ?></p>
                                                    <?php
                                                    $post_objects = get_sub_field('seminar_teacher_name1');
                                                    if ($post_objects) : ?>
                                                        <?php foreach ($post_objects as $post) : ?>


                                                            <?php setup_postdata($post); ?>



                                                            <ul>
                                                            <li id="<?php echo esc_attr($post->post_name); ?>" class="stylist">
                                                                
                                                                <?php the_field('lastName'); ?>
                                                                
                                                                    
                                                                </li><!-- /stylist -->
                                                            </ul>
                                                        <?php endforeach; ?>
                                                        <?php wp_reset_postdata(); ?>

                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="message-from-instructor my-3">
                            <div class="heading-text column"><span>担当講師から一言</span></div>
                            <div class="message column">
                                <p><?php echo the_field('seminar_message'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- <div>
        関連動画：
        </div> -->
    </div>
</div>
<?php get_footer(); ?>