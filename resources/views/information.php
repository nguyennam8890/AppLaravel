<!DOCTYPE html>
<html lang="en" ng-app="information">
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
        </div>
        <!--/.nav-collapse -->
    </div>
</nav>
<div class="container" ng-controller="InformationController">
    <table class="table table-hover">
        <thead>
        <tr>
            <th colspan="8" class='text-center'>
                <h3>List Information</h3>
            </th>
        </tr>
        <tr>
            <th>STT</th>
            <th>ID</th>
            <th>KeyWord</th>
            <th>Name</th>
            <th>Created_at</th>
            <th>Updated_at</th>
            <th colspan="2" align="center"><button type="button" class="btn btn-info" href='#modal-id' ng-click="modal('add')">AddNew</button></th>
        </tr>
        </thead>
        <tbody>
        <tr ng-repeat="(key, information) in informations">
            <td>{{ key+1 }}</td>
            <td>{{ information.id }}</td>
            <td>{{ information.name }}</td>
            <td>{{ information.keyword }}</td>
            <td>{{ information.created_at }}</td>
            <td>{{ information.updated_at }}</td>
            <td>
                <button type="button" class="btn btn-info" ng-click="modal('edit',information.id)">Edit</button>
            </td>
            <td>
                <button type="button" class="btn btn-danger" ng-click="ConfirmDelete('delete',information.id)">Delete</button>
            </td>
        </tr>
        </tbody>
    </table>
    <div class="modal fade" id="modal-id">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">{{ frmTitle }}</h4>
                </div>
                <div class="modal-body">
                    <form name="frmInformation" method="POST" role="form">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Input name information"
                                   ng-model="information.name"
                                   ng-required='true'
                                   ng-minlength='3'
                                   ng-maxlength='20'
                            >
                            <span id="helpBlock2" class="help-block" ng-show="frmInformation.name.$error.required">Vui lòng nhập họ tên</span>
                            <span id="helpBlock2" class="help-block" ng-show="frmInformation.name.$error.minlength">Name phải có ít nhất 3 ký tự</span>
                            <span id="helpBlock2" class="help-block" ng-show="frmInformation.name.$error.maxlength">Name không vượt quá 10 ký tự</span>
                        </div>
                        <div class="form-group">
                            <label for="">KeyWord</label>
                            <input type="text" class="form-control" id="" placeholder="Input keyword information" name='keyword'
                                   ng-model="information.keyword"
                                   ng-required='true'
                                   ng-minlength='3'
                                   ng-maxlength='20'>
                            <span id="helpBlock2" class="help-block" ng-show="frmInformation.keyword.$error.required">Vui lòng nhập KeyWord</span>
                            <span id="helpBlock2" class="help-block" ng-show="frmInformation.keyword.$error.minlength">KeyWord phải có ít nhất 3 ký tự</span>
                            <span id="helpBlock2" class="help-block" ng-show="frmInformation.keyword.$error.maxlength">KeyWord không vượt quá 10 ký tự</span>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" ng-disabled="frmInformation.$invalid" ng-click="save(state,information.id)">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container -->
<script type="text/javascript" src="<?php echo asset("template/js/jquery.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo asset("template/js/bootstrap.min.js"); ?>"></script>
<script src="<?php echo asset('lib/angular.min.js'); ?>"></script>
<script src="<?php echo asset('app.js'); ?>"></script>
<script src="<?php echo asset('app/controller/InformationController.js'); ?>"></script>
<style type="text/css">
    .help-block {
        display: block;
        margin-top: 5px;
        margin-bottom: 10px;
        color: red;
    }
</style>
</body>
</html>