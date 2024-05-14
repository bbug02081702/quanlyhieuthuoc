@extends('admin.layouts.app')

@push('page-header')
<div class="col">
	<h3 class="page-title">Hồ sơ</h3>
	<ul class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{route('dashboard')}}">Bảng điều khiển</a></li>
		<li class="breadcrumb-item active">Hồ sơ</li>
	</ul>
</div>
@endpush

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="profile-header">
			<div class="row align-items-center">
				<div class="col-auto profile-image">
					<a href="#">
						<img class="rounded-circle" alt="User Image" src="{{!empty(auth()->user()->avatar) ? asset('storage/users/'.auth()->user()->avatar): asset('assets/img/avatar_1nn.png')}}">
					</a>
				</div>
				<div class="col ml-md-n2 profile-user-info">
					<h4 class="user-name mb-0">{{auth()->user()->name}}</h4>
					<h6 class="text-muted">{{auth()->user()->email}}</h6>
				</div>

			</div>
		</div>
		<div class="profile-menu">
			<ul class="nav nav-tabs nav-tabs-solid">
				<li class="nav-item">
					<a class="nav-link active" data-toggle="tab" href="#per_details_tab">Giới thiệu</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#password_tab">Mật khẩu</a>
				</li>
			</ul>
		</div>
		<div class="tab-content profile-tab-cont">


			<div class="tab-pane fade show active" id="per_details_tab">

				<!-- chi tiet nguoi dung -->
				<div class="row">
					<div class="col-lg-12">
						<div class="card">
							<div class="card-body">
								<h5 class="card-title d-flex justify-content-between">
									<span>Thông tin cá nhân</span>
									<a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i class="fa fa-edit mr-1"></i>Sửa</a>
								</h5>
								<div class="row">
									<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Tên</p>
									<p class="col-sm-10">{{auth()->user()->name}}</p>
								</div>

								<div class="row">
									<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Email ID</p>
									<p class="col-sm-10">{{auth()->user()->email}}</p>
								</div>

								<div class="row">
									<p class="col-sm-2 text-muted text-sm-right mv-0 mb-sm-3">Vai trò người dùng</p>
									<p class="col-sm-10">
										@foreach (auth()->user()->getRoleNames() as $role)
										{{$role}}
										@endforeach
									</p>
								</div>

							</div>
						</div>

						
						<div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Thông tin cá nhân</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form method="POST" enctype="multipart/form-data" action="{{route('profile.update',auth()->user())}}">
											@csrf
											<div class="row form-row">
												<div class="col-12">
													<div class="form-group">
														<label>Tên đầy đủ</label>
														<input class="form-control" name="name" type="text" value="{{auth()->user()->name}}" placeholder="Nhập tên đầy đủ">
													</div>
												</div>
												<div class="col-12">
													<div class="form-group">
														<label>Email</label>
														<input class="form-control" name="email" type="text" value="{{auth()->user()->email}}" placeholder="Nhập Email">
													</div>
												</div>
												@can('edit-role')
												<div class="col-12">
													<div class="form-group">
														<label>Quyền</label>
														<select class="form-control select edit_role" name="role">
															@foreach ($roles as $role)
																<option value="{{$role->name}}">{{$role->name}}</option>
															@endforeach
														</select>
													</div>
												</div>
												@endcan
												<div class="col-12">
													<div class="form-group">
														<label>Ảnh đại diện</label>
														<input type="file" value="{{auth()->user()->avatar}}" class="form-control" name="avatar">
													</div>
												</div>

											</div>
											<button type="submit" class="btn btn-success btn-block">Lưu thay đổi</button>
										</form>
									</div>
								</div>
							</div>
						</div>
						

					</div>


				</div>
				<!-- /chi tiet nguoi dung -->

			</div>
			<!-- /chi tiet nguoi dung Tab -->

			<!-- thay password Tab -->
			<div id="password_tab" class="tab-pane fade">

				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Thay đổi mật khẩu</h5>
						<div class="row">
							<div class="col-md-10 col-lg-12">
								<form method="POST" action="{{route('update-password',auth()->user())}}">
									@csrf
									@method("PUT")
									<div class="form-group">
										<label>Mật khẩu hiện tại</label>
										<input type="password" name="current_password" class="form-control" placeholder="Nhập mật khẩu hiện tại">
									</div>
									<div class="form-group">
										<label>Mật khẩu mới</label>
										<input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu mới">
									</div>
									<div class="form-group">
										<label>Xác nhận mật khẩu mới</label>
										<input type="password" name="password_confirmation" class="form-control" placeholder="Nhập lại mật khẩu mới">
									</div>
									<button class="btn btn-success" type="submit">Lưu thay đổi</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /thay password Tab -->

		</div>
	</div>
</div>
@endsection