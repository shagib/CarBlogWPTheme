<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package CarBlog
 */



 get_header(); ?>

<div class="single-post">
    <!-- Featured Image -->
    <?php if (has_post_thumbnail()) : ?>
        <div class="featured-image">
            <?php the_post_thumbnail('full'); ?>
        </div>
    <?php endif; ?>

    <!-- Title and Meta -->
    <div class="post-header">
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

    <!-- Categories Section -->
	<div class="category-section">
		<h2>All Categories</h2>
		<div class="category-grid">
			<?php
			$categories = get_categories();
			foreach ($categories as $category) :
				$image = get_field('category_image', 'category_' . $category->term_id); // Get the custom image field
				?>
				<div class="category-item">
					<a href="<?php echo get_category_link($category->term_id); ?>">
						<?php if ($image) : ?>
							<div class="category-image">
								<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($category->name); ?>" />
							</div>
						<?php endif; ?>
						<h3><?php echo $category->name; ?></h3>
						<p><?php echo $category->description; ?></p>
					</a>
				</div>
			<?php endforeach; ?>
		</div>
	</div>

</div>

<?php get_footer(); ?>

