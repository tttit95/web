	@extends('admin.layout.index')
	@section('content')
	<div class="content-box"><!-- Start Content Box -->
		
		<div class="content-box-header">
			
			<h3>Danh Sách</h3>
			
			
			<div class="clear"></div>
			
		</div> <!-- End .content-box-header -->
		
		<div class="content-box-content">
			
				@if(session('thongbao'))
									<span class="input-notification success png_bg">{{session('thongbao')}}</span>
				@endif
				
				<table>
					
					<thead>
						<tr>
						   <th><input class="check-all" type="checkbox" /></th>
						   <th>Tên</th>
						   <th>Tên Không Dấu</th>
						</tr>
						
					</thead>
				 
					<tfoot>
						<tr>
							<td colspan="6">
								<div class="clear"></div>
							</td>
						</tr>
					</tfoot>
				 
					<tbody>
						@foreach($theloai as $tl)
						<tr>
							<td><input type="checkbox" /></td>
							<td>{{$tl->Ten}}</td>
							<td>{{$tl->TenKhongDau}}</td>
							<td>
								<!-- Icons -->
								 <a href="admin/theloai/sua/{{$tl->id}}" title="Edit"><img src="admin_asset/resources/images/icons/pencil.png" alt="Edit" /></a>
								 <a href="admin/theloai/xoa/{{$tl->id}}" title="Delete"><img src="admin_asset/resources/images/icons/cross.png" alt="Delete" /></a> 
							</td>
						</tr>
						@endforeach

					</tbody>
					
				</table>

			
		</div> <!-- End .content-box-content -->
		
	</div> <!-- End .content-box -->
	@endsection