<?php $__env->startSection('content'); ?>
<div class="col-sm-9">
	<form>
		<div class="form-group">
			<div class="col-xs-4"></div>
			<div class="col-xs-4">
				<p>This content is password protected. To view it please enter your password below:</p>
				<label>Email:</label>
				<br>
				<input class="form-control" id="ex1" type="text" name="Email">
				<br>
				<label>Password:</label>
				<br>
				<input class="form-control" id="ex1" type="password" name="Password">
				<br>
				<input type="submit" class="btn btn-success btn-lg col-sm-12" value="Enter" width="100px"/>
			</div>
			<div class="col-xs-4"></div>
		</div>
	</form>	
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>