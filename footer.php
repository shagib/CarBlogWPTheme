<s?php
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
			<div class="footer-navigation">
				<div class="site-logo">
					<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/image/car-logo.png" alt="CarBlog Logo" /></a>
                </div>
				<div class="footer-menu">
					<?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) );?>
				</div>
			</div>

			<section class="newsletter-section">
				<h2>Subscribe to our news letter to get latest updates and news</h2>
				<form action="#">
					<input type="email" class="email-field" placeholder="Your Email" required />
					<input type="submit" class="subscribe-btn" value="Subscribe" />
				</form>
			</section>
	
			<div class="site-info">
				<div class="copyright-text">
					<p>Copyright ©2024 CarBlog. All Rights Reserved</p>
				</div>
				<div class="carblog-social-link">
					<a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
				</div>
			</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
