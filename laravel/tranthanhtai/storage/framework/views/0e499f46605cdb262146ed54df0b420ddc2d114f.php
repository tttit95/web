	
	<?php $__env->startSection('content'); ?>
	<div class="content-box"><!-- Start Content Box -->
		
		<div class="content-box-header">
			
			<h3>Thêm</h3>
			
			
			<div class="clear"></div>
			
		</div> <!-- End .content-box-header -->
		
		<div class="content-box-content">

			
			
				<form action="admin/user/them" method="post">
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
					<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
					<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
						
						<p>
							<label>User</label>

								Name: <input class="text-input small-input" type="text" id="small-input" name="Name" />
								<div class="clear"></div>
								Email: <input class="text-input small-input" type="text" id="small-input" name="Email" />
								<div class="clear"></div>
								Password: <input class="text-input small-input" type="password" id="small-input" name="Password" />
						</p>
						
	
							<input class="button" type="submit" value="Thêm" />
						</p>
						
					</fieldset>
					
					<div class="clear"></div><!-- End .clear -->
					
				</form>
   
			
		</div> <!-- End .content-box-content -->
		
	</div> <!-- End .content-box -->
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>