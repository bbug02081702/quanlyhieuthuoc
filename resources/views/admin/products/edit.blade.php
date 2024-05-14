@extends('admin.layouts.app')

@push('page-css')

@endpush

@push('page-header')
<div class="col-sm-12">
	<h3 class="page-title">Sửa thuốc</h3>
	<ul class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{route('dashboard')}}">Bảng điều khiển</a></li>
		<li class="breadcrumb-item active">Sửa thuốc</li>
	</ul>
</div>
@endpush
@section('content')
<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-body custom-edit-service">
				

			<!-- Edit thuoc -->
				<form method="post" enctype="multipart/form-data" id="update_service" action="{{route('products.update',$product)}}">
					@csrf
                    @method("PUT")
					<div class="service-fields mb-3">
						<div class="row">
							
							<div class="col-lg-12">
								<div class="form-group">
									<label>Tên thuốc <span class="text-danger">*</span></label>
									<select class="select2 form-select form-control" name="product"> 
                                        @foreach ($purchases as $purchase)
                                            @if(!empty($product->purchase))
                                            <option {{($product->purchase->id == $purchase->id) ? 'selected': ''}} value="{{$purchase->id}}">{{$purchase->product}}</option>
                                            @endif
                                        @endforeach
									</select>
								</div>
							</div>
						</div>
					</div>
					
					<div class="service-fields mb-3">
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label>Giá bán<span class="text-danger">*</span></label>
									<input class="form-control" type="text" name="price" value="{{$product->price}}">
								</div>
							</div>
	
							<div class="col-lg-6">
								<div class="form-group">
									<label>Giảm giá (%)<span class="text-danger">*</span></label>
									<input class="form-control" value="{{$product->discount}}" type="text" name="discount" value="{{old('discount')}}">
								</div>
							</div>
							
						</div>
					</div>
	
									
					
					<div class="service-fields mb-3">
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group">
									<label>Mô tả <span class="text-danger">*</span></label>
									<textarea class="form-control service-desc" value="{{$product->description}}" name="description">{{$product->description}}</textarea>
								</div>
							</div>
							
						</div>
					</div>					
					
					<div class="submit-section">
						<button class="btn btn-success submit-btn" type="submit" name="form_submit" value="submit">Đồng ý</button>
					</div>
				</form>
			<!-- /Edit thuoc -->
			</div>
		</div>
	</div>			
</div>
@endsection


@push('page-js')
	
@endpush