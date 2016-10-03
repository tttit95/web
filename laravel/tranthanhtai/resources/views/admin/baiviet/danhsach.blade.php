	@extends('admin.layout.index')
	@section('content')
	<div class="content-box"><!-- Start Content Box -->
		
		<div class="content-box-header">
			
			<h3>Danh Sách</h3>
			
			
			<div class="clear"></div>
			
		</div> <!-- End .content-box-header -->
		
		<div class="content-box-content">
			
				@if(session('thongbao'))
					<div class="notification success png_bg">
						<a href="#" class="close"><img src="admin_asset/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close"></a>
						<div>
							{{session('thongbao')}}
						</div>
					</div>
				@endif
				
				<table>
					
					<thead>
						<tr>
						   <th><input class="check-all" type="checkbox" /></th>
						   <th><a href="">Tiêu Đề</a></th>
						   <th>Tên Không Dấu</th>
						   <th>Thể Loại</th>
						   <th>Create_at</th>
						   <th>Update_at</th>
						</tr>
						
					</thead>
				 
					<tfoot>
						<tr>
							<td colspan="6">

								<div class="pagination">
									<a href="admin/baiviet/danhsach?page=1" title="First Page">&laquo; First</a>
									@if($baiviet->currentPage() > 1)
									<a href="{{$baiviet->previousPageUrl()}}" title="Previous Page">&laquo; Previous</a>
									@endif
								@for($i = 1; $i <= ceil($baiviet->total()/$baiviet->perPage()); $i++)
									<a href="admin/baiviet/danhsach?page={{$i}}" class="number
										@if($baiviet->currentPage() == $i)
											current
										@endif
									" title="{{$i}}">{{$i}}</a>
								@endfor
									@if($baiviet->currentPage() != ceil($baiviet->total()/$baiviet->perPage()))
									<a href="{{$baiviet->nextPageUrl()}}" title="Next Page">Next &raquo;</a>
									@endif
									<a href="admin/baiviet/danhsach?page={{$baiviet->lastPage()}}" title="Last Page">Last &raquo;</a>

								</div>
								<div class="clear"></div>
							</td>
						</tr>
					</tfoot>
				 
					<tbody>
						@foreach($baiviet as $bv)
						<tr>
							<td><input type="checkbox" /></td>
							<td>{{$bv->TieuDe}}</td>
							<td>{{$bv->TenKhongDau}}</td>
							<td>{{$bv->theloai->Ten}}</td>
							<td>{{$bv->create_at}}</td>
							<td>{{$bv->update_at}}</td>
							<td>
								<!-- Icons -->
								 <a href="admin/baiviet/sua/{{$bv->id}}" title="Edit"><img src="admin_asset/resources/images/icons/pencil.png" alt="Edit" /></a>
								 <a href="admin/baiviet/xoa/{{$bv->id}}" title="Delete"><img src="admin_asset/resources/images/icons/cross.png" alt="Delete" /></a> 
							</td>
						</tr>
						@endforeach

					</tbody>
					
				</table>

			
		</div> <!-- End .content-box-content -->
		
	</div> <!-- End .content-box -->
	@endsection