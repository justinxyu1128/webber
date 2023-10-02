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
 * @package FWD_Starter_Theme
 */

get_header();
?>

<main id="primary" class="site-main">

<?php
while ( have_posts() ) :
	the_post();
	?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header>

		<div class="entry-content">
			<?php the_content(); ?>
			<?php
			$taxonomy = 'webber-staff-category';
			$terms    = get_terms(
				array(
					'taxonomy' => $taxonomy,
				)
			);
			if ( $terms && ! is_wp_error( $terms ) ) {
				foreach ( $terms as $term ) {
					$args = array(
						'post_type'      => 'webber-staff',
						'posts_per_page' => -1,
						'tax_query'      => array(
							array(
								'taxonomy' => $taxonomy,
								'field'    => 'slug',
								'terms'    => $term->slug,
							),
						),
					);
					$query = new WP_Query( $args );
					if ( $query->have_posts() ) {
						// Output Term name.
						echo '<h2>' . esc_html( $term->name ) . '</h2>';
						echo '<div class="staff-wrapper">';
						// Output Content.
						while ( $query->have_posts() ) {
							$query->the_post();
							echo '<article>';
							if ( function_exists( 'get_field' ) ) {
								if ( get_field( 'staff_bio' ) ) {
									echo '<h3 id="' . esc_attr( get_the_ID() ) . '">' . esc_html( get_the_title() ) . '</h3>';
									the_field( 'staff_bio' );
								}
                                if ( $term->name == 'Faculty') {
                                    if ( get_field( 'courses' ) ) {
                                        echo '<p>' . 'Courses: ' . get_field( 'courses' ) . '</p>';
                                    }
                                    if ( get_field( 'website' ) ) {
                                        echo '<a href="' . get_field( 'website' ) . '">' . 'Instructor Website' . '</a>';
                                    }
                                }
							}
							echo '</article>';
						}
						echo '</div>';
						wp_reset_postdata();
					}
				}
			}
			?>
		</div>

	</article>

<?php endwhile; ?>

</main><!-- #primary -->

<?php
get_sidebar();
get_footer();