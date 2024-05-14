@extends('admin.layouts.plain')

@section('content')
<h1>Quên mật khẩu?</h1>
<p class="account-subtitle">Nhập email của bạn để nhận link đặt lại mật khẩu</p>
<!-- Form -->
<form action="{{route('password.request')}}" method="post">
	@csrf
	<div class="form-group">
		<input class="form-control" name="email" type="text" placeholder="Email">
	</div>
	<div class="form-group mb-0">
		<button class="btn btn-primary btn-block" type="submit">Đồng ý</button>
	</div>
</form>
<!-- /Form -->

<div class="text-center dont-have">Ghi nhớ mật khẩu của bạn? <a href="{{route('login')}}">Đăng nhập</a></div>
@endsection