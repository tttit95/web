            <form action="" method="post">
                <table id="" class="tablesorter">
                    <thead>
                        <tr>
                            <th style="width:5%">ID</th>
                            <th style="width:20%">Email</th>
                            <th style="width:20%">Role</th>
                            <th style="width:13%">Last Login</th>
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
                            <td><?php echo $value['email']?></td>
                            <td><?php echo $value['role']?></td>
                            <td><?php echo $value['last_login']?></td>
                            <td><?php echo $value['created']?></td>
                            <td>
                                <input type="checkbox" name="checkbox[]" value="<?php echo $value['id']?>">
                                <?php
                                if (isset($permission)) {
                                    if (in_array('user/edit', $permission)) {
                                        ?>
                                            <a href="index.php/user/edit/<?php echo $value['id'];?>/<?php echo $page;?>"><img src="template/admin/pencil.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/pencil.gif" width="16" height="16" alt="edit"></a>
                                        <?php
                                    }
                                }
                                ?>
                                <?php
                                if (isset($permission)) {
                                    if (in_array('user/delete', $permission)) {
                                        ?>
                                            <a href="index.php/user/delete/<?php echo $value['id'];?>/<?php echo $page;?>"><img src="template/admin/cross_circle.png" tppabs="http://www.xooom.pl/work/magicadmin/images/bin.gif" width="16" height="16" alt="delete"></a>
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

        <?php
        if (isset($permission)) {
            if (in_array('user/delete', $permission)) {
             ?>
             <fieldset>
                <div class="table-apply">
                    <div>
                        <span>Apply action to selected:</span> 
                        <select class="input-medium" name="action">
                            <option value="select" selected="selected">Select action</option>
                            <option value="delete">Delete</option>
                        </select>
                        <input class="submit-green" type="submit" value="Apply" name="apply">
                    </div>

                </div>
            </fieldset>
            <?php
        }
    }
    ?>
    <div class="pagination">    
  <?php
    echo isset($list_pagination)?$list_pagination:'';
  ?>   
  <div style="clear: both;"></div> 
</div>
    
</form>