<?php 
  if (isset($permission)) {
    if (in_array('articles/edit', $permission)) {
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
                              <input type="text" class="input-long" name="title" value="<?php echo set_value('title',$data['title']);?>"/>
                        </p>
                        <p>
                              <label>Danh mục</label>
                             <?php echo form_dropdown('category',$dropdown_option,$data['id']);?>
                        </p>
                        <fieldset>
                              <label>Textarea with WYSIWYG</label>
                              <textarea id="wysiwyg" rows="11" cols="90" name="description"><?php echo set_value('title',$data['description']);?></textarea> 
                        </fieldset>

                <fieldset>
                  <input class="submit-green" type="submit" value="Update" name="update"/> 
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
