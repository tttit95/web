	
	<?php $__env->startSection('content'); ?>
	<div class="content-box"><!-- Start Content Box -->
		
		<div class="content-box-header">
			
			<h3>Danh Sách</h3>
			
			
			<div class="clear"></div>
			
		</div> <!-- End .content-box-header -->
		
		<div class="content-box-content">
			
				<?php if(session('thongbao')): ?>
									<span class="input-notification success png_bg"><?php echo e(session('thongbao')); ?></span>
				<?php endif; ?>
				
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
						<?php $__currentLoopData = $theloai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tl): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
						<tr>
							<td><input type="checkbox" /></td>
							<td><?php echo e($tl->Ten); ?></td>
							<td><?php echo e($tl->TenKhongDau); ?></td>
							<td>
								<!-- Icons -->
								 <a href="admin/theloai/sua/<?php echo e($tl->id); ?>" title="Edit"><img src="admin_asset/resources/images/icons/pencil.png" alt="Edit" /></a>
								 <a href="admin/theloai/xoa/<?php echo e($tl->id); ?>" title="Delete"><img src="admin_asset/resources/images/icons/cross.png" alt="Delete" /></a> 
							</td>
						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

					</tbody>
					
				</table>

			
		</div> <!-- End .content-box-content -->
		
	</div> <!-- End .content-box -->
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>