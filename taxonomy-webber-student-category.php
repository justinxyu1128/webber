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

<?php if ( have_posts() ) : ?>

	<header class="page-header">
		<?php
		single_term_title( '<h1 class="page-title">', '</h1>' );
		// maybe delete the h1 part
		the_archive_description( '<div class="archive-description">', '</div>' );
		?>
	</header><!-- .page-header -->

	<?php
	/* Start the Loop */
	while ( have_posts() ) :
		the_post();
		?>
		<article>
			<a href="<?php the_permalink(); ?>">
				<h2><?php the_title(); ?></h2>
				<?php the_post_thumbnail( 'student-portrait' ); ?>
			</a>
			<?php the_content(); ?>
		</article>
	<?php
	endwhile;

else :

	get_template_part( 'template-parts/content', 'none' );

endif;
?>

</main><!-- #primary -->

<?php
get_sidebar();
get_footer();
