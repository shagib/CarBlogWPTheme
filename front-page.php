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
                    <div>
                        <h3>Trending Blogs</h3>
                        <a href="" class="show-more">See All</a>
                    </div>
                    <ul id="blog-titles">
                        <?php 
                        $trending_posts = new WP_Query(array('posts_per_page' => 3, 'offset' => 1)); 
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

<section class="testimonial-section">
    <div class="container">
        <div class="testimonial-card-wrapper">
            <div class="section-heading">
                <h4 class="subtitle">Testimonials</h4>
                <h3 class="section-title">What people say about our blog</h3>
                <p class="desc">See what our readers are saying about our posts.</p>
            </div>
            <div class="testimonial-card">
                <?php
                    $recent_comments = get_comments(array(
                        'number'      => 10,
                        'status'      => 'approve',
                        'type'        => 'comment',
                        // 'user_id'     => 0 
                    ));
                ?>
                <div class="testimonial-slider">
                <?php 
                    // Check if there are any comments
                    if ($recent_comments) :
                        foreach ($recent_comments as $comment) :
                    ?>
                        
                            <div class="visitor-review">
                                <p class="visitor-review"><?php echo wp_trim_words($comment->comment_content, 25); // Limit to 25 words ?></p>
                                <div class="visitor-profile">
                                    <div class="avatar">
                                        <?php echo get_avatar($comment->comment_author_email, 50); // Display the commenter's avatar ?>

                                        <div class="visitor-info">
                                            <h4 class="author-name"><?php echo esc_html($comment->comment_author); ?></h4>
                                            <div class="visitor-location">New York, USA</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                        endforeach;
                    else :
                        echo "<p>No testimonials available yet. Be the first to leave a comment!</p>";
                    endif;
                ?>
                </div>
                <div class="testimonial-btn">
                    <div class="left-btn"><i class="fa-solid fa-arrow-left-long"></i></div>
                    <div class="right-btn active"><i class="fa-solid fa-arrow-right-long"></i></div>
                </div>   
            </div>
        </div>
    </div>
</section>


<section class="blog-section">
    <div class="container">
        <div class="blog-wrapper">
            <div class="section-heading">
                <h2 class="section-title">New Technology</h2>
            </div>
            <div class="blogs-posts">
                <?php
                    $featured_posts = new WP_Query(array('posts_per_page' => 4, 'offset' => 1));
                    if ($featured_posts->have_posts()) :
                        while ($featured_posts->have_posts()) : $featured_posts->the_post(); ?>
                            <div class="post-item">
                                <div class="post-thumbnail">
                                    <?php the_post_thumbnail('medium'); ?>
                                </div>
                                <div class="post-content">
                                    <a href="<?php the_permalink(); ?>">
                                        <h3 class="post-title"><?php the_title(); ?></h3>
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
                                </div>
                            </div>
                    <?php endwhile; endif; wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
</section>



<?php get_footer(); ?>
