var app = angular.module('my-app',[]).constant('API', 'http://lar.dev/');

app.controller('SinhvienController',function($scope,$http,API){
    $http({
      method: 'GET',
      url: API+'/list'
    }).then(function successCallback(response) {
        // this callback will be called asynchronously
        // when the response is available
        $scope.sinhviens = response.data;
        $scope.modal = function(state){
            switch(state){
                case 'add':
                    $scope.frmTitle = 'Them sinh vien';
                    break;
                case 'edit':
                    $scope.frmTitle = 'Sua sinh vien';
                    break;
                default: 'Thong tin sinh vien ';break;
            }
            $('#myModal').modal('show');
        }
      }, function errorCallback(response) {
        // called asynchronously if an error occurs
        // or server returns response with an error status.
        console.log("fail");
      });
})

