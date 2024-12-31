<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package CarBlog
 */



 get_header(); ?>

	<section class="single-post">
		<div class="container">
			<!-- Featured Image -->
			<?php if (has_post_thumbnail()) : ?>
			<div class="featured-image">
				<?php the_post_thumbnail('full'); ?>
			</div>
			<?php endif; ?>

			<!-- Title and Meta -->
			<div class="post	-header">
				<h1><?php the_title(); ?></h1>
				<div class="post-meta">
					<span><?php the_author(); ?></span> |
					<span><?php the_date(); ?></span> |
					<span>3 Min Read</span>
				</div>
			</div>

			<!-- Content -->
			<div class="post-content">
				<?php the_content(); ?>
			</div>
		</div>
	</section>

	<section class="comments-section">
		<div class="container">
			<div class="comments">
				<?php
				// Display the comments section
				if (comments_open() || get_comments_number()) :
					comments_template();
				endif;
				?>
			</div>
		</div>
	</section>
    <!-- Categories Section -->
	<section class="category-section">
		<div class="container">
			<div class="section-title-wrapper">
				<h4 class="sec-title">All Category </h4>
			</div>
			<div class="category-list">
				<?php
			
				$categories = get_categories(); 
				foreach ($categories as $category) :
					$category_image = get_field('category_image', 'category_' . $category->term_id); 
					
				?>
					<div class="category-item">
						<a href="<?php echo get_category_link($category->term_id); ?>" class="category-item">
							<div class="category-image">
								<!-- Use dynamic image loading here -->
								<?php 
								if ($category_image):
									$category_image_url = wp_get_attachment_url($category_image);
								?>
									<img src="<?php echo esc_url($category_image_url); ?>" alt="<?php echo esc_attr($category->name); ?>">
								<?php endif; ?>           

							</div>
							<h3 class="cat-name"><?php echo $category->name; ?></h3>
							<p class="cat-desc"><?php echo $category->description;?></p>
						</a>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>



<?php get_footer(); ?>

