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
	  <!-- Latest compiled and minified CSS -->
<!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
	<title></title>

	<style type="text/css">
	*{
		margin:0px;
		padding: 0px;
	}
	img{
		margin-top: -25%;
		width: 100%;
	}
	.btn{
      margin: 10px;
    }
    .content{
    	margin: 10px 50px 0px 50px;
    	border-bottom:1px solid black;
    	padding: 20px;

    }
    .content h2{
    	font-weight: bold;
    	font-size: 50px;
    }
    p{
    	font-size: 20px;

    }
    /**/
    ul.pagination {
    display: inline-block;
    padding: 0;
    margin: 0;
}

ul.pagination li {display: inline;}

ul.pagination li a {
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
    transition: background-color .3s;
    border: 1px solid #ddd;
}

ul.pagination li a.active {
    background-color: #4CAF50;
    color: white;
    border: 1px solid #4CAF50;
}

ul.pagination li a:hover:not(.active) {background-color: #ddd;}

div.center {text-align: center;margin-top: 10px;}
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
	<div>
		<img src="images/mountain_peak_stars_sky_night_light_snow_46057_1280x720.jpg">
	</div>
  <?php
    include("includes/baiviet.php");
  ?>
	<div class="center">
  <ul class="pagination">
    <li><a href="index.php?page=1">«</a></li>
    <?php 
      for($i = 1;$i <= $total_page;$i ++){
          if ($i == $current_page) {
              echo '<li><a class="active" href="#">'.$i.'</a></li>';
             }else{
                   echo '<li><a href="index.php?page='.$i.'">'.$i.'</a></li>';
                  }
            }
    ?>
    <li><a href="index.php?page=<?php echo $total_page;?>">»</a></li>
    
  </ul>
</div>
	
</body>
</html>