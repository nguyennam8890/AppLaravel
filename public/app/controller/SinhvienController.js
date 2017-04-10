app.controller('SinhvienController',function($scope,$http,API){
    $http({
      method: 'GET',
      url: API+'/list'
    }).then(function successCallback(response) {
        // this callback will be called asynchronously
        // when the response is available
        $scope.sinhviens = response.data;
        $scope.modal = function(state){
            $scope.state = state;
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
        $scope.save = function(state){
            if(state == 'add'){
               var url_add = API + 'add';
               var data = $.param($scope.sv);
               $http({
                    method: 'POST',
                    url: url_add,
                    data : data,
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded'}
               }).then( function successCallback(response) {
                      console.log('ok');
                      // location.reload();
               },function errorCallback(response) {
                // called asynchronously if an error occurs
                // or server returns response with an error status.
                console.log("fail");
              })
            }
            if(state == 'edit'){
                console.log('edit');
            }
        }
      }, function errorCallback(response) {
        // called asynchronously if an error occurs
        // or server returns response with an error status.
        console.log("fail");
      });
})
