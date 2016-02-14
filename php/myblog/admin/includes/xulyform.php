<?php
	mysql_connect("localhost","root","");
	mysql_select_db("myblog");
	$tieude = $_POST["tieude"];
	$tomtat = $_POST["tomtat"];
	$tinhtrang = $_POST["tinhtrang"];
	$noidung = $_POST["desc"];
	$thongbao = "ABC";
	if (isset($_GET["action"])) {
		if ($_GET["action"]=="add") {
			$time = gmdate('Y-m-d H:i:s',time() + 7*3600);
			$qr = "INSERT INTO baiviet(tieude,tomtat,noidung,tinhtrang,created) VALUES('$tieude','$tomtat','$noidung','$tinhtrang','$time')";

		}else if ($_GET["action"]=="edit") {
			$id = $_GET["id"];
			$time = gmdate('Y-m-d H:i:s',time() + 7*3600);
			$qr = "UPDATE baiviet SET tieude = '$tieude',tomtat = '$tomtat',noidung = '$noidung',tinhtrang = '$tinhtrang',updated = '$time' WHERE idbaiviet = $id";
			
		}else if ($_GET["action"]=="delete") {
			$id = $_GET["id"];
			$qr = "DELETE FROM baiviet WHERE idbaiviet = $id";
		}
	}
	mysql_query($qr);
	header("Location:http://localhost/myblog/admin/index.php?action=view");