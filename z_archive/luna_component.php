<?php

    class Luna_Component {

        public function post_list_client() {
            ?>

            <div class="col-md-6 col-lg-4 pb-3" ng-repeat="post in c.posts">
                <div class="card card-custom card-fixed-height bg-white border-white border-0">
                    
                    <div class="card-custom-header" ng-style="c.fetchPostFeaturedImgStyle(post)">
                        <div class="card-custom-img">
                            <a ng-href="{{post.link}}"><h4 class="card-title">{{post.title.rendered}}</h4></a>
                        </div>
                    </div>
                    
                    <div class="card-body d-flex flex-column" style="overflow-y: auto">
                        
                        <p class="card-text"><span ng-bind-html="c.trustAsHtml(post.excerpt.rendered)"></span></p>
                    </div>
                    <div class="card-footer" style="background: inherit; border-color: inherit;">
                        <a ng-href="{{post.link}}" class="btn btn-primary">More</a>
                        <!-- <a href="#" class="btn btn-outline-primary">Other option</a> -->
                    </div>
                </div>
            </div>
            

            <?php
        }



        public function post() { 
            ?>

            
            <div class="col-md-12">

                <div class="card card-custom bg-white border-white border-0">

                    <div class="card-custom-header" <?php echo (new Luna_Util())->fetch_post_background_image_style(); ?> >
                        <div class="card-custom-img">
                            <h4 class="card-title"><?php the_title(); ?></h4>
                        </div>
                    </div>
                    
                    <div class="card-body d-flex flex-column" style="overflow-y: auto">
                        
                        <p class="card-text"><?php the_content(); ?></p>
                    </div>
                    <div class="card-footer" style="background: inherit; border-color: inherit;">
                        
                    </div>
                </div>
            </div>


            <?php
        }


        public function no_post() {
            ?>

            <p>Sorry, no posts to list</p>

            <?php
        }


        public function search_client() { 

            $comp = $this;
            ?>

            <div class="row row-cards pt-4">

                <?php $comp->post_list_client(); ?>

            </div>

            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-light btn-sm" ng-click="c.previousPosts()" ng-if="c.isPreviousVisible()">
                        <i class="fa fa-2x fa-arrow-left"></i>
                    </button>
                    <button class="btn btn-light btn-sm float-right" ng-click="c.nextPosts()" ng-if="c.isNextVisible()">
                        <i class="fa fa-2x fa-arrow-right"></i>
                    </button>
                </div>
                
            </div>

            <?php
        }


        public function index_main() {

            $comp = $this;
            $comp->jumbotron();
            ?>

            <div class="row row-cards pt-4">

            <?php
            if (have_posts()) {
                while(have_posts()) {
                    the_post();
                    $comp->post_list();
                }
            }
            else {
                $comp->no_post();
            }
            ?>

            </div> <!-- .row pt-4 m-auto -->

            <?php
        }


        public function single_main() {
            $comp = $this;
            ?>

            <div class="row row-cards pt-4">

            <?php
            if (have_posts()) {
                while(have_posts()) {
                    the_post();
                    $comp->post();
                }
            }
            else {
                $comp->no_post();
            }
            ?>

            </div> <!-- .row pt-4 m-auto -->

            <?php
        }
        

        public function page() { 
            $comp = $this;
            ?>

            <div class="row row-cards pt-4">

            <?php
            if (have_posts()) {
                while(have_posts()) {
                    the_post();
                    $comp->post();
                }
            }
            else {
                $comp->no_post();
            }
            ?>

            </div> <!-- .row pt-4 m-auto -->

            <?php
        }


        public function no_page() {
            ?>

            <p>Sorry, no pages to list</p>

            <?php
        }


        public function navbar() {
            ?>

            <div class="row">
                <div class="col">

                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

                <a class="navbar-brand" href="/">
                    <img src="<?php site_icon_url(); ?>" alt="" width="40">
                    <?php //bloginfo('name'); ?>

                    <div class="loading-spinner" ng-if="c.showSpinner" style="position: relative; top: -1.6em; left: 1.4em;">
                            <div class="dot dotOne"></div>
                            <div class="dot dotTwo"></div>
                            <div class="dot dotThree"></div>
                    </div>
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

                </div>
            </div>

            <?php
        }


        public function jumbotron() {
            ?>

           
            <div ng-style="c.fetchPostFeaturedImgStyle(c.page)" style="background-size: cover;">

                    <div class="jumbotron" ng-if="c.isHomeLocation()">
                        <div class="row" >

                            <div class="col-md-6 col-sm-12">
                                <h1 class="display-4">{{c.page.title.rendered}}</h1>
                                <p ng-bind-html="c.trustAsHtml(c.page.content.rendered)"></p>
                            </div>

                        </div>
                    </div> <!-- jumbotron -->


            </div>
            

            <?php
        }

        

        public function footer() {
            ?>

            <footer class="footer-simple">
                <ul class="footer-items">
                    <li class="footer-item"><a target="_blank" href="https://500px.com/jcicaro" class="footer-link" title="500px">
                    <span class="footer-icon fa fa-camera-retro"></span>
                    </a>
                    </li>
                    <li class="footer-item"><a target="_blank" href="https://www.flickr.com/photos/159430394@N06/" class="footer-link" title="Flickr">
                    <span class="footer-icon fa fa-flickr"></span>
                    </a>
                    </li>
                    <li class="footer-item"><a target="_blank" href="https://github.com/jcicaro" class="footer-link" title="Github">
                    <span class="footer-icon fa fa-github"></span>
                    </a>
                    </li>
                    <li class="footer-item"><a target="_blank" href="https://codepen.io/jcicaro" class="footer-link" title="Codepen">
                    <span class="footer-icon fa fa-codepen"></span>
                    </a>
                    </li>
                    <li class="footer-item"><a target="_blank" href="https://www.linkedin.com/in/juan-carlo-icaro-674a71aa/" class="footer-link" title="Linkedin">
                    <span class="footer-icon fa fa-linkedin"></span>
                    </a>
                    </li>
                    <!-- <li class="footer-item footer-link"><a target="_blank" href="https://www.hackerrank.com/jcicaro" title="Hackerrank" class="footer-link">
                    <span class="footer-icon fa fa-code"></span>
                    </a>
                    </li> -->
                    <!-- <li class="footer-item"><a target="_blank" href="mailto:jc.icaro@gmail.com" class="footer-link">
                    <span class="footer-icon fa fa-envelope"></span>
                    </a>
                    </li> -->
                </ul>
            </footer>

            <?php
        }
    }

?>