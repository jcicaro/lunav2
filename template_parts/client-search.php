
    <div class="spinner" ng-if="c.showSpinner"></div>

    <div class="row row-cards pt-4 " >

        <div class="col-md-6 col-lg-4 pb-3" ng-repeat="post in c.posts" ng-if="c.posts.length > 0">
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

    </div>

    <div class="row">
        <div class="col-md-12">
            <button class="btn btn-light btn-sm" ng-click="c.previousPosts()" ng-if="c.isPreviousVisible()">
                <div class="nav-previous alignleft"><i class="fa fa-2x fa-arrow-left"></i></div>
            </button>
            <button class="btn btn-light btn-sm float-right" ng-click="c.nextPosts()" ng-if="c.isNextVisible()">
                <div class="nav-next alignright"><i class="fa fa-2x fa-arrow-right"></i></div>
            </button>
        </div>
        
    </div>
