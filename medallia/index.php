<?php get_header(); ?>

<main>            
<?php
get_template_part( 'sections/hp-2024', 'hero' );
get_template_part( 'sections/hp-2024', 'costumer_logos' );
get_template_part( 'sections/hp-2024', 'side_by_side' );
echo do_shortcode('[medallia-carousel carousel="Carousel 2"]');
get_template_part( 'sections/hp-2024', 'costumer_cards' );
echo do_shortcode('[medallia-carousel carousel="Carousel 1"]');
get_template_part( 'sections/hp-2024', 'resources' );
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
        the_content();
	}
}
?>
</main>

<?php get_footer(); ?>