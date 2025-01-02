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
				<div class="hero-wrapper">
					<div class="section-content">
						<h1 class="title">Your Journey, Your Car, Your Way</h1>
						<p class="desc">Lorem ipsum dolor sit amet consectetur. Diam volutpat morbi elementum vel euismod aliquam. Amet ultrices neque augue consectetur purus phasellus. Ullamcorper lorem montes varius amet vestibulum tellus facilisis consequat pretium. Et faucibus laoreet molestie diam semper fames diam eget.</p>
						<a href="#" type="btn" class="subscribe-btn">Subscribe<i class="fa-regular fa-paper-plane"></i></a>
					</div>
					<div class="feature-image">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/image/car-white-color.jpg" alt="" class="img-1">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/image/car-yellow.jpg" alt="" class="img-2">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/image/car-black.jpg" alt="" class="img-4">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/image/driving.jpg" alt="" class="img-3">
					</div>
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
							<div class="feature-image">
								<?php the_post_thumbnail(); ?>
							</div>
							<div class="blog-content">
								<a href="<?php the_permalink(); ?>">
									<h3 class="title"><?php the_title(); ?></h3>
								</a>
								<div class="writer-details">
                                    <div class="avatar">
                                        <?php echo get_avatar(get_the_author_meta('ID'), 40); ?>
                                    </div>
                                    <p class="author-info">
                                        <span class="author-name"><?php echo get_the_author(); ?></span>
                                        <span class="date">
                                            <?php echo get_the_date('M j, Y') . '  |  ' . get_post_views(get_the_ID()) . ' Views'; ?>
                                        </span>
                                    </p>
                                </div>
								<p class="desc"><?php the_excerpt(); ?></p>
								<a class="btn read-more" href="<?php the_permalink(); ?>">Read full article...</a>
							</div>
							
							
						</div>
					<?php endwhile; endif; ?>
				</div>
			</div>
		</section>


	</main><!-- #main -->



<?php get_footer(); ?>
