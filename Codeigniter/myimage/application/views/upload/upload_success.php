<!-- Form elements -->    
<div class="grid_12">

	<div class="module">

		<h2><span>Form</span></h2>
             <div class="module-body">
             	<form action="">
             		<p>
                        <h3>Tiêu đề ảnh:   <?php echo set_value('title','')?></h3>
             			
             		</p>
             		<div class="notification n-success">
             			<h3>Your file was successfully uploaded!</h3>

	             			<ul>
	             				<?php foreach ($upload_data as $item => $value):?>
	             				<li><?php echo $item;?>: <?php echo $value;?></li>
	             			<?php endforeach; ?>
	             			</ul>
             		</div>

             	</form>
             </div> <!-- End .module-body -->

         </div>  <!-- End .module -->
         <div style="clear:both;"></div>
 </div> <!-- End .grid_12 -->