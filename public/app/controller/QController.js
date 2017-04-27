qapp.config(function($routeProvider){
    $routeProvider.when('/temp2',{
        controller: 'q1',
        replace: 'true',
        templateURL: '/temp2/home'
    });
});
qapp.controller('q1', function ($scope) {
    $scope.message = "Đây là trang home được gọi từ home.blade.php";
    // var defer = $q.defer();
    // var promise = defer.promise;
    // promise.then(function (name) {
    //     alert(name);
    //     return 'Name2';
    // })
    //     .then(function (name) {
    //         alert(name);
    //         return 'Name3';
    //     })
    //     .then(function (name) {
    //         alert(name);
    //     });
    // defer.resolve('Name1');
});