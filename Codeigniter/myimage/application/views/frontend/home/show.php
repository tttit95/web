<div class="projects-holder">
<div class="row">
                    <div class="blog-masonry masonry-true">
                                 <?php
                            if (isset($data)) {
                               foreach ($data as $key => $value) {

                                  ?>
                                  <div class="post-masonry col-md-4 col-sm-6">
                                    <div class="blog-thumb">
                                        <img src="upload/<?php echo $value['imgname'];?>" alt="">
                                        <div class="overlay-b">
                                            <div class="overlay-inner">
                                                <a href="upload/<?php echo $value['imgname'];?>" class="fancybox fa fa-expand" title="<?php echo isset($value['title'])?$value['title']:'';?>"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="blog-body">
                                        <div class="box-content">
                                            <h3 class="post-title">Tiêu Đề: <a href="index.php/home/showsingle/<?php echo  base64_encode($value['id']);?>"><?php echo isset($value['title'])?$value['title']:'';?></a></h3>
                                            <span class="blog-meta">Người Đăng: <?php echo isset($value['fullname'])?$value['fullname']:'';?></span><br>
                                            <span class="blog-meta">Nguồn: <?php echo isset($value['source'])?$value['source']:'';?></span><br>
                                            <span class="blog-meta">Created: <?php echo isset($value['created'])?$value['created']:'';?></span>
                                            <p>Nội Dung: <?php echo substr($value['description'], 0,50);?></p>
                                        </div>
                                    </div>
                                </div> <!-- /.post-masonry -->
                                  <?php 
                               }
                            }
                            ?>
                    </div> <!-- /.blog-masonry -->
                </div> <!-- /.row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="pagination text-center">
                            <?php
                                 echo isset($list_pagination)?$list_pagination:'';
                             ?>
                        </div> <!-- /.pagination -->
                    </div> <!-- /.col-md-12 -->
                </div> <!-- /.row -->
            </div>