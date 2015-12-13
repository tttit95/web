 <?php 
  if (isset($permission)) {
    if (in_array('role/edit', $permission)) {
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
                              <label>Role</label>
                              <input type="text" class="input-long" name="role" value="<?php echo set_value('role',$data['role']);?>"/>
                        </p>
                        <p>
                              <label>Permissions</label>
                              <label>Tài Khoản</label>
                              <input type="checkbox" name="checkbox[]" <?php if(isset($check) && in_array('user/view', $check)){echo 'checked';}?> value="user/view"/>Xem
                              <input type="checkbox" name="checkbox[]" <?php if(isset($check) && in_array('user/edit', $check)){echo 'checked';}?> value="user/edit">Sửa
                              <input type="checkbox" name="checkbox[]" <?php if(isset($check) && in_array('user/delete', $check)){echo 'checked';}?> value="user/delete">Xóa<br>
                              <label>Bài viết</label>
                              <input type="checkbox" name="checkbox[]" <?php if(isset($check) && in_array('articles/view', $check)){echo 'checked';}?> value="articles/view">Xem Tất Cả Bài Viết
                              <input type="checkbox" name="checkbox[]" <?php if(isset($check) && in_array('articles/view/myself', $check)){echo 'checked';}?> value="articles/view/myself">Xem Bài Viết Chính Mình
                              <input type="checkbox" name="checkbox[]" <?php if(isset($check) && in_array('articles/edit', $check)){echo 'checked';}?> value="articles/edit">Sửa
                              <input type="checkbox" name="checkbox[]" <?php if(isset($check) && in_array('articles/delete', $check)){echo 'checked';}?> value="articles/delete">Xóa
                              <input type="checkbox" name="checkbox[]" <?php if(isset($check) && in_array('articles/publish', $check)){echo 'checked';}?> value="articles/publish">Publish<br>
                              <label>Danh mục</label>
                              <input type="checkbox" name="checkbox[]" <?php if(isset($check) && in_array('category/view', $check)){echo 'checked';}?> value="category/view">Xem
                              <input type="checkbox" name="checkbox[]" <?php if(isset($check) && in_array('category/add', $check)){echo 'checked';}?> value="category/add">Thêm
                              <input type="checkbox" name="checkbox[]" <?php if(isset($check) && in_array('category/edit', $check)){echo 'checked';}?> value="category/edit">Sửa
                              <input type="checkbox" name="checkbox[]" <?php if(isset($check) && in_array('category/delete', $check)){echo 'checked';}?> value="category/delete">Xóa<br>
                              <label>Role</label>
                              <input type="checkbox" name="checkbox[]" <?php if(isset($check) && in_array('role/view', $check)){echo 'checked';}?> value="role/view">Xem
                              <input type="checkbox" name="checkbox[]" <?php if(isset($check) && in_array('role/add', $check)){echo 'checked';}?> value="role/add">Thêm
                              <input type="checkbox" name="checkbox[]" <?php if(isset($check) && in_array('role/edit', $check)){echo 'checked';}?> value="role/edit">Sửa
                              <input type="checkbox" name="checkbox[]" <?php if(isset($check) && in_array('role/delete', $check)){echo 'checked';}?> value="role/delete">Xóa<br>
                        </p>

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
