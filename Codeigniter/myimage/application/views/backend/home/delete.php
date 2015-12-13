 <?php 
  if (isset($permission)) {
    if (in_array('articles/delete', $permission)) {
      ?>
        <!-- Form elements -->    
<div class="grid_12">

    <div class="module">
        <h2><span>Form</span></h2>
             <div class="module-body">
                <form action="" method="post">
                    <?php echo validation_errors('<span class="notification n-error">','</span>'); ?>
                    <?php 
                        $message = $this->session->flashdata('message');
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
                        <p>
                              <label>Tiêu đề ảnh</label>
                              <input type="text" class="input-long" name="title" value="<?php echo set_value('title',isset($data['title'])?$data['title']:'Không Tồn Tại');?>"/>
                        </p>
                    <fieldset>
                        <input class="submit-green" type="submit" value="Delete" name="delete"/> 
                        <input class="submit-gray" type="submit" value="Cancel" name="cancel"/>
                    </fieldset>
                </form>
             </div> <!-- End .module-body -->

         </div>  <!-- End .module -->
         <div style="clear:both;"></div>
            </div> <!-- End .grid_12 -->
      <?php
    }
  }
?>
