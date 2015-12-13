<div class="login">
	<form action="" method="post">
		<?php echo validation_errors(); ?>
			<input type="text" placeholder="email" name="email" value=""/><br>
			<input type="password" placeholder="password" name="password" /><br>
			<input type="submit" value="Đăng nhập" name="submit"/><br>
			<a href="index.php/home/index">Trang chủ</a><a href="index.php/authentication/signup"> Đăng ký </a><br>
			<input type="checkbox" name="remember" value="1">Nhớ cho lần sau
	</form>
</div>