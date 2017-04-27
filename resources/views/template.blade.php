<!DOCTYPE html>
<html lang="en" >
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
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container hidden" ng-app="template-App" ng-controller="temp1">
        <script type="text/ng-template" id="header.html">
            <header style="background: red;height: 100px;display: block;width: 980px;">
                <h1>Header</h1>
            </header>
        </script>
        <div header></div>
    <masterview></masterview>

    <script type="text/ng-template" id="footer.html">
        <footer style="background: blueviolet; height: 100px;display: block;width: 980px;">
            <h1>Footer</h1>
        </footer>
    </script>
    <div footer></div>

</div>
<hr>
<div ng-app="temp-Route">
    <div class="container">
        <header style="background: red;height: 100px;display: block;width: 980px;">
            <h1>Header</h1>
        </header>
        <h1>Content</h1>
        <ng-view>
        </ng-view>
        <footer style="background: blueviolet; height: 100px;display: block;width: 980px;">
            <h1>Footer</h1>
        </footer>
    </div>
</div>
<script type="text/javascript" src="<?php echo asset("template/js/jquery.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo asset("template/js/bootstrap.min.js"); ?>"></script>
<script src="<?php echo asset('lib/angular.min.js'); ?>"></script>
<script src="<?php echo asset('js/angular-route.min.js');?>"></script>
<script src="<?php echo asset('app.js'); ?>"></script>
<script src="<?php echo asset('app/controller/TemplateController.js'); ?>"></script>
</body>
</html>
