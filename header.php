<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class() ?>>
    <header>
        <div class="header">
            <div class="header--title">
                <h1 class="header--title-brand"><a href="<?php echo site_url('/') ?>">ULTRASIMPLE</a></h1>
            </div>
            <div class="header--menu">
                <div class="header--menu-bar">
                    <a href="#" class="header--menu-bar-link-search" onclick="toggleClass('search-box', 'search-active')">
                        <svg>
                            <use xlink:href="<?php echo get_theme_file_uri('/assets/icon/sprite.svg#icon-search') ?>" />
                        </svg>
                    </a>
                    <a href="#" class="header--menu-bar-link" onclick="toggleClass('dropdown-menu-list', 'dropdown-active')">
                        <svg>
                            <use xlink:href="<?php echo get_theme_file_uri('/assets/icon/sprite.svg#icon-menu') ?>" />
                        </svg>
                    </a>
                    <ul class="header--menu-dropdown-lists" id="dropdown-menu-list">
                        <li class="header--menu-dropdown-lists-item"><a href="<?php echo site_url('/'); ?>">Home</a></li>
                        <li class="header--menu-dropdown-lists-item"><a href="#">About Us</a></li>
                        <li class="header--menu-dropdown-lists-item"><a href="#">Privacy Policy</a></li>
                        <li class="header--menu-dropdown-lists-item"><a href="#">Contact Us</a></li>
                    </ul>
                </div>
                <div class="search-container" id="search-box">
                    <label class="search-label">Search</label>
                    <p>You can search based on title, category or author.</p>
                    <input type="text" placeholder="Search somethings..." class="search-input">
                    <div class="no-result">No result found</div>
                </div>
                <ul class="header--menu-lists">
                    <li class="header--menu-lists-item"><a href="<?php echo site_url('/'); ?>">Home</a></li>
                    <li class="header--menu-lists-item"><a href="#">About Us</a></li>
                    <li class="header--menu-lists-item"><a href="#">Privacy Policy</a></li>
                    <li class="header--menu-lists-item"><a href="#">Contact Us</a></li>
                    <li class="header--menu-lists-item"><a href="#" onclick="toggleClass('search-box', 'search-active')"><svg>
                                <use xlink:href="<?php echo get_theme_file_uri('/assets/icon/sprite.svg#icon-search') ?>" />
                            </svg></a></li>
                </ul>
            </div>
        </div>
    </header>