<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php bloginfo('name'); ?></title>

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
    <script>
        var GLOBAL_ENABLE_DEBUG = "<?php echo get_option('enable_debug'); ?>";

        var WPGLOBAL = {
            ENABLE_DEBUG: "<?php echo get_option('enable_debug'); ?>" === "true" ? true : false,
            IS_HOME: "<?php echo is_home(); ?>" ? true : false,
            IS_SEARCH: "<?php echo is_search(); ?>" ? true : false,
            IS_CATEGORY: "<?php echo is_category(); ?>" ? true : false,
            IS_ARCHIVE: "<?php echo is_archive(); ?>" ? true : false,
            IS_SINGLE: "<?php echo is_single(); ?>" ? true : false,
            IS_PAGE: "<?php echo is_page(); ?>" ? true : false,
            IS_FRONT_PAGE: "<?php echo is_front_page(); ?>" ? true : false,
            SITE_URL: "<?php echo site_url(); ?>"
        };

    </script>

    <?php wp_head(); ?>
</head>
<body>
    <div class="container" ng-app="LunaApp" ng-controller="LunaController as c">

        <?php if (get_theme_mod('show_banner_image', false) == true) { ?>

        <div class="row <?php 
            //$display_val = get_theme_mod('show_banner_image', false) == true ? 'display-block' : 'display-none';
            // echo $display_val; 
        ?>" id="banner-logo-container">
            <div class="col">
                <div class="banner-logo">
                    <img src="<?php echo get_theme_mod('banner_image_url', '') ?>" alt="banner-logo">
                </div>
            </div>
        </div>
        
        <?php } ?>


        <div class="row">
            <div class="col">

            <nav class="navbar navbar-expand-lg <?php 
                $nav_class = get_theme_mod('dark_nav_bar', true) ? 'navbar-dark bg-dark' : 'navbar-light';
                echo $nav_class;
            ?>">

                <a class="navbar-brand" href="<?php echo site_url(); ?>">
                    <img src="<?php site_icon_url(); ?>" alt="" width="40">
                    <?php //bloginfo('name'); ?>
                </a>

                    

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <?php
                        
                    wp_nav_menu(array(
                        'theme_location' => 'header',
                        'container' => false,
                        'menu_class' => 'navbar-nav mr-auto'
                    ));

                    ?>

                    <!-- <ul class="navbar-nav mr-auto">
                    <li class="nav-item" ng-repeat="category in c.categories">
                        <a class="nav-link" ng-href="{{category.link}}">{{category.name}}</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                    </ul> -->

                    <form class="form-inline my-2 my-lg-0">
                        
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" ng-model="c.searchText" ng-change="c.executeSearch()" ng-model-options="{debounce: 700}">
                    <!-- <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button> -->
                    </form>
                </div>
            </nav>

            </div> <!-- .col -->
        </div> <!-- .row -->

        <div class="client-search-hide" ng-show="c.searchText" ng-class="{'client-search-show': c.searchText}">
            
            <div class="row pt-4">
                <div class="col-md-12 pb-3">

                    <?php get_template_part('template_parts/client', 'search'); ?>
                    
                </div> <!-- .col -->
            </div> <!-- .row -->

        </div> <!-- show if c.searchText is not empty -->

        <div ng-hide="c.searchText">

    
