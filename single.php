<?php get_header(); ?>

<main>
    <div class="main-post">
        <div class="post">
            <?php
            while (have_posts()) {
                the_post(); ?>
                <div class="post--header">
                    <h2 class="post--header-title"><?php the_title(); ?></h2>
                    <p class="post--header-meta">Posted by <span class="post--header-meta-author"><?php the_author(); ?></span> at <?php the_time('F j, Y') ?> on <span class="post--header-meta-category"><?php echo get_the_category_list(', ') ?></span></p>
                </div>
                <div class="post--thumbnail">
                    <img src="<?php echo get_theme_file_uri('/assets/img-post-1.png'); ?>" />
                </div>
                <div class="post--text">
                    <?php the_content() ?>
                </div>
                <div class="post--footer">
                    <div class="post--footer-info">
                        <svg>
                            <use xlink:href="<?php echo get_theme_file_uri('/assets/icon/sprite.svg#icon-typing') ?>" />
                        </svg>
                        <span>1 Comment</span>
                    </div>
                    <div class="post--footer-info">
                        <span>10 Shares</span>
                        <svg>
                            <use xlink:href="<?php echo get_theme_file_uri('/assets/icon/sprite.svg#icon-share') ?>" />
                        </svg>
                    </div>
                </div>
            <?php
            }
            ?>
            <div class="post--comment">
                <div class="post--comment-list">
                    <div class="post--comment-list-item">
                        <div class="post--comment-list-item--header">
                            <h5>John</h5>
                            <i>1 menutes ago</i>
                        </div>
                        <p>Thanks a lot!</p>
                    </div>
                </div>
                <div class="post--comment-input-group">
                    <div class="input-group">
                        <label for="email">Email</label>
                        <input type="email" class="input-control" id="email" placeholder="Type your email here" />
                    </div>
                    <div class="input-group">
                        <label for="message">Message</label>
                        <textarea class="input-control" id="message" placeholder="Type your message here" rows="5"></textarea>
                    </div>
                    <button class="btn-dark">Send</button>
                </div>
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