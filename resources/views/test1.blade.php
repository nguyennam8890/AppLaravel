
<!DOCTYPE html>
<html lang="en" ng-app="test-angular">
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
      <div class="container" >
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
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
    <div class="container" ng-controller="TestController">
        <select class="form-control" required="required"  ng-model="aaaaaa" ng-options="x for x in names"></select>
      <form action="" method="POST" role="form">
        <legend>Form title</legend>
        <div class="form-group">
          <label for="">label</label>
          <input type="text" class="form-control" placeholder="Input field" ng-model="name">
          <h1>Hello @{{ name }}</h1>
          <p ng-bind="name"></p>
          0
          <p>Hello @{{ firstName }}</p>
          <p ng-bind="firstName"></p>
            <div ng-app="test-angular">
                <div vddirective></div>
                <vddirective>in ra thông qua tag tự định nghĩa</vddirective>
                <div class="test2"></div>
            </div>

        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
    </div><!-- /.container -->
    <div ng-app = "maintest" ng-controller = "TestController">
        <student name = "Mahesh"></student><br/>
        <student name = "Piyush"></student>
    </div>

    <script type="text/javascript" src="<?php echo asset("template/js/jquery.min.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo asset("template/js/bootstrap.min.js"); ?>"></script>
    <script src="<?php echo asset('lib/angular.min.js'); ?>"></script>
    <script src="<?php echo asset('app.js'); ?>"></script>
    <script src="<?php echo asset('app/controller/TestController.js'); ?>"></script>
  </body>
</html>
