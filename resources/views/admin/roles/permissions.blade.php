@extends('admin.layouts.app')

<x-assets.datatables />  

@push('page-header')
<div class="col-sm-7 col-auto">
	<h3 class="page-title">Quyền</h3>
	<ul class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{route('dashboard')}}">Bảng điều khiển</a></li>
		<li class="breadcrumb-item active">Quyền</li>
	</ul>
</div>
<div class="col-sm-5 col">
	<a href="#add_permission" data-toggle="modal" class="btn btn-success float-right mt-2">Thêm quyền</a>
</div>

@endpush

@section('content')

<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table id="perm-table" class="datatable table table-striped table-bordered table-hover table-center mb-0">
						<thead>
							<tr style="boder:1px solid black;">
								<th>Tên quyền</th>
								<th>Ngày tạo</th>
								<th class="text-center action-btn">Hành động</th>
							</tr>
						</thead>
						<tbody>
													
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>			
</div>


<div class="modal fade" id="add_permission" aria-hidden="true" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Thêm quyền</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" action="{{route('permissions.store')}}">
					@csrf
					<div class="row form-row">
						<div class="col-12">
							<div class="form-group">
								<label>Tên quyền</label>
								<input type="text" name="permission" class="form-control">
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-success btn-block">Lưu thay đổi</button>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="edit_permission" aria-hidden="true" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Sửa quyền</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" action="{{route('permissions.update')}}">
					@csrf
					@method("PUT")
					<div class="row form-row">
						<div class="col-12">
							<input type="hidden" name="id" id="edit_id">
							<div class="form-group">
								<label>Tên quyền</label>
								<input type="text" class="form-control perm_name" name="permission">
							</div>
						</div>
						
					</div>
					<button type="submit" class="btn btn-success btn-block">Lưu thay đổi</button>
				</form>
			</div>
		</div>
	</div>
</div>


@endsection


@push('page-js')
	<script>
		$(document).ready(function() {
            var table = $('#perm-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{route('permissions.index')}}",
                columns: [
                    {data: 'name', name: 'name'},
                    // {data: 'role', name: 'role'},
                    {data: 'created_at',name: 'created_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
			$('#perm-table').on('click','.editbtn',function (){
				$('#edit_permission').modal('show');
				var id = $(this).data('id');
				var permission = $(this).data('name');
				$('#edit_id').val(id);
				$('.perm_name').val(permission);
			});
			//
		});
	</script>
	
@endpush
