<?php
  session_start();
  include("database/connect.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	   <link rel="stylesheet" type="text/css" href="./frontend/bootstrap/css/bootstrap.min.css"/>
	  <script type="text/javascript" src="./frontend/jquery/jquery.min.js"></script>
	  <script type="text/javascript" src="./frontend/bootstrap/js/bootstrap.min.js"></script>
	  <style type="text/css">
	  	h2{
	  		margin-top: 100px;
	  		margin-bottom: 50px;
	  		margin-right: 100px;
	  		margin-left: 100px;
	  		text-align: center;
	  		font-size: 50px;
	  	}
	  	p{
	  		margin-right: 100px;
	  		margin-left: 100px;
	  		font-size: 20px;
	  	}
	  </style>
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top" >
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="glyphicon glyphicon-list"></span>
				</button>
				<a class="navbar-brand" href="index.php">Trần Thanh Tài's Blog</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
				<li><a href="#section2">Giới Thiệu</a></li>
			</ul>

			</div>
			
		</div>
	</nav>
	<?php 
			$query = "SELECT * FROM baiviet WHERE idbaiviet=".$_GET['id'];
            $result = mysql_query($query);
            $row = mysql_fetch_array($result);
	?>
	<h2><?php echo $row['tieude'];?></h2>
	<p><?php echo $row['noidung'];?></p>
</body>
</html>