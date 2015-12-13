<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <base href="http://localhost/photo/"/>
        <meta charset="utf-8">
        <title>Cười Mỗi Ngày</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
<!-- 
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300,100">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,400italic,300italic,300,500,500italic,700,900"> -->
        <!--
        Artcore Template
    http://www.templatemo.com/preview/templatemo_423_artcore
        -->
        
        <link rel="stylesheet" href="template/masonry/css/mystyle.css">
        <link rel="stylesheet" href="template/masonry/css/bootstrap.css">
        <link rel="stylesheet" href="template/masonry/css/font-awesome.css">
        <link rel="stylesheet" href="template/masonry/css/animate.css">
        <link rel="stylesheet" href="template/masonry/css/templatemo-misc.css">
        <link rel="stylesheet" href="template/masonry/css/templatemo-style.css">

        <script src="template/masonry/js/vendor/modernizr-2.6.1-respond-1.1.0.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script type="text/javascript">     
            function moveForm(id,articlesid)
            {
                $("#moveform").appendTo("#commentinner"+id);
                $("#moveform a").attr("id","cancle"+id);
                $("#yourcomment").focus();
                $(".mainBtn").attr("id","submit-"+id+"-"+articlesid);
                $(".mainBtn").attr("onclick","return add()");
                $("#cancle"+id).click(function(){
                    $("#moveform").appendTo("#commentform");
                    $(".mainBtn").attr("id","submit");
                    $(".mainBtn").attr("onclick","foucus()");

                    
                    return false;
                }); 
                return false;
            }
            function add()
            {
                var id = $(".mainBtn").attr("id");

                value = id.split("-");

                id = value[1];
                var articlesid = value[2];

                if($("#yourcomment").val()==='')
                {
                    alert("Hãy điền vào một vài ký tự");
                    return false;
                } 
                $("#hideform").hide();
                $("#loadingimage").show();
                $.ajax({
                    type:"POST",
                    url:'http://localhost/photo/index.php/ajax/demo/',
                    dataType:"text",
                    data:{
                        cmtID:id,
                        artid:articlesid,

                        cmt:$("#yourcomment").val(),
                        name:$("#name").val(),
                        email:$("#email").val(),
                    },
                    async:false,
                    success:function(element){
                        $("#commentinner" + id).after(element);
                        $("#yourcomment").val('');
                        $("#loadingimage").hide();
                        $("#hideform").show();
                    },
                    error:function(){
                        alert("Ket noi that bai");
                    }
                });
                
                return false;
            }
            function foucus(){
                $("#yourcomment").focus();
            }
        </script>
        

    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
        <![endif]-->

        <section id="pageloader">
            <div class="loader-item fa fa-spin colored-border"></div>
        </section> <!-- /#pageloader -->

        <header class="site-header container-fluid">
            <div class="top-header">
                <div class="logo col-md-6 col-sm-6">
                    <h1><a href="index.php/home/index"><em>GIẢI</em>TRÍ</a></h1>
                    <span>Hội Những Người Thích Cười</span>
                </div> <!-- /.logo -->
                <div class="social-top col-md-6 col-sm-6">
                    <ul>
                        <li><a href="index.php/home/index" class="fa fa-facebook"></a></li>
                        <li><a href="index.php/home/index" class="fa fa-twitter"></a></li>
                        <li><a href="index.php/home/index" class="fa fa-linkedin"></a></li>
                        <li><a href="index.php/home/index" class="fa fa-google-plus"></a></li>
                        <li><a href="index.php/home/index" class="fa fa-flickr"></a></li>
                        <li><a href="index.php/home/index" class="fa fa-rss"></a></li>
                    </ul>
                </div> <!-- /.social-top -->
            </div> <!-- /.top-header -->
            <div class="main-header">
                <div class="row">
                    <div class="main-header-left col-md-3 col-sm-6 col-xs-8">
                        <a id="search-icon" class="btn-left fa fa-search" href="#search-overlay"></a>
                        <div id="search-overlay">
                            <a href="#search-overlay" class="close-search"><i class="fa fa-times-circle"></i></a>
                            <div class="search-form-holder">
                                <h2>Nhập từ cần kiếm và nhấn enter</h2>
                                <form id="search-form" action="index.php/home/search/">
                                    <input type="search" name="search" placeholder="" autocomplete="off" value="<?php echo isset($search)?$search:'';?>"/>
                                </form>
                            </div>
                        </div><!-- #search-overlay -->
                    </div> <!-- /.main-header-left -->
                    <div class="menu-wrapper col-md-9 col-sm-6 col-xs-4">
                        <a href="#" class="toggle-menu visible-sm visible-xs"><i class="fa fa-bars"></i></a>
                        <ul class="sf-menu hidden-xs hidden-sm">
                            <li><a href="index.php/home/index">Trang Chủ</a></li>
                            <?php 
                                if (isset($menu) && $menu) {
                                   echo '<li><a href="index.php/articles/view">Quản lý</a></li>';
                                   echo '<li><a href="index.php/articles/do_upload">Đăng Ảnh</a></li>';
                                   echo '<li><a href="index.php/authentication/logout">Logout</a></li>';

                                }else{
                                    echo '<li><a href="index.php/authentication/signup">Đăng Ký</a></li>
                            <li><a href="index.php/authentication/login">Đăng Nhập</a></li>';
                                }
                            ?>
                            
                        </ul>
                    </div> <!-- /.menu-wrapper -->
                </div> <!-- /.row -->
            </div> <!-- /.main-header -->
            <div id="responsive-menu">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="services.html">Services</a></li>
                    <li><a href="#">Projects</a>
                        <ul>
                            <li><a href="projects-2.html">Two Columns</a></li>
                            <li><a href="projects-3.html">Three Columns</a></li>
                            <li><a href="project-details.html">Project Single</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Blog</a>
                        <ul>
                            <li><a href="blog.html">Blog Masonry</a></li>
                            <li><a href="blog-single.html">Post Single</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Pages</a>
                        <ul>
                            <li><a href="our-team.html">Our Team</a></li>
                            <li><a href="archives.html">Archives</a></li>
                            <li><a href="grids.html">Columns</a></li>
                            <li><a href="404.html">404 Page</a></li>
                        </ul>
                    </li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </div>
        </header> <!-- /.site-header -->

        <div class="content-wrapper">
            <div class="inner-container container">
                <div class="row">
                    <div class="section-header col-md-12">
                        <h2>HÀI VÃI LỒNG</h2>
                        <span>Xem là cười</span>
                    </div> <!-- /.section-header -->
                </div> <!-- /.row -->
                <div class="projects-holder-3">
                    <div class="filter-categories">
                        <ul class="project-filter">
                            <a href="index.php/home/index/0"><li class="filter <?php if(isset($categoryid) && $categoryid == 0){echo 'active';}?>"><span>All</span></li></a>
                            
                            <?php 
                                if (isset($category)) {
                                   foreach ($category as $key => $value) {
                                      ?>
                                      <a href="index.php/home/index/<?php echo $value['id']?>"><li class="filter <?php if(isset($categoryid) && $categoryid == $value['id']){echo 'active';}?>"><span><?php echo $value['title']?></span></li></a>     
                                      <?php
                                   }
                                }

                            ?>
                        </ul>
                    </div>
                    <!--code php-->

                    <?php
                      if (isset($path)) {
                        $this->load->view($path);
                      }
                    ?>
                </div> <!-- /.projects-holder-2 -->
            </div> <!-- /.inner-content -->
        </div> <!-- /.content-wrapper -->

        <script src="template/masonry/js/vendor/jquery-1.11.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="template/masonry/js/vendor/jquery-1.11.0.min.js"><\/script>')</script>
        <script src="template/masonry/js/plugins.js"></script>
        <script src="template/masonry/js/main.js"></script>

        <!-- Preloader -->
        <script type="text/javascript">
            //<![CDATA[
            $(window).load(function() { 
                $('.loader-item').fadeOut(); 
                    $('#pageloader').delay(350).fadeOut('slow');
                $('body').delay(350).css({'overflow-y':'visible'});
            })
            //]]>
        </script>
    </body>
</html>