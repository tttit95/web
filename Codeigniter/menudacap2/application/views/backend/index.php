<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<base href="<?php echo site_url();?>"/>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<title>ADMIN</title>

	<!--                       CSS                       -->

	<!-- Reset Stylesheet -->
	<link rel="stylesheet" href="template/admin/resources/css/reset.css" type="text/css" media="screen" />

	<!-- Main Stylesheet -->
	<link rel="stylesheet" href="template/admin/resources/css/style.css" type="text/css" media="screen" />

	<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
	<link rel="stylesheet" href="template/admin/resources/css/invalid.css" type="text/css" media="screen" />	

		<!-- Colour Schemes
	  
		Default colour scheme is green. Uncomment prefered stylesheet to use it.
		
		<link rel="stylesheet" href="template/admin/resources/css/blue.css" type="text/css" media="screen" />
		
		<link rel="stylesheet" href="template/admin/resources/css/red.css" type="text/css" media="screen" />  
	 
	-->

	<!-- Internet Explorer Fixes Stylesheet -->

		<!--[if lte IE 7]>
			<link rel="stylesheet" href="template/admin/resources/css/ie.css" type="text/css" media="screen" />
			<![endif]-->

			<!--                       Javascripts                       -->

			<!-- jQuery -->
			<script type="text/javascript" src="template/admin/resources/scripts/jquery-1.3.2.min.js"></script>

			<!-- jQuery Configuration -->
			<script type="text/javascript" src="template/admin/resources/scripts/simpla.jquery.configuration.js"></script>

			<!-- Facebox jQuery Plugin -->
			<script type="text/javascript" src="template/admin/resources/scripts/facebox.js"></script>

			<!-- jQuery WYSIWYG Plugin -->
			<script type="text/javascript" src="template/admin/resources/scripts/jquery.wysiwyg.js"></script>

			<!-- jQuery Datepicker Plugin -->
			<script type="text/javascript" src="template/admin/resources/scripts/jquery.datePicker.js"></script>
			<script type="text/javascript" src="template/admin/resources/scripts/jquery.date.js"></script>
			<!--[if IE]><script type="text/javascript" src="template/admin/resources/scripts/jquery.bgiframe.js"></script><![endif]-->


			<!-- Internet Explorer .png-fix -->

		<!--[if IE 6]>
			<script type="text/javascript" src="template/admin/resources/scripts/DD_belatedPNG_0.0.7a.js"></script>
			<script type="text/javascript">
				DD_belatedPNG.fix('.png_bg, img, li');
			</script>
			<![endif]-->

		</head>

		<body><div id="body-wrapper"> <!-- Wrapper for the radial gradient background -->

			<div id="sidebar"><div id="sidebar-wrapper"> <!-- Sidebar with logo and menu -->

				<h1 id="sidebar-title"><a href="#">Simpla Admin</a></h1>

				<!-- Logo (221px wide) -->
				<a href="#"><img id="logo" src="template/admin/resources/images/logo.png" alt="Simpla Admin logo" /></a>

				<!-- Sidebar Profile links -->
				<div id="profile-links">
					Hello, <a href="#" title="Edit your profile">John Doe</a>, you have <a href="#messages" rel="modal" title="3 Messages">3 Messages</a><br />
					<br />
					<a href="#" title="View the Site">View the Site</a> | <a href="#" title="Sign Out">Sign Out</a>
				</div>        

				<ul id="main-nav">  <!-- Accordion Menu -->

					<li>
						<a href="http://www.google.com/" class="nav-top-item no-submenu"> <!-- Add the class "no-submenu" to menu items with no sub menu -->
							Home
						</a>       
					</li>

					<li> 
						<a href="#" class="nav-top-item"> <!-- Add the class "current" to current menu item -->
							 Product
						</a>
						<ul>
							<li><a href="#">Manage Product</a></li>
							<li><a class="current" href="#">Add Product</a></li> <!-- Add class "current" to sub menu items also -->
						</ul>
					</li>

					<li>
						<a href="<?php echo site_url('category/add');?>" class="nav-top-item current">
							Category
						</a>
						<ul>
							<li><a href="<?php echo site_url('category/manage');?>">Manage Categories</a></li>
							<li><a href="<?php echo site_url('category/add');?>">Add Categories</a></li>
						</ul>
					</li>  
					<li> 
						<a href="#" class="nav-top-item"> <!-- Add the class "current" to current menu item -->
								Comment
						</a>
						<ul>
							<li><a href="#">Manage Comments</a></li>
						</ul>
					</li>  

				</ul> <!-- End #main-nav -->

				<div id="messages" style="display: none"> <!-- Messages are shown when a link with these attributes are clicked: href="#messages" rel="modal"  -->

					<h3>3 Messages</h3>

					<p>
						<strong>17th May 2009</strong> by Admin<br />
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue.
						<small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
					</p>

					<p>
						<strong>2nd May 2009</strong> by Jane Doe<br />
						Ut a est eget ligula molestie gravida. Curabitur massa. Donec eleifend, libero at sagittis mollis, tellus est malesuada tellus, at luctus turpis elit sit amet quam. Vivamus pretium ornare est.
						<small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
					</p>

					<p>
						<strong>25th April 2009</strong> by Admin<br />
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue.
						<small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
					</p>

					<form action="#" method="post">

						<h4>New Message</h4>

						<fieldset>
							<textarea class="textarea" name="textfield" cols="79" rows="5"></textarea>
						</fieldset>

						<fieldset>

							<select name="dropdown" class="small-input">
								<option value="option1">Send to...</option>
								<option value="option2">Everyone</option>
								<option value="option3">Admin</option>
								<option value="option4">Jane Doe</option>
							</select>

							<input class="button" type="submit" value="Send" />

						</fieldset>

					</form>

				</div> <!-- End #messages -->

			</div></div> <!-- End #sidebar -->

			<div id="main-content"> <!-- Main Content Section with everything -->

				<noscript> <!-- Show a notification if the user has disabled javascript -->
					<div class="notification error png_bg">
						<div>
							Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
							Download From <a href="http://www.exet.tk">exet.tk</a></div>
						</div>
					</noscript>

					<!-- Page Head -->
					<h2>Welcome John</h2>
					<p id="page-intro">What would you like to do?</p>



					<div class="clear"></div> <!-- End .clear -->
					<!--code php -->
					<?php 
						if (isset($url)) {
							$this->load->view($url);
						}

					?>


					<!-- Start Notifications -->

					<div class="notification attention png_bg">
						<a href="#" class="close"><img src="template/admin/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
						<div>
							Attention notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero. 
						</div>
					</div>

					<div class="notification information png_bg">
						<a href="#" class="close"><img src="template/admin/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
						<div>
							Information notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero.
						</div>
					</div>

					<div class="notification success png_bg">
						<a href="#" class="close"><img src="template/admin/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
						<div>
							Success notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero.
						</div>
					</div>

					<div class="notification error png_bg">
						<a href="#" class="close"><img src="template/admin/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
						<div>
							Error notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero.
						</div>
					</div>

					<!-- End Notifications -->

					<div id="footer">
						<small> <!-- Remove this notice or replace it with whatever you want -->
							&#169; Copyright 2009 Your Company | Powered by <a href="http://themeforest.net/item/simpla-admin-flexible-user-friendly-admin-skin/46073">Simpla Admin</a> | <a href="#">Top</a>
						</small>
					</div><!-- End #footer -->

				</div> <!-- End #main-content -->

			</div></body>


			<!-- Download From www.exet.tk-->
			</html>
