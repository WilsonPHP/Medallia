<?php
            $args = array(
                'post_type' => 'resource',
                'posts_per_page' => 4,
                'ignore_sticky_posts'=> 1
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
                    $resources[] = [
                        'title' => get_the_title(),
                        'content' => get_the_content(),
                        'resource_type' => get_field('resource_type'),
                        'read_time' => get_field('read_time'),
                        'image' => get_field('image'),
                        'link' => get_field('link')
                    ];
                }
            }
?>
<section class="home-page__wrap">
    <div class="hp-2024-resources">
        <div class="block-title__wrap container">
            <h5>Resources</h5>
        </div>
        <div class="container">
            <div class="primary-resource__wrap">
                <a href="<?php echo $resources[0]['link'];?>" class="resource-link">
                    <div class="image__wrap" style="background-image: url(<?php echo $resources[0]['image'];?>)">
                    </div>
                    <div class="content__wrap">
                        <h6 class="resource-type"><?php echo $resources[0]['resource_type'];?></h6>
                        <div class="resource-title__wrap">
                            <h5><?php echo $resources[0]['title'];?></h5>
                            <div class="underline"></div>
                        </div>
                        <div class="resource-content">
                            <?php echo $resources[0]['content'];?>
                        </div>
                    </div>
                </a>
            </div>
            <div class="secondary-resouces__wrap">
                <?php for($i = 1; $i <= 3; $i++) {?>
                <a href="<?php echo $resources[$i]['link'];?>" class="secondary-resource-item resource-link">
                    <div class="image__wrap" style="background-image: url(<?php echo $resources[$i]['image'];?>)">
                        <?php if ( $resources[$i]['read_time'] ){ ?>
                                <div class="read-time__wrap">
                                    <p class="read-time"><?php echo $resources[$i]['read_time']; ?> min</p>
                                </div>
                        <?php } ?>
                    </div>
                    <div class="content__wrap">
                        <h6 class="resource-type"><?php echo $resources[$i]['resource_type'];?></h6>
                        <div class="resource-title__wrap">
                            <h5><?php echo $resources[$i]['title'];?></h5>
                            <div class="underline"></div>
                        </div>
                        <div class="resource-content">
                            <?php echo $resources[$i]['content'];?>
                        </div>
                    </div>
                </a>
                <?php } ?>
            </div>
        </div>
    </div>
</section>