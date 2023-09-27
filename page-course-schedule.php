<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Webber
 */

get_header();
?>

	<main id="primary" class="site-main">
<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	<?php

// Check rows existexists.
if( have_rows('course_schedule') ):

    // Loop through rows.
    while( have_rows('course_schedule') ) : the_row();

        // Load sub field value.
        $sub_date = get_sub_field('date');
		$sub_course = get_sub_field('course');
		$sub_instructor = get_sub_field('instructor');
        // Do something...
echo $sub_date;
    // End loop.
    endwhile;

// No value.
else :
    // Do something...
endif;
?>
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
