@extends('admin.layouts.plain')

@section('content')
<h1>Quản lý hiệu thuốc</h1>
<p class="account-subtitle">Đăng ký làm nhân viên bán hàng</p>
<!-- Visit codeastro.com for more projects -->
<!-- Form -->
<form action="{{route('register')}}" method="POST">
	@csrf
	<div class="form-group">
		<input class="form-control" name="name" type="text" value="{{old('name')}}" placeholder="Tên đầy đủ">
	</div>
	<div class="form-group">
		<input class="form-control" name="email" type="text" value="{{old('email')}}" placeholder="Email">
	</div>
	<div class="form-group">
		<input class="form-control" name="password" type="password" placeholder="Mật khẩu">
	</div>
	<div class="form-group">
		<input class="form-control" name="password_confirmation" type="password" placeholder="Xác nhận mật khẩu">
	</div>
	<div class="form-group mb-0">
		<button class="btn btn-danger btn-block" type="submit">Đăng ký (Nhân viên bán hàng)</button>
	</div>
</form>
<!-- /Form -->
								
<div class="text-center dont-have">Đã có tài khoản? <a href="{{route('login')}}">Đăng nhập</a></div>
@endsection