<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CarBlog
 */

get_header();
?>

	<main id="primary" class="site-main">
		<section class="hero-section">
			<div class="container">
				<div class="hero-content">
					<h1>Your Journey, Your Car, Your Way</h1>
					<p>Explore the latest car trends, news, and stories.</p>
				</div>
			</div>
		</section>

		<section class="blog-posts-section">
			<div class="container">
				<h2>All Posts</h2>
				<div class="posts-grid">
					<?php
					if (have_posts()) : while (have_posts()) : the_post(); ?>
						<div class="post-item">
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail(); ?>
								<h3><?php the_title(); ?></h3>
							</a>
							<p><?php the_excerpt(); ?></p>
						</div>
					<?php endwhile; endif; ?>
				</div>
			</div>
		</section>


	</main><!-- #main -->



<?php get_footer(); ?>
