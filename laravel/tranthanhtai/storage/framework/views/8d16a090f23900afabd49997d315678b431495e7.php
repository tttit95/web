	
	<?php $__env->startSection('content'); ?>
	<div class="content-box"><!-- Start Content Box -->
		
		<div class="content-box-header">
			
			<h3>Danh Sách</h3>
			
			
			<div class="clear"></div>
			
		</div> <!-- End .content-box-header -->
		
		<div class="content-box-content">
			
				<?php if(session('thongbao')): ?>
					<div class="notification success png_bg">
						<a href="#" class="close"><img src="admin_asset/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close"></a>
						<div>
							<?php echo e(session('thongbao')); ?>

						</div>
					</div>
				<?php endif; ?>
				
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
									<?php if($baiviet->currentPage() > 1): ?>
									<a href="<?php echo e($baiviet->previousPageUrl()); ?>" title="Previous Page">&laquo; Previous</a>
									<?php endif; ?>
								<?php for($i = 1; $i <= ceil($baiviet->total()/$baiviet->perPage()); $i++): ?>
									<a href="admin/baiviet/danhsach?page=<?php echo e($i); ?>" class="number
										<?php if($baiviet->currentPage() == $i): ?>
											current
										<?php endif; ?>
									" title="<?php echo e($i); ?>"><?php echo e($i); ?></a>
								<?php endfor; ?>
									<?php if($baiviet->currentPage() != ceil($baiviet->total()/$baiviet->perPage())): ?>
									<a href="<?php echo e($baiviet->nextPageUrl()); ?>" title="Next Page">Next &raquo;</a>
									<?php endif; ?>
									<a href="admin/baiviet/danhsach?page=<?php echo e($baiviet->lastPage()); ?>" title="Last Page">Last &raquo;</a>

								</div>
								<div class="clear"></div>
							</td>
						</tr>
					</tfoot>
				 
					<tbody>
						<?php $__currentLoopData = $baiviet; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bv): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
						<tr>
							<td><input type="checkbox" /></td>
							<td><?php echo e($bv->TieuDe); ?></td>
							<td><?php echo e($bv->TenKhongDau); ?></td>
							<td><?php echo e($bv->theloai->Ten); ?></td>
							<td><?php echo e($bv->create_at); ?></td>
							<td><?php echo e($bv->update_at); ?></td>
							<td>
								<!-- Icons -->
								 <a href="admin/baiviet/sua/<?php echo e($bv->id); ?>" title="Edit"><img src="admin_asset/resources/images/icons/pencil.png" alt="Edit" /></a>
								 <a href="admin/baiviet/xoa/<?php echo e($bv->id); ?>" title="Delete"><img src="admin_asset/resources/images/icons/cross.png" alt="Delete" /></a> 
							</td>
						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

					</tbody>
					
				</table>

			
		</div> <!-- End .content-box-content -->
		
	</div> <!-- End .content-box -->
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>