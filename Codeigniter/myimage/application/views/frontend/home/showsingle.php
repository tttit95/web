<div class="row">
                    <div class="blog-image col-md-12">
                        <img src="upload/<?php echo isset($data['imgname'])?$data['imgname']:'1.jpg';?>" alt="Blog 1">
                    </div> <!-- /.blog-image -->
                    <div class="blog-info col-md-12">
                        <div class="box-content">
                            <h2 class="blog-title">Tiêu đề: <?php echo isset($data['title'])?$data['title']:'';?></h2>
                            <span class="blog-meta">Người Đăng: <?php echo isset($data['fullname'])?$data['fullname']:'';?></span>
                            <span class="blog-meta">Nguồn: <?php echo isset($data['source'])?$data['source']:'';?></span>
                            <span class="blog-meta">Created: <?php echo isset($data['created'])?$data['created']:'';?></span>
                            <span>Content:</span><br>
                           <p><?php echo isset($data['description'])?$data['description']:'';?></p>
                    </div> <!-- /.blog-info -->
                    <div class="blog-tags col-md-12">
                        <span>Tags</span>: 
                        <a href="#"><?php echo isset($data['category_title'])?$data['category_title']:'';?></a>
                    </div> <!-- /.blog-tags -->
                </div> <!-- /.row -->
                <div  class="row" id="commentform">
                    <div class="col-md-12">
                        <h2 class="comment-heading">Comments (<?php if(isset($count_comment)){ echo $count_comment;}?>)</h2>
                        <div class="box-content">
                            <div class="comment">
                                <?php 
                                if (isset($comments)) {
                                    foreach ($comments as $key => $value) {
                                        ?>
                                        <div class="comment-inner" id="commentinner<?php echo $value['id'];?>">
                                            <div class="author-avatar">
                                                <img src="template/masonry/images/blog/avatar.png" alt="">
                                            </div>
                                            <div class="comment-body">
                                                <h4><?php echo $value['fullname'];?></h4>
                                                <span><?php echo $value['created']?></span>
                                                <p><?php echo $value['comments']?><a href="#" onclick="return moveForm(<?php echo $value['id'];?>,<?php echo $value['articlesid'];?>)" >Reply</a></p>
                                            </div>
                                        </div>
                                        
                                        <?php 
                                        if (isset($reply)) {
                                         foreach ($reply as $key => $val) {
                                            if ($val['commentid'] == $value['id']) {
                                             ?>
                                             <div class="nested-comment">
                                                <div class="comment">
                                                    <div class="comment-inner">
                                                        <div class="author-avatar">
                                                            <img src="template/masonry/images/blog/avatar.png" alt="">
                                                        </div>
                                                        <div class="comment-body">
                                                            <h4><?php echo $val['fullname'];?></h4>
                                                            <span><?php echo  $val['created'];?></span>
                                                            <p><?php echo $val['text'];?></p>
                                                        </div>

                                                    </div>
                                                </div>  <!-- /.comment -->
                                            </div> <!-- /.nested-comment -->
                                            <?php
                                        }
                                    }
                                }

                                ?>
                                <?php
                            }
                        }?>
                        <?php
                            echo isset($list_pagination)?$list_pagination:'';
                        ?> 
                            </div> <!-- /.comment -->
                        </div> <!-- /.box-content -->
                    </div> <!-- /.col-md-12 -->
                </div> <!-- /.row -->
                <div class="row" id="moveform" >
                    <div class="col-md-12 comment-form" >
                        <h2 class="comment-heading">Leave a Comment</h2>
                        <a href="#" id="cancle123">Cancel Comment</a>
                        <form action="" method="post">
                        <?php 
                                $message = $this->session->flashdata('message');
                                if (isset($message)) {
                                    if ($message['type']=='successful') {
                                            echo $message['message'];
                                    }else if ($message['type']=='error') {
                                            echo $message['message'];
                                    }
                                }
                         ?>
                        <?php echo validation_errors(); ?>
                        <div class="box-content" id="hideform">
                            <p>
                                <label for="name">Your Name:</label>
                                <?php 
                                    if (isset($information['fullname'])) {
                                        ?>
                                            <label for="name"><?php echo isset($information['fullname'])?$information['fullname']:'Nhập Tên Đầy Đủ';?></label>
                                        <?php
                                    }else{
                                        ?>
                                            <input type="text" name="name1" id="name" placeholder="Nhập Tên Đầy Đủ" value="">
                                        <?php
                                    }
                                ?>
 
                            </p>
                            <p>
                                <label for="email">E-mail:</label>
                                <?php 
                                    if (isset($information['email'])) {
                                        ?>
                                            <label for="email"><?php echo $information['email'];?></label>
                                        <?php
                                    }else{
                                        ?>
                                            <input type="text" name="email1" id="email" placeholder="Email" value="">
                                        <?php
                                    }
                                ?>
                            </p>
                            <p>
                                <label for="comment">Your comment:</label>
                                <textarea name="comment" id="yourcomment"></textarea>  
                            </p>
                             <input type="submit" class="mainBtn" id="submit-comment" value="Submit Comment"  name = "submit">

                        </div> <!-- /.box-content -->

                        </form>
                    </div> <!-- /.comment-form -->
                     <img src="template/icon/loading.gif" id="loadingimage" style="display:none" />
                </div> <!-- /.row -->
