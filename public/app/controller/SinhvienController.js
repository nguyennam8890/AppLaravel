app.controller('SinhvienController',function($scope,$http,API){
    $http({
      method: 'GET',
      url: API+'/list'
    }).then(function successCallback(response) {
        $scope.sinhviens = response.data;
        $scope.modal = function(state,id){ 
            $scope.state = state;
            $scope.id = id;
            switch(state){
                case 'add':
                    $scope.frmTitle = 'Them sinh vien';
                    break;
                case 'edit':
                    $scope.frmTitle = 'Sua sinh vien';
                    $http({
                        method: 'GET',
                        url: API+'edit/'+id
                    }).then(function successCallback(response){
                      $scope.sinhvien = response.data;
                    },function errorCallback(response) {
                      console.log(response);
                  });
                    break;
                default: 'Thong tin sinh vien ';break;
            }
            $('#myModal').modal('show');
        }
        $scope.save = function(state,id){
            if(state == 'add'){
               var url_add = API + 'add';
               var data    = $.param($scope.sinhvien);

               $http({
                    method: 'POST',
                    url: url_add,
                    data : data,
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded'}
               }).then( function successCallback(response) {
                console.log(response);
                    if(response.data == 'no ok')
                    {
                      $scope.statusError = 'Tên người dùng đã tồn tại';
                    }
                    if(response.data == 'ok'){
                      location.reload();
                    }
               },function errorCallback(response) {
                console.log(response);
              })
            }
           if(state == 'edit'){
               var url_edit = API + 'edit/'+id;
               var data    = $.param($scope.sinhvien);
               $http({
                    method: 'POST',
                    url: url_edit,
                    data : data,
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded'}
               }).then( function successCallback(response) {
                    if(response.data == 'ok'){
                      location.reload();
                    }
               },function errorCallback(response) {
                console.log(response);
              });
            }
        }
      }, function errorCallback(response) {
        console.log(response);
      });
    $scope.confirmDelete = function(id){
      var confirmDelete = confirm('Bạn có muốn xóa bản ghi này hay không?');
      if(confirmDelete){
         var url_delete = API + 'delete/'+id;
         $http({
              method: 'POST',
              url: url_delete,
         }).then( function successCallback(response) {
              if(response.data == 'ok'){
                location.reload();
              }
         },function errorCallback(response) {
          console.log(response);
        });
      }else{
       return false;
      }
    }
})
