<div class="ticker">
    <div class="ticker__inner">
        <div class="ticker__item">
            <?php
            $args = array(
                'post_type' => 'ticker',
                'posts_per_page' => -1,
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
                    $title = get_the_title();
                    $content = get_the_content();
                    $ciudad = get_field('city');
                    $image = get_field('image');
                    $position = get_field('position');
                    $score = get_field('score');
            ?>
                    <div class="ticker__item">
                        <div class="ticker-item__wrap">
                            <div class="ticker-item-front-card" style="background-image:url(<?php echo $image; ?>)">
                                <div class="ticker-item-front-card-overlay"></div>
                                <div class="ticker-item-front-card-content__wrap">
                                    <h5 class="ticker-item-front-card-name"><?php echo esc_html($title); ?></h5>
                                    <h5 class="ticker-item-front-card-location">
                                        <?php echo esc_html($ciudad); ?> </h5>
                                    <div class="ticker-item-front-card-persona__wrap">
                                        <h5 class="ticker-item-front-card-persona">
                                            <?php echo esc_html($position); ?> </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="ticker-item-back-card">
                                <div class="ticker-item-back-person__wrap">
                                    <div class="image-circle" style="background-image:url(<?php echo $image; ?>)"></div>
                                    <div class="ticker-item-back-person-name__wrap">
                                        <div>
                                            <h5 class="ticker-item-back-person-name-name">
                                                <?php echo esc_html($title); ?> </h5>
                                            <h5 class="ticker-item-back-person-name-location">
                                                <?php echo esc_html($ciudad); ?> </h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="ticker-item-back-qualities__wrap">
                                    <div class="ticker-item-custom">
                                        <?php echo $content; ?>
                                    </div>
                                </div>
                                <div class="ticker-item-back-extra-info__wrap">
                                    <div class="ticker-item-back-extra-info-type__wrap">
                                        <p class="ticker-item-back-extra-info-type">
                                            <?php echo esc_html($position); ?> </p>
                                    </div>
                                    <?php if ($score <= 5) {
                                        echo '<div class="ticker-item-back-extra-info-score__wrap yellow">
                                <p class="ticker-item-back-extra-info-score">';
                                        echo sanitize_text_field($score) . '/10 </p><img src="' . get_template_directory_uri() . '/img/face/face-mid.svg">';
                                    } else {
                                        echo '<div class="ticker-item-back-extra-info-score__wrap green">
                                <p class="ticker-item-back-extra-info-score">';
                                        echo sanitize_text_field($score) . '/10 </p><img src="' . get_template_directory_uri() . '/img/face/face-happy.svg">';
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
<?php
                }
                // Restore the original post data.
                wp_reset_postdata();
            } else {
                echo '<p>No posts found.</p>';
            }
?>
    </div>
</div>
</div>