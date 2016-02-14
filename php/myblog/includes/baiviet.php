<?php
	$result = mysql_query("SELECT * FROM baiviet WHERE tinhtrang = 1");
                                   $count = mysql_num_rows($result);
                                   $current_page = isset($_GET['page'])?$_GET['page']:1;
                                   $limit = 2;
                                   $total_page = ceil($count/$limit);
                                   if ($current_page > $total_page) {
                                       $current_page = $total_page;
                                   }else if ($current_page < 1) {
                                       $current_page = 1;
                                   }
                                   $start = ($current_page - 1) * $limit;
                                   $result = mysql_query("SELECT * FROM baiviet WHERE tinhtrang = 1 ORDER BY idbaiviet DESC LIMIT $start,$limit");
	while($row = mysql_fetch_array($result)){
		?>

			<div class="content">
				<a href="detail.php?id=<?php echo $row['idbaiviet'];?>"><h2><?php echo $row["tieude"];?></h2></a>
	
				<p><?php echo $row["tomtat"];?></p>
				<span>Trần Thanh Tài | <?php echo $row["created"];?></span>
			</div>
		<?php
	}

?>


