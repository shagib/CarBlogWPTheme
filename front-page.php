<?php get_header(); ?>

<section class="hero-section" style="background: url('<?php echo get_template_directory_uri(); ?>/assets/image/car.png');>;">
   <div class="container">
       <div class="row">
            <div class="col-md-6">
                <div class="hero-content">
                    <h1 class="title">Your Journey, Your Car, Your Way</h1>
                    <p class="description">Lorem ipsum dolor sit amet consectetur. Diam volutpat morbi elementum vel euismod aliquam. Amet ultrices neque augue consectetur purus phasellus. Ullamcorper lorem montes varius amet vestibulum tellus facilisis consequat pretium. Et faucibus laoreet molestie diam semper fames diam eget.</p>
                    <a href="#latest-posts" class="btn">Subscribe</a>
                </div>
            </div>
            <div class="col-md-6">
                
            </div>
       </div>
   </div>
</section>


<section class="latest-trending-posts">
   <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="latest-posts">
                    <h3>Latest</h3>
                    <div id="post-content">
                        <?php
                        $latest_posts = new WP_Query(array('posts_per_page' => 1));
                        if ($latest_posts->have_posts()) : while ($latest_posts->have_posts()) : $latest_posts->the_post(); ?>
                            <div class="post-item">
                                <div class="thumbnail-wrapper">
                                    <?php the_post_thumbnail(); ?>
                                </div>
                                <div class="writer">
                                   <p>By
                                        <span class="author">
                                            <?php the_author();?>
                                        </span>
                                        <span class="duration">
                                            <?php the_date() ?>
                                        </span>
                                   </p>
                                </div>
                               
                                <a href="<?php the_permalink(); ?>" class="blog-title">
                                    <h3><?php the_title(); ?></h3>
                                </a>
                                <div class="short-desc">
                                    <p><?php the_excerpt(); ?></p>
                                </div>
                                <a class="btn read-more" href="<?php the_permalink(); ?>">Read More</a>
                                
                            </div>
                        <?php endwhile; endif; wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="trending-posts">
                    <h3>Trending Blogs</h3>
                    <ul id="blog-titles">
                        <?php 
                        $trending_posts = new WP_Query(array('posts_per_page' => 5, 'offset' => 1)); 
                        if ($trending_posts->have_posts()) : while ($trending_posts->have_posts()) : $trending_posts->the_post(); ?>
                            <li class="blog-title" data-id="<?php the_ID(); ?>">
                                <div class="writer-details">
                                    <span>By</span>
                                    <p class="author"><?php echo get_the_author(); ?></p>
                                    <p class="duration"><?php echo get_the_date(); ?></p>
                                </div>
                                <h3 class="title"><?php the_title(); ?></h3>
                            </li>
                        <?php endwhile; endif; wp_reset_postdata(); ?>
                    </ul>
                </div>
            </div>
        </div>
   </div>
</section>

<section class="category-section">
    <div class="container">
        <h2>Categories</h2>
        <div class="categories-grid">
            <?php
            $categories = get_categories();
            foreach ($categories as $category) : ?>
                <div class="category-item">
                    <a href="<?php echo get_category_link($category->term_id); ?>">
                        <div class="category-image">
                            <!-- Use dynamic image loading here -->
                            
                        </div>
                        <h3><?php echo $category->name; ?></h3>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="featured-section">
    <div class="container">
        <h2>New Technology</h2>
        <div class="posts-grid">
            <?php
            $featured_posts = new WP_Query(array('posts_per_page' => 3, 'category_name' => 'technology'));
            if ($featured_posts->have_posts()) : while ($featured_posts->have_posts()) : $featured_posts->the_post(); ?>
                <div class="post-item">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail(); ?>
                        <h3><?php the_title(); ?></h3>
                    </a>
                </div>
            <?php endwhile; endif; wp_reset_postdata(); ?>
        </div>
    </div>
</section>

<section class="newsletter-section">
  <div class="container">
        <h2>Subscribe to our newsletter</h2>
        <form action="#">
            <input type="email" placeholder="Your Email" required />
            <button type="submit">Subscribe</button>
        </form>
  </div>
</section>


<?php get_footer(); ?>
