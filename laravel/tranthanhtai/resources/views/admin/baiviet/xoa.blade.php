	@extends('admin.layout.index')
	@section('content')
	<div class="content-box"><!-- Start Content Box -->
		
		<div class="content-box-header">
			
			<h3>Sửa</h3>
			
			
			<div class="clear"></div>
			
		</div> <!-- End .content-box-header -->
		
		<div class="content-box-content">

				@if(count($errors) > 0)
					@foreach($errors->all() as $err)
						<div class="notification error png_bg">
							<a href="#" class="close"><img src="admin_asset/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close"></a>
							<div>
								{{$err}}
							</div>
						</div>
						<br>
					@endforeach
				@endif
			
				@if(session('thongbao'))
					<div class="notification success png_bg">
						<a href="#" class="close"><img src="admin_asset/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close"></a>
						<div>
							{{session('thongbao')}}
						</div>
					</div>
				@endif
			
				<form action="admin/baiviet/xoa/{{$baiviet->id}}" method="post" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{csrf_token()}}"/>
					<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->

						
						<p>
							<label>Tiêu Đề</label>
							<input class="text-input large-input" type="text" id="large-input" name="TieuDe" value="{{$baiviet->TieuDe}}"/>
						</p>

						
						<p>
							<label>Thể Loại</label>              
							<select name="TheLoai" class="small-input">
								@foreach($theloai as $tl)
								<option value="{{$tl->id}}">{{$tl->Ten}}</option>
								@endforeach

							</select> 
						</p>
						
						<p>
							<label>Hình ảnh</label>
							<input type="file" name="Hinh">
							@if($baiviet->Hinh != null)
							<img width="400px" src="upload/baiviet/{{$baiviet->Hinh}}">
							@endif

							
						</p>

						<p>
							<label>Tóm Tắt</label>
							<textarea id="demo" class="ckeditor" name="TomTat" cols="79" rows="15">{{$baiviet->TomTat}}</textarea>
						</p>
						
						<p>
							<label>Nội Dung</label>
							<textarea id="demo" class="ckeditor" name="NoiDung" cols="79" rows="15">{{$baiviet->NoiDung}}</textarea>
						</p>

						<p>
							<input class="button" type="submit" value="Xóa" />
						</p>
						
					</fieldset>
					
					<div class="clear"></div><!-- End .clear -->
					
				</form>
   
			
		</div> <!-- End .content-box-content -->
		
	</div> <!-- End .content-box -->
	@endsection