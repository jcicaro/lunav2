<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>REST Explorer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="//stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" />
</head>
<body>

    <div class="container" ng-app="RestExplorer" ng-controller="RestExpController as c">

        <div class="row">
            
            <div class="col-md-12">

                <h1>Wordpress REST API Explorer</h1>

                <form class="jumbotron">
                    <h2>Request Info</h2>
                    <!-- <div class="form-group">
                        <label for="base_url">Base URL</label>
                        <input type="text" class="form-control" id="base_url" name="base_url" ng-model="c.baseUrl">
                        <small id="emailHelp" class="form-text text-muted">If blank, this will query this Wordpress site</small>
                    </div> -->
                    <div class="form-group">
                        <label for="request_method">Request Method</label>
                        <select class="form-control" id="request_method" name="request_method" ng-model="c.requestMethod">
                            <option value="GET">GET</option>
                            <option value="POST">POST</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="resource_path">Resource Path</label>
                        <input type="text" class="form-control" id="resource_path" name="resource_path" ng-model="c.resourcePath">
                    </div>
                    <div class="form-group">
                        <label for="request_body">Request Body</label>
                        <textarea type="text" class="form-control" id="request_body" name="request_body" rows="7" ng-model="c.requestBodyDisplay"></textarea>
                    </div>
                    <button type="button" class="btn btn-primary" ng-click="c.submitForm()">Submit</button>
                </form>

            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <form class="jumbotron">
                    <h2>Response</h2>
                    <div class="form-group">
                        <label for="response_status">Response Status</label>
                        <input type="text" class="form-control" id="response_status" name="response_status" ng-model="c.responseStatus">
                    </div>
                    <div class="form-group">
                        <label for="response_data">Response Data</label>
                        <textarea type="text" class="form-control" id="response_data" name="response_data" rows="15">{{c.responseDataPretty}}</textarea>
                    </div>
                </form>

            </div>
            
        </div>

        
    </div>

    <script type="text/javascript">
        // This is to be able to post in the admin area, can use GLOBAL_ajaxnonce.
        var GLOBAL_ajaxurl = '<?php echo admin_url( "admin-ajax.php" ); ?>';
        // var ajaxnonce = '<?php echo wp_create_nonce( "itr_ajax_nonce" ); ?>';
        var GLOBAL_ajaxnonce = '<?php echo wp_create_nonce( "wp_rest" ); ?>';
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.7.5/angular.min.js"></script>
    <script>

        angular.module("RestExplorer", []).
        controller("RestExpController", function ($scope, $http) {
            var c = this;
            c.debug = true;
            c.log = function(){
                if (c.debug) {
                    console.log.apply(null, arguments);
                }
            };
            
            c.requestMethod = 'GET';
            c.baseUrl = '';
            c.resourcePath = '/wp-json/wp/v2/posts';
            c.requestBody = {
                'title': 'REST API TEST',
                'status': 'draft',
                'content': 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
            };
            c.requestBodyDisplay = JSON.stringify(c.requestBody, null, 2);

            c.responseStatus = '';
            c.responseData = '';
            c.responseDataPretty = '';

            $scope.$watch('c.requestBodyDisplay', function() {
                try {
                    c.requestBody = JSON.parse(c.requestBodyDisplay);
                    c.log('Scope watch, c.requestBody', c.requestBody);
                } catch (error) {
                    c.log('Cannot parse JSON', c.requestBodyDisplay);
                }
            });


            c.submitForm = function() {
                var config = { 
                    method: c.requestMethod || 'GET', 
                    url: c.baseUrl + c.resourcePath,
                    data: c.requestBody,
                    headers: {
                        'X-WP-Nonce': GLOBAL_ajaxnonce
                    }
                };
                c.log('config', config);
                return $http(config).
                then(function (response) {
                    c.log('response', response);
                    c.responseStatus = response.status;
                    c.responseData = response;
                    c.responseDataPretty = JSON.stringify(c.responseData, null, 2);
                }, function (response) {
                    c.log('response', response);
                    c.responseData = response || 'Request failed';
                    c.responseStatus = response.status;
                });
            };
        });

    </script>
</body>
</html>

    
    