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
    };

});
test2.controller('directiveController', function ($scope) {
    $scope.showMessage = function () {
        alert("Xin chao");
    }
});
test2.controller('messageController', function ($scope) {
    $scope.controllerContent = "Thông báo controllerContent";
    $scope.showMessage = function (message) {
        alert(message);
        //alert("Xin chao");
    }
});
test2.directive('message5', function () {
    return {
        restrict: "A",
        template: "{{ content }}",
        scope: {content: "="}
        // ,link: function(scope, element, attrs){
        //     scope.content = attrs.content;
        // }
    }
});
test2.directive('message4', function () {
    return {
        restrict: "E",
        template: '<input type="text" ng-model="message"/>'
        + '<input type="button" ng-click="show(message)" value="Click" />',
        link: function (scope, element, attrs) {
            scope.show = function (message) {
                scope.showMessage(message);
            }
        }
    }
});
test2.directive('message3', function () {
    return {
        restrict: "E",
        scope: {
            show: '&'
        },
        template: '<input type="text" ng-model="message" />'
        + '<input type="button" value="Show" ng-click="show({messages:message})" />'
        // link: function(scope, element, attrs){
        //     scope.show = function(message){
        //         scope.showMessage(message);
        //     }
        // }
    }
});
test2.directive('message', function () {
    return function (scope, element, attrs) {
        element.bind('click', function () {
            // scope.showMessage(attrs.message);
            // scope.$apply('showMessage');
            scope.showMessage();
        });
    }
});
test2.directive('message2', function () {
    return {
        restrict: "E",
        link: function (scope, element, attrs) {
            //alert("Thông báo cho directive có element message2");
            element.bind('mouseenter', function () {
                scope.showMessage();
            })
        }
    }
});
// translution Directive
test2.controller('transludeController', function ($scope) {
    $scope.hoten = "transludeController";
});
test2.directive('login', function () {
    return {
        restrict: "E",
        transclude: true,
        template: '<div class="form-group"><label for="">Pass Word:</label> <input type="text" class="form-control" id="" placeholder="Input field"> </div><div ng-transclude></div>'
    }
});
test2.controller('returnController', function ($scope) {
    this.CheckLogin = function () {
        alert($scope.username + "&" + $scope.password);
    };
    $scope.CtrLogin = this;
    return $scope.CtrLogin;
});
test2.controller('reapeatController', function ($scope) {
    $scope.students = [
        {
            name: "Nguyễn Hoài Nam",
            age: "20",
            address: "Hà Nội"
        },
        {
            name: "Nguyễn Văn A",
            age: "20",
            address: "Ninh Bình"
        },
        {
            name: "Nguyễn Văn B",
            age: "20",
            address: "Nam Định"
        },
        {
            name: "Nguyễn Văn C",
            age: "20",
            address: "Hưng Yên"
        },
        {
            name: "Nguyễn Văn D",
            age: "20",
            address: "Hải Phòng"
        }
    ]
});
test2.controller('scopeController', function ($scope) {
    // console.log($scope);
});
test2.directive('helloscope', function () {
    return {
        restrict: "E",
        scope: {},
        template: '<input type="text" ng-model="message">{{ message }}<br/>',
        link: function (scope, element, attrs) {
            // console.log(scope);
            console.log(element);

        }
    }
});



