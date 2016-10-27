<html>
<head>
	<title>Trần Thanh Tài's Blog</title>
	<base href="<?php echo e(asset('')); ?>">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="js/jquery-3.1.0.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<style type="text/css">

		#baiviet{
			border-bottom: 1px solid #E6E6FA;
		}
		.title{
			margin-top: 80px;
			margin-bottom: 40px;
		}
		.content{
			margin-bottom: 30px;
		}
		#footer{
			min-height: 100px;
		}
	</style>
</head>
<body>
			<!-- navbar -->
			<nav class="navbar navbar-inverse navbar-fixed-top">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					     </button>
						<a class="navbar-brand" href="trangchu">Me</a>
					</div>
					<div class="collapse navbar-collapse" id="myNavbar">
						<ul class="nav navbar-nav navbar-right">
							<?php $__currentLoopData = $theloai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tl): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
							<li><a href="trangchu/theloai/<?php echo e($tl->id); ?>/<?php echo e($tl->TenKhongDau); ?>.html"><?php echo e($tl->Ten); ?></a></li>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
						</ul>	
					</div>
					
				</div>
			</nav>
		<!-- content -->
		<div class="container-fluid">
			<div class="col-sm-2">
			</div>
			<div class="col-sm-8 " id="baiviet">
				<h2 class="text-center	title"><?php echo e($baiviet->TieuDe); ?></h2>
				<p class="content"><?php echo $baiviet->NoiDung; ?>

				</p>
				<p>Tác giả: <a href="trangchu">Trần Thanh Tài</a></p>

		</div>
		<div class="col-sm-2"></div>
		</div>
		<div id="footer"></div>
		<!-- end content -->


</body>
</html>