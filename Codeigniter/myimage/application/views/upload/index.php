<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
        <base href="http://localhost/photo/"/>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Magic Admin. Advanced, Beautiful and Customizable Admin Template.</title>
       
        <!-- CSS Reset -->
		<link rel="stylesheet" type="text/css" href="template/admin/reset.css" tppabs="http://www.xooom.pl/work/magicadmin/template/admin/reset.css" media="screen" />
       
        <!-- Fluid 960 Grid System - CSS framework -->
		<link rel="stylesheet" type="text/css" href="template/admin/grid.css" tppabs="http://www.xooom.pl/work/magicadmin/template/admin/grid.css" media="screen" />
		
        <!-- IE Hacks for the Fluid 960 Grid System -->
        <!--[if IE 6]><link rel="stylesheet" type="text/css" href="template/admin/ie6.css" tppabs="http://www.xooom.pl/work/magicadmin/template/admin/ie6.css" media="screen" /><![endif]-->
		<!--[if IE 7]><link rel="stylesheet" type="text/css" href="template/admin/ie.css" tppabs="http://www.xooom.pl/work/magicadmin/template/admin/ie.css" media="screen" /><![endif]-->
        
        <!-- Main stylesheet -->
        <link rel="stylesheet" type="text/css" href="template/admin/styles.css" tppabs="http://www.xooom.pl/work/magicadmin/template/admin/styles.css" media="screen" />
        
        <!-- WYSIWYG editor stylesheet -->
        <link rel="stylesheet" type="text/css" href="template/admin/jquery.wysiwyg.css" tppabs="http://www.xooom.pl/work/magicadmin/template/admin/jquery.wysiwyg.css" media="screen" />
        
        <!-- Table sorter stylesheet -->
        <link rel="stylesheet" type="text/css" href="template/admin/tablesorter.css" tppabs="http://www.xooom.pl/work/magicadmin/template/admin/tablesorter.css" media="screen" />
        
        <!-- Thickbox stylesheet -->
        <link rel="stylesheet" type="text/css" href="template/admin/thickbox.css" tppabs="http://www.xooom.pl/work/magicadmin/template/admin/thickbox.css" media="screen" />
        
        <!-- Themes. Below are several color themes. Uncomment the line of your choice to switch to different color. All styles commented out means blue theme. -->
        <link rel="stylesheet" type="text/css" href="template/admin/theme-blue.css" tppabs="http://www.xooom.pl/work/magicadmin/template/admin/theme-blue.css" media="screen" />
        <!--<link rel="stylesheet" type="text/css" href="template/admin/template/admin/theme-red.css" media="screen" />-->
        <!--<link rel="stylesheet" type="text/css" href="template/admin/template/admin/theme-yellow.css" media="screen" />-->
        <!--<link rel="stylesheet" type="text/css" href="template/admin/template/admin/theme-green.css" media="screen" />-->
        <!--<link rel="stylesheet" type="text/css" href="template/admin/template/admin/theme-graphite.css" media="screen" />-->
        
		<!-- JQuery engine script-->
		<script type="text/javascript" src="template/admin/jquery-1.3.2.min.js" tppabs="http://www.xooom.pl/work/magicadmin/template/admin/jquery-1.3.2.min.js"></script>
        
		<!-- JQuery WYSIWYG plugin script -->
		<script type="text/javascript" src="template/admin/jquery.wysiwyg.js" tppabs="http://www.xooom.pl/work/magicadmin/template/admin/jquery.wysiwyg.js"></script>
        
        <!-- JQuery tablesorter plugin script-->
		<script type="text/javascript" src="template/admin/jquery.tablesorter.min.js" tppabs="http://www.xooom.pl/work/magicadmin/template/admin/jquery.tablesorter.min.js"></script>
        
		<!-- JQuery pager plugin script for tablesorter tables -->
		<script type="text/javascript" src="template/admin/jquery.tablesorter.pager.js" tppabs="http://www.xooom.pl/work/magicadmin/template/admin/jquery.tablesorter.pager.js"></script>
        
		<!-- JQuery password strength plugin script -->
		<script type="text/javascript" src="template/admin/jquery.pstrength-min.1.2.js" tppabs="http://www.xooom.pl/work/magicadmin/template/admin/jquery.pstrength-min.1.2.js"></script>
        
		<!-- JQuery thickbox plugin script -->
		<script type="text/javascript" src="template/admin/thickbox.js" tppabs="http://www.xooom.pl/work/magicadmin/template/admin/thickbox.js"></script>
        
        <!-- Initiate WYIWYG text area -->
		<script type="text/javascript">
			$(function()
			{
			$('#wysiwyg').wysiwyg(
			{
			controls : {
			separator01 : { visible : true },
			separator03 : { visible : true },
			separator04 : { visible : true },
			separator00 : { visible : true },
			separator07 : { visible : false },
			separator02 : { visible : false },
			separator08 : { visible : false },
			insertOrderedList : { visible : true },
			insertUnorderedList : { visible : true },
			undo: { visible : true },
			redo: { visible : true },
			justifyLeft: { visible : true },
			justifyCenter: { visible : true },
			justifyRight: { visible : true },
			justifyFull: { visible : true },
			subscript: { visible : true },
			superscript: { visible : true },
			underline: { visible : true },
            increaseFontSize : { visible : false },
            decreaseFontSize : { visible : false }
			}
			} );
			});
        </script>
        
        <!-- Initiate tablesorter script -->
        <script type="text/javascript">
			$(document).ready(function() { 
				$("#myTable") 
				.tablesorter({
					// zebra coloring
					widgets: ['zebra'],
					// pass the headers argument and assing a object 
					headers: { 
						// assign the sixth column (we start counting zero) 
						6: { 
							// disable it by setting the property sorter to false 
							sorter: false 
						} 
					}
				}) 
			.tablesorterPager({container: $("#pager")}); 
		}); 
		</script>
        
        <!-- Initiate password strength script -->
		<script type="text/javascript">
			$(function() {
			$('.password').pstrength();
			});
        </script>
	</head>
	<body>
    	<!-- Header -->
        <div id="header">
            <!-- Header. Status part -->
            <div id="header-status">
                <div class="container_12">
                    <div class="grid_8">
					&nbsp;
                    </div>
                    <div class="grid_4">
                        <a href="index.php/authentication/logout" id="logout">
                        Logout
                        </a>
                    </div>
                </div>
                <div style="clear:both;"></div>
            </div> <!-- End #header-status -->
            
            <!-- Header. Main part -->
            <div id="header-main">
                <div class="container_12">
                    <div class="grid_12">
                        <div id="logo">
                            <ul id="nav">
                                <li id="current"><a href="template/admin/">Dashboard</a></li>
                                <li><a href="template/admin/">Articles</a></li>
                                <li><a href="template/admin/">Files</a></li>
                                <li><a href="template/admin/">Profile</a></li>
                                <li><a href="template/admin/">Settings</a></li>
                            </ul>
                        </div><!-- End. #Logo -->
                    </div><!-- End. .grid_12-->
                    <div style="clear: both;"></div>
                </div><!-- End. .container_12 -->
            </div> <!-- End #header-main -->
            <div style="clear: both;"></div>
            <!-- Sub navigation -->
            <div id="subnav">
                <div class="container_12">
                    <div class="grid_12">
                        <ul>
                            <li><a href="">Trang chủ</a></li>
                            <li><a href="index.php/articles/do_upload">Đăng ảnh</a></li>
                            <li><a href="">Quản lý thành viên</a></li>
                            <li><a href="index.php/articles/view">Quản lý ảnh</a></li>
                        </ul>
                        
                    </div><!-- End. .grid_12-->
                </div><!-- End. .container_12 -->
                <div style="clear: both;"></div>
            </div> <!-- End #subnav -->
        </div> <!-- End #header -->
        
		<div class="container_12">
        

            
            <!-- Dashboard icons -->
            <div class="grid_7">
                <a href="index.php/home/index" class="dashboard-module">
                    <img src="template/admin/Crystal_Clear_user.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/template/admin/Crystal_Clear_user.gif" width="64" height="64" alt="edit" />
                    <span>Trang Chủ</span>
                </a>
                <a href="index.php/articles/do_upload" class="dashboard-module">
                	<img src="template/admin/Crystal_Clear_file.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/template/admin/Crystal_Clear_file.gif" width="64" height="64" alt="edit" />
                	<span>Đăng ảnh</span>
                </a>
                <a href="template/admin/" class="dashboard-module">
                	<img src="template/admin/Crystal_Clear_stats.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/template/admin/Crystal_Clear_stats.gif" width="64" height="64" alt="edit" />
                	<span>Quản lý thành viên</span>
                </a>
                <a href="index.php/articles/view" class="dashboard-module">
                    <img src="template/admin/Crystal_Clear_stats.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/template/admin/Crystal_Clear_stats.gif" width="64" height="64" alt="edit" />
                    <span>Quản lý Ảnh</span>
                </a> 
                <div style="clear: both"></div>
            </div> <!-- End .grid_7 -->
            <div style="clear:both;"></div>

               <?php 
               if (isset($upload_path)) {
                 $this->load->view($upload_path);
              }?>
            <div style="clear:both;"></div>
        </div> <!-- End .container_12 -->
        
           
        <!-- Footer -->
        <div id="footer">
            <div class="container_12">
                <div class="grid_12">
                    <!-- You can change the copyright line for your own -->
                    <p>&copy; 2010. <a href="template/admin/http://www.templatescreme" title="Visit For More Free Website Templates">Free Website Templates</a></p>
                </div>
            </div>
            <div style="clear:both;"></div>
        </div> <!-- End #footer -->
    </body>
</html>