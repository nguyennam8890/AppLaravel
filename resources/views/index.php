
<html lang="en" ng-app="my-app">
<head>
	<meta charset="UTF-8" />
	<meta name="copyright" content="QuocTuan.Info" />
	<meta name="author" content="Vũ Quốc Tuấn" />
	<title>Laravel 5.2 & Angular JS</title>
	<!-- Load Bootstrap CSS -->
	<link type="text/css" rel="stylesheet" href="<?php echo asset('template/css/bootstrap.min.css'); ?>" />
	<link type="text/css" rel="stylesheet" href="<?php echo asset("template/css/style.css"); ?>" />
</head>
<body>
	<div class="container" ng-controller="SinhvienController">
		<center><h2>Danh Sách Sinh Viên {{ hoten }}</h2></center>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>STT</th>
					<th width="30%">Họ và Tên</th>
					<th>Tuổi</th>
					<th>Email</th>
					<th>Điện Thoại</th>
					<th width="10%"><button id="btn-add" class="btn btn-primary btn-xs" ng-click="modal('add')">Thêm Sinh Viên</button></th>
				</tr>
			</thead>
			<tbody>
				<tr ng-repeat="sv in sinhviens">
					<td>{{ sv.id }}</td>
					<td>{{ sv.name }}</td>
					<td>{{ sv.age }}</td>
					<td>{{ sv.email }}</td>
					<td>{{ sv.phone }}</td>
					<td>
						<button class="btn btn-default btn-xs btn-detail" id="btn-edit" ng-click="modal('edit')">Sửa</button>
						<button class="btn btn-danger btn-xs btn-delete">Xóa</button>
					</td>
				</tr>
			</tbody>
		</table>

		<!-- Modal -->
		<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">{{ frmTitle }}</h4>
			  </div>
			  <div class="modal-body">
				<form name="frmSinhVien" class="form-horizontal">
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Họ tên</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="name" name="name" placeholder="Vui lòng nhập họ tên"
								ng-model='sinhviens.name'
								ng-required='true'
								ng-maxlength="40"
								/>
							<span id="helpBlock2" class="help-block" ng-show="frmSinhVien.name.$error.required">Vui lòng nhập họ tên</span>
							<span id="helpBlock2" class="help-block" ng-show="frmSinhVien.name.$error.maxlength">Không được nhập quá 40 ký tự</span>
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Tuổi</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="age" name="age" placeholder="Vui lòng nhập tuổi" ng-model="sinhviens.age" ng-required="true" />
							<span id="helpBlock2" class="help-block" ng-show="frmSinhVien.age.$error.required">Vui lòng nhập tuổi</span>
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Email</label>
						<div class="col-sm-9">
							<input type="email" class="form-control" id="email" name="email" placeholder="Vui lòng nhập Email" ng-model="sinhviens.email" ng-required="true" />
							<span id="helpBlock2" class="help-block" ng-show="frmSinhVien.email.$error.required">Vui lòng nhập email</span>
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Điện thoại</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="phone" name="phone" placeholder="Vui lòng nhập số điện thoại" ng-model="sinhviens.phone" ng-required="true" />
							<span id="helpBlock2" class="help-block" ng-show="frmSinhVien.phone.$error.required" >Vui lòng nhập điện thoại</span>
						</div>
					</div>

				</form>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-primary" ng-disabled="frmSinhVien.$invalid">Lưu</button>
			  </div>
			</div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	</div>

	<!-- Load Bootstrap JS -->
	<script type="text/javascript" src="<?php echo asset("template/js/jquery.min.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo asset("template/js/bootstrap.min.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo asset("lib/angular.min.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo asset("app.js"); ?>"></script>
	<script type="text/javascript">
	// $(document).ready(function () {
	// 	$("#btn-add,#btn-edit").click(function () {
	// 		$('#myModal').modal('show')
	// 	});
	// });
	</script>
</body>
</html>