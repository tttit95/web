<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
        <base href="http://localhost/photo/"/>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Trang Quản Lý</title>
       
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Initiate WYIWYG text area -->
      <script>

            $(document).ready(function() {

        selectFilter();
        applyPagination(1);
        function applyPagination(value)
        {

                $(".pagination a").click(function(){
                var url = $(this).attr("href");
                $.ajax({
                    url:url,
                    data:{
                        select:value,
                    },
                    dataType:"text",
                    type:"POST",
                    success:function(msg){
                        $("#txtHint").html(msg);
                        applyPagination(value);
                    }
                });
                return false;
            });

            
        }
        function selectFilter()
        {
          $("#select").change(function(){
              var value = $(this).val();
              $.ajax({
                url:'http://localhost/photo/index.php/user/view',
                data:{
                  select:value,
                },
                dataType:"text",
                type:"POST",
                success:function(msg){
                    $("#txtHint").html(msg);
                  //  alert("abc");
                    applyPagination(value);
                }
              });
          });
        }
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
                        Logout(<?php if(isset($information)){echo $information;}?>)
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
                                <li id="current"><a href="index.php/home/index">Trang chủ</a></li>

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
                            <li><a href="index.php/home/index">Trang chủ</a></li>
                            <li><a href="index.php/articles/do_upload">Đăng ảnh</a></li>
                            <?php 
                                if (isset($permission)) {
                                   if (in_array('user/view', $permission)) {
                                     ?>
                                         <li><a href="index.php/user/view">Quản lý thành viên</a></li>
                                     <?php
                                   }
                                }
                            ?>
                            <?php 
                                if (isset($permission)) {
                                   if (in_array('articles/view', $permission) || in_array('articles/view/myself', $permission)) {
                                     ?>
                                         <li><a href="index.php/articles/view">Quản lý ảnh</a></li>
                                     <?php
                                   }
                                }
                            ?>
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
               <?php 
                if (isset($permission)) {
                 if (in_array('user/view', $permission)) {
                   ?>
                   <a href="index.php/user/view" class="dashboard-module">
                    <img src="template/admin/Crystal_Clear_stats.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/template/admin/Crystal_Clear_stats.gif" width="64" height="64" alt="edit" />
                    <span>Quản lý thành viên</span>
                </a>
                <?php
             }
         }
        ?>
        <?php 
        if (isset($permission)) {
         if (in_array('articles/view', $permission) || in_array('articles/view/myself', $permission)) {
           ?>
           <a href="index.php/articles/view" class="dashboard-module">
            <img src="template/admin/Crystal_Clear_stats.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/template/admin/Crystal_Clear_stats.gif" width="64" height="64" alt="edit" />
            <span>Quản lý Ảnh</span>
        </a> 
                 <?php
         }
        }
        ?>
                <div style="clear: both"></div>
            </div> <!-- End .grid_7 -->
            <div style="clear:both;"></div>

               <?php 
               if (isset($upload_path)) {
                   // $data['title'] = $title;
                  //  $data['description'] = $description;
                 $this->load->view($upload_path);
              }?>
            <!-- code php-->
            <?php 
                if (isset($path)) {
                    $this->load->view($path);
                }
            ?>
            <?php
                if (isset($permission)) {
                    if (in_array('role/view', $permission)) {
                        ?>
                             <!-- Categories list -->
                             <div class="grid_6">

                                <div class="module">
                                   <h2><span>Role Edit</span></h2>


                                   <div class="module-body">
                                     <form action="" method="post">
                                        <table id="myTable" class="tablesorter">
                                           <?php 
                                           $message = $this->session->flashdata('messagerole');
                                           if (isset($message)) {
                                            if ($message['type']=='successful') {
                                             ?>
                                             <span class="notification n-success"><?php echo $message['message'];?></span>
                                             <?php
                                         }else if ($message['type']=='error') {
                                            ?>
                                            <span class="notification n-error"><?php echo $message['message'];?></span>
                                            <?php
                                        }
                                    }

                                    ?>
                                    <?php echo validation_errors('<span class="notification n-error">','</span>');?>
                                    <?php
                                    if (isset($permission)) {
                                        if (in_array('role/add', $permission)) {
                                            ?>
                                            <fieldset>
                                                <input type="text" class="input-medium" name="addrole">&nbsp;&nbsp;<input class="submit-green" type="submit" value="<?php if(isset($category)){echo'Add category';}else{echo 'Add Role';}?>" name="add">
                                            </fieldset>
                                            <?php
                                        }
                                    }
                                    ?>
                                    <thead>
                                        <tr>
                                            <th style="width:5%">ID</th>
                                            <th style="width:13%">Role</th>
                                            <th style="width:13%">Created</th>
                                            <th style="width:15%"></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                <?php 
                                if (isset($role)) {
                                 foreach ($role as $key => $value) {
                                  ?>
                                  <tr>
                                    <td class="align-center"><?php echo $value['id']?></td>
                                    <td><?php echo $value['role']?></td>
                                    <td><?php echo $value['created']?></td>
                                    <td>
                                        <input type="checkbox" name="checkbox[]" value="<?php echo $value['id'];?>"/>
                                        <?php
                                            if (isset($permission)) {
                                                if (in_array('role/edit', $permission)) {
                                                    ?>
                                                        <a href="index.php/user/editrole/<?php echo $value['id'];?>/<?php echo $page;?>"><img src="template/admin/pencil.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/pencil.gif" width="16" height="16" alt="edit"></a>
                                                    <?php
                                                }
                                             }
                                      ?>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>

                </table>
        </form>
    </div>
</div> <!-- module -->
<div style="clear:both;"></div>

</div>
<!-- End .grid_6 -->
                        <?php
                    }
                }
            ?>
            
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