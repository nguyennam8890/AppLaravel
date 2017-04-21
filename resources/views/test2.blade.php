<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">
    <title>Starter Template for Bootstrap</title>
    <!-- Bootstrap core CSS -->
    <link
            href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
            rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
<div class="container">
    <div ng-app="test2">
        <div ng-controller="TestController1">
            <input type="text" ng-model="content1">
            @{{ content1 }}
        </div>
        <div ng-controller="TestController2">
            <input type="text" ng-model="content2">
            @{{ content2 }}
        </div>
        <hr>

        <div id="maytinh" ng-controller="mayTinhController">
            <h3 class="text-center">Máy tính cầm tay</h3>
            <div class="col-lg-6 col-lg-offset-3">
                <input type="number" ng-model="so1" class="form-control">
            </div>

            <div class="col-lg-6 col-lg-offset-3">
                <input type="number" ng-model="so2" class="form-control">
            </div>

            <div class="col-lg-6 col-lg-offset-3">
                <select ng-model="pheptoan" class="form-control">
                    <option value="+">+</option>
                    <option value="-">-</option>
                    <option value="*">*</option>
                    <option value="/">/</option>
                </select>
                <br>
                <div class="col-lg-6 col-lg-offset-3">
                    <button ng-click="maytinh()">Click</button>
                    <label> Kết quả phép toán là: @{{ ketqua }}</label>
                </div>

            </div>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo asset("template/js/jquery.min.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo asset("template/js/bootstrap.min.js"); ?>"></script>
    <script src="<?php echo asset('lib/angular.min.js'); ?>"></script>
    <script src="<?php echo asset('app.js'); ?>"></script>
    <script src="<?php echo asset('app/controller/TestController2.js'); ?>"></script>
</body>
</html>
