<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FWD_Starter_Theme
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
            $args = array(
				'post_type'      => 'webber-student',
				'posts_per_page' => -1,
				'order'          => 'ASC',
				'orderby'        => 'title',
			);
			$query = new WP_Query( $args );
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
					?>
                    <article>
                        <a href="<?php the_permalink(); ?>">
                            <h2><?php the_title(); ?></h2>
                            <?php the_post_thumbnail( 'large' ); ?>
                            <?php 
                            $terms = get_the_term_list($post->ID, 'webber-student-category');
                            echo $terms;
                            ?>
                        </a>
                        <?php the_excerpt(); ?>
                    </article>
                    <?php
				}
				wp_reset_postdata();
			}
        endif;
		?>
	</main><!-- #primary -->

<?php

get_footer();