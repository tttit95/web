 <div class="grid_12">
                
            
                
                
                <div class="bottom-spacing">
                
                    <!-- Button -->
                    <div class="float-right">
                        <a href="index.php?action=add" class="button">
                        	<span>Thêm Bài Viết <img src="plus-small.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/plus-small.gif" width="12" height="9" alt="New article" /></span>
                        </a>
                    </div>
                    
                    
                </div>
                
                
                <!-- Example table -->
                <div class="module">
                	<h2><span>Bài Viết</span></h2>
                    
                    <div class="module-table-body">
                    	<form action="">
                        <table id="myTable" class="tablesorter">
                        	<thead>
                                <tr>
                                    <th style="width:5%">ID</th>
                                    <th style="width:20%">Tiêu đề</th>
                                    <th style="width:21%">Tóm tắt</th>
                                    <th style="width:21%">Created</th>
                                    <th style="width:21%">Updated</th>
                                    <th style="width:15%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                   $result = mysql_query("SELECT * FROM baiviet");
                                   $count = mysql_num_rows($result);
                                   $current_page = isset($_GET['page'])?$_GET['page']:1;
                                   $limit = 2;
                                   $total_page = ceil($count/$limit);
                                   if ($current_page > $total_page) {
                                       $current_page = $total_page;
                                   }else if ($current_page < 1) {
                                       $current_page = 1;
                                   }
                                   $start = ($current_page - 1) * $limit;
                                   $result = mysql_query("SELECT * FROM baiviet ORDER BY idbaiviet DESC LIMIT $start,$limit");
                                    while ($row = mysql_fetch_array($result)) {
                                        ?>
                                             <tr>
                                                <td class="align-center"><?php echo $row['idbaiviet'];?></td>
                                                <td><a href=""><?php echo $row['tieude'];?></a></td>
                                                <td><?php echo $row['tomtat'];?></td>
                                                <td><?php echo $row['created'];?></td>
                                                <td><?php echo $row['updated'];?></td>
                                                <td>
                                                    <a href=""><img src="<?php if($row['tinhtrang'] == 1 ){ echo 'tick-circle.gif';}else{ echo 'minus-circle.gif';}?>" tppabs="http://www.xooom.pl/work/magicadmin/images/tick-circle.gif" width="16" height="16" alt="published" /></a>
                                                    <a href="index.php?action=edit&id=<?php echo $row['idbaiviet'];?>"><img src="pencil.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/pencil.gif" width="16" height="16" alt="edit" /></a>
                                                    <a href="index.php?action=delete&id=<?php echo $row['idbaiviet'];?>"><img src="bin.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/bin.gif" width="16" height="16" alt="delete" /></a>
                                                </td>
                                            </tr>
                                        <?php
                                    }
                                ?>
                                
                            </tbody>
                        </table>
                        </form>


                        <div style="clear: both"></div>
                     </div> <!-- End .module-table-body -->
                </div> <!-- End .module -->
                
                
                     <div class="pagination">           
                		<a href="index.php?action=view&page=1" class="button"><span><img src="arrow-stop-180-small.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/arrow-stop-180-small.gif" height="9" width="12" alt="First" /> First</span></a> 
                        <a href="index.php?action=view&page=<?php echo $_GET['page'] - 1;?>" class="button"><span><img src="arrow-180-small.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/arrow-180-small.gif" height="9" width="12" alt="Previous" /> Prev</span></a>
                        <div class="numbers">
                            <span>Page:</span> 
                            <?php 
                                for($i = 1;$i <= $total_page;$i ++){
                                    if ($i == $current_page) {
                                        echo '<span class="current">'.$i.'</span><span>|</span>';
                                    }else{
                                        echo '<a href="index.php?action=view&page='.$i.'">'.$i.'</a> 
                            <span>|</span>';
                                    }
                                }
                            ?>
                            <!-- <a href="">1</a> 
                            <span>|</span> 
                            <a href="">2</a> 
                            <span>|</span> 
                            
                            <span>|</span> 
                            <a href="">4</a> 
                            <span>|</span> 
                            <a href="">5</a> 
                            <span>|</span> 
                            <a href="">6</a> 
                            <span>|</span> 
                            <a href="">7</a> 
                            <span>|</span> 
                            <span>...</span> 
                            <span>|</span> 
                            <a href="">99</a> -->
                        </div> 
                        <a href="index.php?action=view&page=<?php echo $_GET['page'] + 1;?>" class="button"><span>Next <img src="arrow-000-small.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/arrow-000-small.gif" height="9" width="12" alt="Next" /></span></a> 
                        <a href="index.php?action=view&page=<?php echo $total_page;?>" class="button last"><span>Last <img src="arrow-stop-000-small.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/arrow-stop-000-small.gif" height="9" width="12" alt="Last" /></span></a>
                        <div style="clear: both;"></div> 
                     </div>
                
                

                
			</div> <!-- End .grid_12 -->
                
