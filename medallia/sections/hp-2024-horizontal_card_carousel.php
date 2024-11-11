<section class="home-page__wrap">
    <div class="hp-2024-horizontal-card-carousel">
        <div class="block-title__wrap container">
            <h5><?php echo $args[0]['carousel_title'];?></h5>
        </div>
        <div class="carousel-container">
            <div class="carousel-hp">
                <?php foreach( $args as $card){ ?>
                <div class="carousel-item-hp">
                    <h5 class="top-content"><?php echo $card['content'];?></h5>
                    <div class="bottom-content__wrap">
                        <?php if ( $card['bottom_copy'] ){
                            echo '<h5 class="bottom-copy">'.$card['bottom_copy'].'</h5>';
                        } ?>
                        <div class="card-image">
                            <img src="<?php echo $card['logo'];?>" />
                        </div>
                    </div>
                    <?php if ( $card['link'] ) { ?>
                    <a href="<?php echo $card['link'];?>" class="link-icon__wrap" data-cta-value="resource cta">
                        <svg fill="none" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="m6 12h12m0 0-5-5m5 5-5 5" stroke="#fff" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" />
                        </svg>
                    </a>
                    <?php } ?>
                </div>
                <?php } ?>
            </div>
        </div>

        <div class="nav-arrows hide-small">
            <div class="left">
                <svg width="8" height="16" viewbox="0 0 8 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.742628 14.8136L7.10663 8.44963C7.2941 8.2621 7.39941 8.00779 7.39941 7.74263C7.39941 7.47746 7.2941 7.22316 7.10663 7.03563L0.742628 0.671629" stroke="#CCCCCC" stroke-linecap="round" />
                </svg>
            </div>
            <div class="right">
                <svg width="8" height="16" viewbox="0 0 8 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.742628 14.8136L7.10663 8.44963C7.2941 8.2621 7.39941 8.00779 7.39941 7.74263C7.39941 7.47746 7.2941 7.22316 7.10663 7.03563L0.742628 0.671629" stroke="#CCCCCC" stroke-linecap="round" />
                </svg>
            </div>
        </div>

    </div>
</section>