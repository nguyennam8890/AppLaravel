information.controller('InformationController',function($scope, $http, API_INFO){
	$http({
		method: 'GET',
		url: API_INFO + '/listinformation'
	}).then(function successCallback(response){
		$scope.informations = response.data;
		$scope.modal = function(state,id){
			$scope.state = state;
			$scope.id = id;
			switch(state){
				case 'add':
						$scope.frmTitle = 'Add new information';
						break;
				case 'edit':
						$scope.frmTitle = 'Edit information';
						$http({
							url:API_INFO + '/edit/' + id,
							method: 'GET'
						}).then(function successCallback(response){
								$scope.information = response.data;
								console.log(response);
						}, function errorCallback(response){
							alert('Lỗi khi hiển thị dữ liệu, xem log để biết thêm chi tiết');
							console.log(response);
						});
						break;
				default: 'information default';break;
			}
			$('#modal-id').modal('show');
		}
		$scope.save = function(state,id){
			var url = API_INFO + '/add';
			var data = $.param($scope.information);
			if(state == 'add'){
				$http({
					url:url,
					method: 'POST',
					data:data,
					headers:  {'Content-Type': 'application/x-www-form-urlencoded'}
				}).then(function doneCallbacks(response){
					if(response.data == 'ok'){
						location.reload();
						console.log(response);
					}
				}, function failCallbacks(response){
					alert('Lỗi khi thêm dữ liệu, xem loag để biết thêm chi tiết');
					console.log(response);
				});
			}
			if(state == 'edit'){
				$http({
					url:API_INFO + '/edit/' + id,
					method: 'POST',
					data:data,
					headers:  {'Content-Type': 'application/x-www-form-urlencoded'}
				}).then(function successCallback(response){
						location.reload();
				}, function errorCallback(response){
					alert('Lỗi khi cập nhật dữ liệu, xem log để biết thêm chi tiết');
					console.log(response);
				});
			}
		}
		$scope.ConfirmDelete = function(state,id){
			if(state == 'delete'){
				var ConfirmDelete = confirm('Bạn có chắc muốn xóa bản ghi này không?');
				if(ConfirmDelete)
				{
					$http({
					url:API_INFO + '/delete/' + id,
					method: 'POST',
				}).then(function successCallback(response){
					if(response.data == 'ok'){
						location.reload();
					}else{
						alert('Lỗi khi xóa, hãy xem lại log');
					}

				}, function errorCallback(response){
					alert('Lỗi khi xóa dữ liệu, xem log để biết thêm chi tiết');
					console.log(response);
				});
				}
			}else{
				return false;
			}
		}
	}, function failCallbacks(response){
		console.log(response);
	});
})