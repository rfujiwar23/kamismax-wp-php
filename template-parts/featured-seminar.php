<?php
$args = array(
    'post_type' => 'seminar',
);
$release_query = new WP_Query($args);
?>
<div class="">
    <h2>ゼミ一覧</h2>

    <?php if ($release_query->have_posts()) : ?>
        <div class="seminar-list">
            <?php while ($release_query->have_posts()) : $release_query->the_post(); ?>

                <div class="about">
                    <a href="<?php the_field('seminar_url'); ?>" alt="<?php the_title(); ?>">
                        test
                    </a>
                    <h4></h4>
                    
                    <h2>
                        <?php
                        //グループのデータを取得
                        $group = get_field('seminar_teacher1');
                        if ($group) {
                            //グループ内のフィールドを出力
                            echo $group['seminar_teacher1_id'];
                        }
                        ?>
                    </h2>
                </div>

                <div class="seminar color">

                    <div class="seminar-top">
                        <div class="title-area column">
                            <div class="type inner-column-left">
                                <!-- ゼミのID -->
                                ゼミID: <?php the_field('seminar_id'); ?>
                            </div>
                            <div class="title inner-column-left">
                                <!-- ゼミのタイトル 15文字以内で設定 -->
                                <?php the_title(); ?>
                            </div>
                        </div>
                        <div class="instructor column">
                            <div class="title inner-column-right">
                                <!-- 担当講師 -->
                            </div>
                            <div class="instructor-list inner-column-right">
                                <!-- 担当講師の一覧、リストで表示してCSSでInline-Blockで表示 -->
                                <ul>
                                    <li>
                                        <?php
                                        //グループのデータを取得
                                        $group = get_field('seminar_teacher1');
                                        if ($group) {
                                            //グループ内のフィールドを出力
                                            echo $group['seminar_teacher_name_field'];
                                        }
                                        ?>
                                    </li>
                                    <li>
                                        <?php
                                        //グループのデータを取得
                                        $group = get_field('seminar_teacher2');
                                        if ($group) {
                                            //グループ内のフィールドを出力
                                            echo $group['seminar_teacher_name_field'];
                                        }
                                        ?>
                                    </li>
                                    <li>
                                        <?php
                                        //グループのデータを取得
                                        $group = get_field('seminar_teacher3');
                                        if ($group) {
                                            //グループ内のフィールドを出力
                                            echo $group['seminar_teacher_name_field'];
                                        }
                                        ?>
                                    </li>
                                    <li>
                                        <?php
                                        //グループのデータを取得
                                        $group = get_field('seminar_teacher4');
                                        if ($group) {
                                            //グループ内のフィールドを出力
                                            echo $group['seminar_teacher_name_field'];
                                        }
                                        ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- セミナーの内容 -->
                    <div class="seminar-contents">
                        <!-- セミナーの個数 -->
                        <div class="number">
                            <span>全<em>
                                    <?php the_field('seminar_times'); ?>
                                </em>回</span>
                        </div>
                        <div class="seminar-details">
                            <!-- 短めの詳細 -->
                            <div class="brief-details">
                                <?php the_field('seminar_details'); ?>
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
                                            <p>対象：<?php the_field('seminar_target'); ?></p>
                                        </div>
                                    </div>
                                    <!-- 内容のリスト化 -->
                                    <div class="seminar-points">
                                        <!-- <ul>
                                            <li>{seminar points} </li>
                                        </ul> -->
                                        <p>
                                            <?php the_field('seminar_points'); ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6 stylists">
                                    <div class="instructor-image row d-flex justify-content-center align-items-center">
                                        <!-- loop through instructor -->
                                        <div class="stylist col-3">
                                            <img src="{instructor.image}" alt="instructor.name" class="img-fluid">
                                            <h5><span>

                                                    <?php
                                                    //グループのデータを取得
                                                    $group = get_field('seminar_teacher1');
                                                    if ($group) {
                                                        //グループ内のフィールドを出力
                                                        echo $group['seminar_teacher_name_field'];
                                                    }
                                                    ?>
                                                </span>氏<br>


                                                <?php
                                                //グループのデータを取得
                                                $group = get_field('seminar_teacher1');
                                                if ($group) {
                                                    //グループ内のフィールドを出力
                                                    echo $group['seminar_teacher1_id'];
                                                }
                                                ?>

                                                <a href="
                                                <?php 
                                                $group = get_field('seminar_teacher1');
                                                $youtubeLink = $group['seminar_sample_video'];


                                                if (str_contains($youtubeLink, 'https://youtu.be/')) {
                                                    $numletters = trim($youtubeLink, 'https://youtu.be/');
                                                    $newYouTube = 'https://www.youtube.com/embed/' . $numletters;
                                                    echo $newYouTube;
                                                } elseif (str_contains($youtubeLink, 'https://www.youtube.com/watch?v=')){
                                                    $numletters = trim($youtubeLink, 'https://www.youtube.com/watch?v=');
                                                    $newYouTube = 'https://www.youtube.com/embed/' . $numletters;
                                                    echo $newYouTube;
                                                } else {
                                                    echo $youtubeLink;
                                                }
                                                ?>
                                                ">
                                                動画
                                                </a>


                                            </h5>
                                        </div>

                                        <div class="stylist col-3">
                                            <img src="{instructor.image}" alt="instructor.name" class="img-fluid">
                                            <h5><span>

                                                    <?php
                                                    //グループのデータを取得
                                                    $group = get_field('seminar_teacher1');
                                                    if ($group) {
                                                        //グループ内のフィールドを出力
                                                        echo $group['seminar_teacher_name_field'];
                                                    }
                                                    ?>
                                                </span>氏<br>


                                                <?php
                                                //グループのデータを取得
                                                $group = get_field('seminar_teacher1');
                                                if ($group) {
                                                    //グループ内のフィールドを出力
                                                    echo $group['seminar_teacher1_id'];
                                                }
                                                ?>

                                                <a href="
                                                <?php 
                                                $group = get_field('seminar_teacher1');
                                                $youtubeLink = $group['seminar_sample_video'];


                                                if (str_contains($youtubeLink, 'https://youtu.be/')) {
                                                    $numletters = trim($youtubeLink, 'https://youtu.be/');
                                                    $newYouTube = 'https://www.youtube.com/embed/' . $numletters;
                                                    echo $newYouTube;
                                                } elseif (str_contains($youtubeLink, 'https://www.youtube.com/watch?v=')){
                                                    $numletters = trim($youtubeLink, 'https://www.youtube.com/watch?v=');
                                                    $newYouTube = 'https://www.youtube.com/embed/' . $numletters;
                                                    echo $newYouTube;
                                                } else {
                                                    echo $youtubeLink;
                                                }
                                                ?>
                                                ">
                                                動画
                                                </a>


                                            </h5>
                                        </div>

                                        <div class="stylist col-3">
                                            <img src="{instructor.image}" alt="instructor.name" class="img-fluid">
                                            <h5><span>

                                                    <?php
                                                    //グループのデータを取得
                                                    $group = get_field('seminar_teacher1');
                                                    if ($group) {
                                                        //グループ内のフィールドを出力
                                                        echo $group['seminar_teacher_name_field'];
                                                    }
                                                    ?>
                                                </span>氏<br>


                                                <?php
                                                //グループのデータを取得
                                                $group = get_field('seminar_teacher1');
                                                if ($group) {
                                                    //グループ内のフィールドを出力
                                                    echo $group['seminar_teacher1_id'];
                                                }
                                                ?>

                                                <a href="
                                                <?php 
                                                $group = get_field('seminar_teacher1');
                                                $youtubeLink = $group['seminar_sample_video'];


                                                if (str_contains($youtubeLink, 'https://youtu.be/')) {
                                                    $numletters = trim($youtubeLink, 'https://youtu.be/');
                                                    $newYouTube = 'https://www.youtube.com/embed/' . $numletters;
                                                    echo $newYouTube;
                                                } elseif (str_contains($youtubeLink, 'https://www.youtube.com/watch?v=')){
                                                    $numletters = trim($youtubeLink, 'https://www.youtube.com/watch?v=');
                                                    $newYouTube = 'https://www.youtube.com/embed/' . $numletters;
                                                    echo $newYouTube;
                                                } else {
                                                    echo $youtubeLink;
                                                }
                                                ?>
                                                ">
                                                動画
                                                </a>


                                            </h5>
                                        </div>

                                        <div class="stylist col-3">
                                            <img src="{instructor.image}" alt="instructor.name" class="img-fluid">
                                            <h5><span>

                                                    <?php
                                                    //グループのデータを取得
                                                    $group = get_field('seminar_teacher1');
                                                    if ($group) {
                                                        //グループ内のフィールドを出力
                                                        echo $group['seminar_teacher_name_field'];
                                                    }
                                                    ?>
                                                </span>氏<br>


                                                <?php
                                                //グループのデータを取得
                                                $group = get_field('seminar_teacher1');
                                                if ($group) {
                                                    //グループ内のフィールドを出力
                                                    echo $group['seminar_teacher1_id'];
                                                }
                                                ?>

                                                <a href="
                                                <?php 
                                                $group = get_field('seminar_teacher1');
                                                $youtubeLink = $group['seminar_sample_video'];


                                                if (str_contains($youtubeLink, 'https://youtu.be/')) {
                                                    $numletters = trim($youtubeLink, 'https://youtu.be/');
                                                    $newYouTube = 'https://www.youtube.com/embed/' . $numletters;
                                                    echo $newYouTube;
                                                } elseif (str_contains($youtubeLink, 'https://www.youtube.com/watch?v=')){
                                                    $numletters = trim($youtubeLink, 'https://www.youtube.com/watch?v=');
                                                    $newYouTube = 'https://www.youtube.com/embed/' . $numletters;
                                                    echo $newYouTube;
                                                } else {
                                                    echo $youtubeLink;
                                                }
                                                ?>
                                                ">
                                                動画
                                                </a>


                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="message-from-instructor my-3">
                                <div class="heading-text column"><span>担当講師から一言</span></div>
                                <div class="message column">
                                    <?php the_field('seminar_message'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endwhile; ?>
        </div>
    <?php endif;
    wp_reset_postdata(); ?>

</div>