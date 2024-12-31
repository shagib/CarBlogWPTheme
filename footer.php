<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CarBlog
 */

?>
	<footer class="site-footer">
		<div class="container">
			<section class="newsletter-section">
				
				<h2>Subscribe to our news letter to get latest updates and news</h2>
				<form action="#">
					<input type="email" class="email-field" placeholder="Your Email" required />
					<input type="submit" class="subscribe-btn" value="Subscribe" />
				</form>
				
			</section>
	
			<div class="site-info">
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'carblog' ) ); ?>">
					<?php
					/* translators: %s: CMS name, i.e. WordPress. */
					printf( esc_html__( 'Proudly powered by %s', 'carblog' ), 'WordPress' );
					?>
				</a>
				<span class="sep"> | </span>
					<?php
					/* translators: 1: Theme name, 2: Theme author. */
					printf( esc_html__( 'Theme: %1$s by %2$s.', 'carblog' ), 'carblog', '<a href="http://underscores.me/">Underscores.me</a>' );
					?>
			</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
