	
	<?php $__env->startSection('content'); ?>
	<div class="content-box"><!-- Start Content Box -->
		
		<div class="content-box-header">
			
			<h3>Thêm</h3>
			
			
			<div class="clear"></div>
			
		</div> <!-- End .content-box-header -->
		
		<div class="content-box-content">
				<?php if(count($errors) > 0): ?>
					<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
						<div class="notification error png_bg">
							<a href="#" class="close"><img src="admin_asset/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close"></a>
							<div>
								<?php echo e($err); ?>

							</div>
						</div>
						<br>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
				<?php endif; ?>
			
				<?php if(session('thongbao')): ?>
					<div class="notification success png_bg">
						<a href="#" class="close"><img src="admin_asset/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close"></a>
						<div>
							<?php echo e(session('thongbao')); ?>

						</div>
					</div>
				<?php endif; ?>

				<form action="admin/baiviet/them" method="post" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
					<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
						
						<p>
							<label>Tiêu Đề</label>
							<input class="text-input large-input" type="text" id="large-input" name="TieuDe">
						</p>
						<p>
							<label>Thể Loại</label>              
							<select  class="small-input" name="TheLoai">
								<?php $__currentLoopData = $theloai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tl): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
									<option value="<?php echo e($tl->id); ?>"><?php echo e($tl->Ten); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
							</select> 
						</p>
						<p>
							<label>Hình ảnh</label>
							<input type="file" name="Hinh">
						</p>
						<p>
							<label>Tóm tắt nội dung</label>
							<textarea id="demo" class="ckeditor"name="TomTat" cols="79" rows="15"></textarea>
						</p>

						<p>
							<label>Nội dung</label>
							<textarea id="demo" class="ckeditor"name="NoiDung" cols="79" rows="15"></textarea>
						</p>
						
						<p>
							<input class="button" type="submit" value="Thêm" />
						</p>
						
					</fieldset>
					
					<div class="clear"></div><!-- End .clear -->
					
				</form>
   
			
		</div> <!-- End .content-box-content -->
		
	</div> <!-- End .content-box -->
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>