@extends('admin.layouts.plain')

@section('content')
<h1>Quên mật khẩu?</h1>
<p class="account-subtitle">Nhập email của bạn để nhận link đặt lại mật khẩu</p>
<!-- Form -->
<form action="{{route('password.request')}}" method="post">
	@csrf
    <input type="hidden" name="token" value="{{request()->token}}">
	<div class="form-group">
		<input class="form-control" name="email" type="text" placeholder="Email">
	</div>
    <div class="form-group">
		<input class="form-control" name="password" type="password" placeholder="Nhập mật khẩu mới">
	</div>
    <div class="form-group">
		<input class="form-control" name="password_confirmation" type="password" placeholder="Nhập lại mật khẩu mới">
	</div>
	<div class="form-group mb-0">
		<button class="btn btn-primary btn-block" type="submit">Đặt lại mật khẩu</button>
	</div>
</form>
<!-- /Form -->

<div class="text-center dont-have">Ghi nhớ mật khẩu của bạn? <a href="{{route('login')}}">Đăng nhập</a></div>
@endsection