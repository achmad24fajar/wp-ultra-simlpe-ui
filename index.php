<?php get_header(); ?>
<main>
    <div class="main-post">
        <div class="all-posts">
            <h2 class="all-posts--title">All Posts</h2>
            <div class="all-posts--lists">
                <?php while (have_posts()) {
                    the_post(); ?>
                    <div class="lists-item">
                        <img class="lists-item--thumbnail" src="<?php echo get_theme_file_uri('/assets/img-post-1.png'); ?>" />
                        <div class="lists-item--info">
                            <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h3>
                            <p><?php the_excerpt(); ?> <a href="#" class="btn-text">Read More</a></p>
                        </div>
                    </div>
                <?php
                }
                the_posts_pagination(array(
                    'mid_size'  => 2,
                    'class' => 'ultra-simple-pagination'
                ));
                ?>
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
                        <h3 class="post-title"><a href=""><?php the_title(); ?></a></h3>
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