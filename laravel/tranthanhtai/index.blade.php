<!DOCTYPE html>
<html>
<head>
	<title>Trần Thanh Tài's Blog</title>
	<base href="{{ asset('')}}">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="js/jquery-3.1.0.min.js"></script>
	<script src="js/bootstrap.min.js"></script>


	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

	<style type="text/css">

	.div-1{
		background-color:#1abc9c;
		color:white;
		min-height: 768px;
		background-image: url("images/banner.jpg");
	}
	.div-1-1{
		margin-top: 80px;
	}
	.div-2{
		text-align: right;
	}
	.div-3{
		margin-left: 90px;
		margin-bottom: 20px;
		border-bottom: 1px solid #F0F8FF;
		padding-bottom: 10px;
	}
	.div-4{
		text-align: center;
	}
	.margin{
		margin-top: 290px;
	}
	h1{
		font-size: 65px;
	}
	.container-fluid{

	}

	.col-sm-3{
		min-height: 768px;
	}
	.col-sm-9{
		min-height: 768px;
		padding-top: 55px;
	}
	.row{
		margin-top: 70px;
	}
	footer{
		background-color: black;
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
							@foreach($theloai as $tl)
							<li><a href="trangchu/theloai/{{$tl->id}}/{{$tl->TenKhongDau}}.html">{{$tl->Ten}}</a></li>
							@endforeach
						</ul>	
					</div>
					
				</div>
			</nav>
			<!-- bg1 -->
		<div class="container-fluid text-center div-1">
				<h1 class="margin">Trần Thanh Tài</h1>
		</div>
			<!-- end-bg1 -->
		<div class="container">
			<div class="row">
				<div class="col-sm-3 div-2" >
					<h3>Thằng Quần Què Nào Đây</h3>
					<img src="images/avatar1.jpg" class="img-rounded" width="200px" height="200px">
					<h4>Ngày Sinh: 32/13/6969</h4>
					<h4>Quê Quán: Trái Đất</h4>
					<h4>Đang Học Chăn Nuôi Trồng Trọt</h4>
					<h4>Tình Trạng Độc Thân</h4>
					<h4>Yêu Thích Thể Thao</h4>
					<p class="jumbotron">
						Mình thật sự rất nể mình.
						Không nghiện game, không có người yêu 
						nhưng vẫn học dốt.
					</p>

				</div>
				<!-- content -->
				@yield('content')
					<!-- end content -->
					
					
			
				
			</div>
		</div>
		<!-- end navbar -->
	<footer class="container-fluid text-center">
		<p>@Copyright:<a href=""> Trần Thanh Tài </a></p>
		<p>23/09/2016 - 04/10/2016</p>
	</footer>
</body>
</html>