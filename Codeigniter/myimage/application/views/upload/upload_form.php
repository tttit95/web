
<!-- Form elements -->    
<div class="grid_12">

	<div class="module">
		<h2><span>Form</span></h2>
             <div class="module-body">
             	<form action="http://localhost/photo/index.php/articles/do_upload" method="post" accept-charset="utf-8" enctype="multipart/form-data">
             		<?php echo validation_errors('<span class="notification n-error">','</span>'); ?>
             		<?php echo $error;?>
                        <p>
                              <label>Tiêu đề ảnh</label>
                              <input type="text" class="input-long" name="title"/>
                        </p>
                        <p>
                              <label>Nguồn</label>
                              <input type="text" class="input-long" name="source" value="Internet"/>
                        </p>
                        <p>
                              <label>Danh mục</label>
                             <?php echo form_dropdown('category',$dropdown_option);?>
                        </p>
             		<p>
             			<input type="file" class = "submit-green" name="userfile" size="20"/>

             		</p>
                        <fieldset>
                              <label>Textarea with WYSIWYG</label>
                              <textarea id="wysiwyg" rows="11" cols="90" name="description"></textarea> 
                        </fieldset>

             		<fieldset>
             			<input class="submit-green" type="submit" value="Upload" name="upload"/> 
             			<input class="submit-gray" type="submit" value="Cancel" name="cancel"/>
             		</fieldset>
             	</form>
             </div> <!-- End .module-body -->

         </div>  <!-- End .module -->
         <div style="clear:both;"></div>
            </div> <!-- End .grid_12 -->