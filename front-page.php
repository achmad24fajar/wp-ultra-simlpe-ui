<?php get_header(); ?>
<main>
    <div class="latest-post">
        <div class="latest-post--indicator">
            <div class="indicator" id="indicator-1" onclick="selectLatestPost(1)"></div>
            <div class="indicator" id="indicator-2" onclick="selectLatestPost(2)"></div>
            <div class="indicator" id="indicator-3" onclick="selectLatestPost(3)"></div>
        </div>
        <div class="image-container" id="image-1" style="background-image: url(<?php echo get_theme_file_uri('/assets/slideshow-1.jpg') ?>);">
            <div class="post-info">
                <div class="post-info-tag">
                    <a class="post-info-tag--link" href="#">Programming</a>
                </div>
                <h3 class="post-info-title"><a href="#">Comfortable workspace for increase your productivity</a></h3>
            </div>
        </div>
        <div class="image-container" id="image-2" style="background-image: url(<?php echo get_theme_file_uri('/assets/slideshow-2.jpg'); ?>">
            <div class="post-info">
                <div class="post-info-tag">
                    <a class="post-info-tag--link" href="#">AI</a>
                </div>
                <h3 class="post-info-title"><a href="#">Can AI replace human workers</a></h3>
            </div>
        </div>
        <div class="image-container" id="image-3" style="background-image: url(<?php echo get_theme_file_uri('/assets/slideshow-3.jpg'); ?>);">
            <div class="post-info">
                <div class="post-info-tag">
                    <a class="post-info-tag--link" href="#">Tips</a>
                </div>
                <h3 class="post-info-title"><a href="#">Maximal configuration Macbook for Programming</a></h3>
            </div>
        </div>
    </div>
    <div class="main-post">
        <div class="all-posts">
            <h2 class="all-posts--title">All Posts</h2>
            <div class="all-posts--lists">
                <?php
                $wp_home_query = new WP_Query(array(
                    'posts_per_page' => 4
                ));
                ?>
                <?php while ($wp_home_query->have_posts()) {
                    $wp_home_query->the_post(); ?>
                    <div class="lists-item">
                        <img class="lists-item--thumbnail" src="<?php echo get_theme_file_uri('/assets/img-post-1.png'); ?>" />
                        <div class="lists-item--info">
                            <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h3>
                            <p><?php the_excerpt(); ?> <a href="#" class="btn-text">Read More</a></p>
                        </div>
                    </div>
                <?php
                } ?>
            </div>
            <div class="all-posts--pagination">
                <a href="<?php echo site_url('/blog'); ?>" class="btn-text">See All Posts</a>
            </div>
        </div>
        <div class="sidebar">
            <div class="sidebar--lists">
                <h2 class="lists--title">Popular Posts</h2>
                <?php
                $args = array(
                    'post_type' => 'post',
                    'meta_key' => 'views_total',
                    'orderby' => 'meta_value_num',
                    'order' => 'DESC',
                    'posts_per_page' => '3',
                );

                $popular = new WP_Query($args);
                $number = 1;
                while ($popular->have_posts()) {
                    $popular->the_post(); ?>
                    <div class="lists-item">
                        <span class="rank">#<?php echo $number; ?></span>
                        <h3 class="post-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
                    </div>
                <?php
                    $number += 1;
                }
                wp_reset_query();
                ?>
            </div>
        </div>
    </div>
</main>
<div class="subscribe">
    <h2 class="subscribe--title">Subscribe</h2>
    <div class="subscribe--input-group">
        <input placeholder="Type your email" type="email" class="text-input" />
        <button class="btn-dark">Subscribe</button>
    </div>
    <p>Be up to date with subscribe this website!</p>
</div>

<?php get_footer(); ?>