<?php $__env->startSection('content'); ?>
<div class="col-sm-8">
	<?php $__currentLoopData = $baiviet; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bv): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
	<div class="div-3">
		<span><?php echo e($bv->created_at); ?> | by <a href="trangchu">Trần Thanh Tài</a> | <a href="trangchu/theloai/<?php echo e($bv->theloai->id); ?>/<?php echo e($bv->theloai->TenKhongDau); ?>.html"><?php echo e($bv->theloai->Ten); ?></a></span>
		<h2><a href="baiviet/chitiet/<?php echo e($bv->id); ?>/<?php echo e($bv->TieuDeKhongDau); ?>.html"><?php echo e($bv->TieuDe); ?></a></h2>
		<p><?php echo $bv->TomTat; ?> </p>
		<a href="baiviet/chitiet/<?php echo e($bv->id); ?>/<?php echo e($bv->TieuDeKhongDau); ?>.html">Readmore</a>
	</div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	<div class="div-4">
		<?php echo e($baiviet->links()); ?>

	</div>
</div>
<div class="col-sm-1"></div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>