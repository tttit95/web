<div class="login">
	<form action="" method="post">
		<?php echo validation_errors(); ?>
		<?php
		$message_flashdata = $this->session->flashdata('message');
		if (isset($message_flashdata) && count($message_flashdata)) {
			if ($message_flashdata['type'] == 'successful') {
				echo $message_flashdata['message'];
			}
			else if ($message_flashdata['type'] == 'error') {

				echo $message_flashdata['message'];

			}
		}	
		?>
		<input type="text" placeholder="fullname" name="fullname" value=""/><br><br>
		<input type="text" placeholder="email" name="email" value=""/><br>
		<input type="password" placeholder="password" name="password" /><br>
		<input type="password" placeholder="confirm password" name="confirmpassword" /><br>
		<input type="submit" value="Đăng Ký" name="submit"/><br>
		<a href="index.php/home/index">Trang chủ</a><a href="index.php/authentication/login"> Đăng nhập </a><br>
		<input type="checkbox" name="checkbox" value="1" />Đăng nhập sau khi đăng ký
	</form>
</div>