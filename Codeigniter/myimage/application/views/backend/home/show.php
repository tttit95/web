<?php
//print_r($data);
    if (isset($permission)) {
        if (in_array('articles/view', $permission) || in_array('articles/view/myself', $permission)) {
            ?>
            <div class="grid_12">
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
    <form action="" method="post"> 
        <div class="bottom-spacing">

            <!-- Table records filtering -->
            Filter: 
            <select class="input-short" name="articles" id="select" >
                <option value="1" selected="selected">Select filter</option>
                <option value="2">Created last week</option>
                <option value="3">Created last month</option>
                <option value="4">Edited last week</option>
                <option value="5">Edited last month</option>
            </select>
        </div>
    </form>
    <!-- Example table -->
    <div class="module">
        <h2><span>Sample table</span></h2>

        <div class="module-table-body" id="txtHint">
            <form action="" method="post">
                <table id="" class="tablesorter">
                    <thead>
                        <tr>
                            <th style="width:5%">ID</th>
                            <th style="width:20%">Title</th>
                            <th style="width:21%">Author</th>
                            <th style="width:13%">Category</th>
                            <th style="width:13%">Created</th>
                            <th style="width:15%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if (isset($data)) {
                         foreach ($data as $key => $value) {
                          ?>
                          <tr>
                            <td class="align-center"><?php echo $value['id'];?></td>
                            <td><a href="index.php/home/showsingle/<?php echo base64_encode($value['id']);?>"><?php echo $value['title'];?></a></td>
                            <td><?php echo $value['email'];?></td>
                            <td><?php echo $value['category_title'];?></td>
                            <td><?php echo $value['created'];?></td>
                            <td>
                                <input type="checkbox" name="checkbox1[]" value="<?php echo $value['id'];?>"/>
                                <?php
                                    if (isset($permission)) {
                                        if (in_array('articles/publish', $permission)) {
                                            ?>
                                                <a href="index.php/articles/publish/<?php echo $value['id'];?>/<?php echo $value['publish'];?>/<?php echo $page;?>"><img src="<?php if($value['publish']==0){echo 'template/admin/minus-circle.gif';}else{echo 'template/admin/tick-circle.gif';}?>" tppabs="http://www.xooom.pl/work/magicadmin/images/tick-circle.gif" width="16" height="16" alt="published" /></a>
                                            <?php
                                        }
                                    }
                                ?>
                                <?php
                                    if (isset($permission)) {
                                        if (in_array('articles/edit', $permission)) {
                                            ?>
                                                <a href="index.php/articles/edit/<?php echo $value['id'];?>/<?php echo $page;?>"><img src="template/admin/pencil.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/pencil.gif" width="16" height="16" alt="edit" /></a>
                                            <?php
                                        }
                                    }
                                ?>
                                <?php
                                    if (isset($permission)) {
                                        if (in_array('articles/delete', $permission)) {
                                            ?>
                                               <a href="index.php/articles/delete/<?php echo $value['id'];?>/<?php echo $page;?>"><img src="template/admin/cross_circle.png" tppabs="http://www.xooom.pl/work/magicadmin/images/bin.gif" width="16" height="16" alt="delete" /></a>
                                            <?php
                                        }
                                    }
                                ?>  
                            </td>
                        </tr>
                        <?php
                    }
                }
                ?>

            </tbody>
        </table>
        <fieldset>
            <div class="table-apply">
                <div>
                    <span>Apply action to selected:</span> 
                    <select class="input-medium" name="action1">
                        <option value="select" selected="selected">Select action</option>
                        <?php
                            if (isset($permission)) {
                                if (in_array('articles/delete', $permission)) {
                                    ?>
                                       <option value="delete">Delete</option>
                                    <?php
                                }
                            }
                        ?>
                        <?php
                            if (isset($permission)) {
                                if (in_array('articles/delete', $permission)) {
                                    ?>
                                       <option value="publish">Publish</option>
                                       <option value="unpublish">Unpublish</option>
                                    <?php
                                }
                            }
                        ?>  
                    </select>
                    <input class="submit-green" type="submit" value="Apply" name="apply">
                </div>

            </div>
        </fieldset>
        <div class="pagination">    
          <?php
             echo isset($list_pagination)?$list_pagination:'';
          ?>   
         <div style="clear: both;"></div> 
        </div>
    </form>
    <div style="clear: both"></div>
</div> <!-- End .module-table-body -->
</div> <!-- End .module -->







</div> <!-- End .grid_12 -->
            <?php
        }
    }
?>