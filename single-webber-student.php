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
			get_template_part( 'template-parts/content', get_post_type() );
			$taxonomy = 'webber-student-category';
			$terms    = get_terms(
				array(
					'taxonomy' => $taxonomy,
				)
			);
			if ( $terms && ! is_wp_error( $terms ) ) {
				foreach ( $terms as $term ) {
					$args = array(
						'post_type'      => 'webber-student',
						'posts_per_page' => -1,
						'order'          => 'ASC',
						'orderby'        => 'title',
						'tax_query'      => array(
							array(
								'taxonomy' => $taxonomy,
								'field'    => 'slug',
								'terms'    => $term->slug,
							),
						),
					);
					$query1 = new WP_Query( $args );
					if ( $query1->have_posts() ) {
						// Output Term name.
						echo '<h2>' . esc_html( $term->name ) . '</h2>';
						// Output Content.
						while ( $query1->have_posts() ) {
							$query1->the_post();
							?>
								<a href="<?php the_permalink(); ?>">
									<h3><?php the_title(); ?></h2>
								</a>
							<?php
							
						}
						wp_reset_postdata();
					}
				}
			}
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
