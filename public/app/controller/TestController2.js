test2.controller('TestController1', function ($rootScope) {
    $rootScope.content1 = "Nội dung 1";
});

test2.controller('TestController2', function ($scope) {
    $scope.content2 = "Nội dung 2";
});
test2.controller('mayTinhController', function ($scope) {

    $scope.maytinh = function () {
        var so1 = parseInt($scope.so1);
        var so2 = parseInt($scope.so2);
        var pheptoan = $scope.pheptoan;
        console.log(pheptoan);
        switch (pheptoan) {

            case '+':
                $scope.ketqua = so1 + so2;
                break;
            case '-':
                $scope.ketqua = so1 - so2;
                break;
            case '*':
                $scope.ketqua = so1 * so2;
                break;
            case '/':
                $scope.ketqua = (so1 / so2);
                break;
            default:
                '...';
                break;
        }
    }
});


