<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>Content box</h3>
					
					<ul class="content-box-tabs">
						<li><a href="#tab1" class="default-tab">Table</a></li> <!-- href must be unique and match the id of target div -->
						<li><a href="#tab2">Add Category</a></li>
					</ul>
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
					<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
						
						<table>
							
							<thead>
								<tr>
								   <th><input class="check-all" type="checkbox" /></th>
								   <th>Category</th>
								   <th>Created</th>
								   <th>Updated</th>
								</tr>
								
							</thead>
						 
							<tfoot>
								<tr>
									<td colspan="6">
										<div class="bulk-actions align-left">
											<select name="dropdown">
												<option value="option1">Choose an action...</option>
												<option value="option2">Edit</option>
												<option value="option3">Delete</option>
											</select>
											<a class="button" href="#">Apply to selected</a>
										</div>
										
										<div class="pagination">
											<a href="#" title="First Page">&laquo; First</a><a href="#" title="Previous Page">&laquo; Previous</a>
											<a href="#" class="number" title="1">1</a>
											<a href="#" class="number" title="2">2</a>
											<a href="#" class="number current" title="3">3</a>
											<a href="#" class="number" title="4">4</a>
											<a href="#" title="Next Page">Next &raquo;</a><a href="#" title="Last Page">Last &raquo;</a>
										</div> <!-- End .pagination -->
										<div class="clear"></div>
									</td>
								</tr>
							</tfoot>
						 
							<tbody>
							<!-- begin show data -->
							<?php 
								foreach ($data as $key => $value) {
									?>
										<tr>
											<td><input type="checkbox" /></td>
											<td><a href="#" title="category"><?php echo $value['category'];?></a></td>
											<td><?php echo $value['created'];?></td>
											<td><?php echo $value['updated'];?></td>
											<td>
												<!-- Icons -->
												 <a href="#" title="Edit"><img src="template/admin/resources/images/icons/pencil.png" alt="Edit" /></a>
												 <a href="#" title="Delete"><img src="template/admin/resources/images/icons/cross.png" alt="Delete" /></a> 
												 <a href="#" title="Edit Meta"><img src="template/admin/resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>
											</td>
										</tr>
									<?php
								}
							?>
							<!-- end -->

							</tbody>
							
						</table>
						
					</div> <!-- End #tab1 -->
					
					<div class="tab-content" id="tab2">
					
						<form action="" method="post">
						<?php 
							$message = $this->session->flashdata('message');
							if($message['type'] == 'successful'){
								?>
									<div class="notification success png_bg">
										<a href="#" class="close"><img src="template/admin/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
										<div>
											<?php echo $message['message'];?>
										</div>
									</div>
								<?php
							}else if($message['type'] == 'error'){
								?>
									<div class="notification error png_bg">
										<a href="#" class="close"><img src="template/admin/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
										<div>
											<?php echo $message['message'];?>
										</div>
									</div>
								<?php
							}
						?>
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								<p>
									<label>Category</label>
										<input class="text-input small-input" type="text" id="small-input" name="category" /> <!-- Classes for input-notification: success, error, information, attention -->
										<br />
								</p>
								<p>
									<label>Category Parent</label>   
									<?php

									 if (isset($dropdown)) {
										if (isset($dropdown)) {
											echo form_dropdown('parentid', $dropdown);
										}
										
									}?>           
								</p>		
								<p>
									<input class="button" type="submit" value="Submit" name="submit"/>
								</p>
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						
					</div> <!-- End #tab2 -->        
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->