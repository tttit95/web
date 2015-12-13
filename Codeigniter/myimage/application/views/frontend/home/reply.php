<div class="row">
                    <div class="col-md-12 comment-form">
                        <h2 class="comment-heading">Leave a Comment</h2>
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
                        <div class="box-content">
                            <p>
                                <label for="name">Your Name:</label>
                                <?php 
                                    if (isset($information['fullname'])) {
                                        ?>
                                            <label for="name"><?php echo isset($information['fullname'])?$information['fullname']:'Nhập Tên Đầy Đủ';?></label>
                                        <?php
                                    }else{
                                        ?>
                                            <input type="text" name="name" id="name" placeholder="Nhập Tên Đầy Đủ" value="">
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
                                            <input type="text" name="email" id="email" placeholder="Email" value="">
                                        <?php
                                    }
                                ?>
                            </p>
                            <p>
                                <label for="comment">Your comment:</label>
                                <textarea name="comment" id="comment"></textarea>  
                            </p>
                             <input type="submit" class="mainBtn" id="submit-comment" value="Submit Comment"  name = "submit"/>
                        </div> <!-- /.box-content -->
                        </form>
                    </div> <!-- /.comment-form -->
                </div> <!-- /.row -->