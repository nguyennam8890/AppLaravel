template.controller('temp1', function ($scope) {
    $scope.hoten = "Nguyễn Hoài Nam";

});
template.run(function($templateCache){
    $templateCache.put('view.html','<h1>Master View use TemplateCache</h1><form action="" method="POST" role="form"> <legend>Form title</legend> <div class="form-group"> <label for="">label</label> <input type="text" class="form-control" id="" placeholder="Input field"> </div> <button type="submit" class="btn btn-primary">Submit</button> </form>');
});
template.directive('masterview',function($templateCache){
    return{
        restrict: "E",
        template: $templateCache.get('view.html')

    };
});
template.directive('header', function () {
    return {
        restrict: 'A',
        templateUrl: "header.html"
    };
});
template.directive('footer', function () {
    return {
        restrict: "A",
        templateUrl: "footer.html"
    }
});
