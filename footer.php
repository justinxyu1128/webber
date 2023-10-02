<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Webber
 */

?>

	<footer id="colophon" class="site-footer">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php the_custom_logo(); ?></a>
		<div class="site-info">
			<h2>Credits</h2>
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'webber' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'webber' ), 'WordPress' );
				?>
			</a>
			<p>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: Webber', 'webber' ) );
				?>
			</p>
			<p>
				created by <a href="https://justiny.ca/">Justin Yu and Sally Leung</a>
			</p>
		</div><!-- .site-info -->
		<nav class="footer-navigation">
			<h2>Links</h2>
			<?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
		</nav>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
