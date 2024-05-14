@extends('admin.layouts.app')

@push('page-css')

@endpush

@push('page-header')
<div class="col-sm-12">
	<h3 class="page-title">Sửa nhà cung cấp</h3>
	<ul class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{route('dashboard')}}">Bảng điều khiển</a></li>
		<li class="breadcrumb-item active">Sửa nhà cung cấp</li>
	</ul>
</div>
@endpush

@section('content')
<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-body custom-edit-service">
			
			<!-- Edit ncc -->
			<form method="post" enctype="multipart/form-data" action="{{route('suppliers.update',$supplier)}}">
				@csrf
				@method("PUT")
				<div class="service-fields mb-3">
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>Tên nhà cung cấp<span class="text-danger">*</span></label>
								<input class="form-control" type="text" value="{{$supplier->name ?? old('name')}}" name="name">
							</div>
						</div>
						<div class="col-lg-6">
							<label>Email<span class="text-danger">*</span></label>
							<input class="form-control" type="text" value="{{$supplier->email ?? old('email')}}" name="email" >
						</div>
					</div>
				</div>

				<div class="service-fields mb-3">
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>Số điện thoại<span class="text-danger">*</span></label>
								<input class="form-control" type="text" value="{{$supplier->phone ?? old('phone')}}" name="phone">
							</div>
						</div>
						<div class="col-lg-6">
							<label>Công ty<span class="text-danger">*</span></label>
							<input class="form-control" type="text" value="{{$supplier->company ?? old('company')}}" name="company">
						</div>
					</div>
				</div>

				<div class="service-fields mb-3">
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>Địa chỉ<span class="text-danger">*</span></label>
								<input type="text" name="address" value="{{$supplier->address ?? old('address')}}" class="form-control">
							</div>
						</div>
						<div class="col-lg-6">
							<label>Tên sản phẩm</label>
							<input type="text" name="product" value="{{$supplier->product ?? old('product')}}" class="form-control">
						</div>
					</div>
				</div>	
				<div class="service-fields mb-3">
					<div class="row">
						<div class="col-12">
							<label>Mô tả</label>
							<textarea name="comment" class="form-control" value="{{$supplier->comment ?? old('comment')}}" cols="30" rows="10">{{$supplier->comment}}</textarea>
						</div>
					</div>
				</div>		
				
				
				<div class="submit-section">
					<button class="btn btn-success submit-btn" type="submit" name="form_submit" value="submit">Đồng ý</button>
				</div>
			</form>

			<!-- /Edit ncc -->

			</div>
		</div>
	</div>			
</div>
@endsection	



@push('page-js')
	<!-- Select2 JS -->
	<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
@endpush




