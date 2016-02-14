<?php
    if (isset($_GET["action"])) {
        # code...
        if ($_GET["action"]=="add") {
            ?>
                <div class="grid_12">
            
                <div class="module">
                     <h2><span>Thêm bài viết</span></h2>
                        
                     <div class="module-body">
                        <form action="includes/xulyform.php?action=<?php echo $_GET['action'];?>" method="POST">


                            <p>
                                <label>Tiêu đề</label>
                                <input type="text" class="input-long" name="tieude">
                            </p>
                      
                            <p>
                                <label>Nội Dung Tóm Tắt</label>
                                <textarea rows="7" cols="90" class="input-long" name="tomtat"></textarea>
                            </p>
                            <p><label>Tình trạng</label></p>
                            <select name="tinhtrang">

                                <option value="1">Hiện</option>
                                <option value="0">Ẩn</option>
                            </select>   
                            
                            <fieldset>
                                <label>Textarea with WYSIWYG</label>
                                <textarea id="wysiwyg" rows="11" cols="90" name="desc" style="display: none;">    </textarea> 
                            </fieldset>
                            
                            <fieldset>
                                <input class="submit-green" type="submit" value="Thêm" > 
                                <input class="submit-gray" type="submit" value="Cancel" >
                            </fieldset>
                        </form>
                     </div> <!-- End .module-body -->

                </div>  <!-- End .module -->
                <div style="clear:both;"></div>
            </div>
            <?php
        }else if($_GET["action"] == "edit"){
            $query = "SELECT * FROM baiviet WHERE idbaiviet=".$_GET['id'];
            $result = mysql_query($query);
            $row = mysql_fetch_array($result);

            ?>
                <div class="grid_12">
            
                <div class="module">
                     <h2><span>Sửa bài viết</span></h2>
                        
                     <div class="module-body">
                        <form action="includes/xulyform.php?action=<?php echo $_GET['action'];?>&id=<?php echo $_GET['id'];?>" method="POST">
     
                            <p><label>ID: <?php echo $_GET['id'];?></label></p>

                            <p>
                                <label name="idbaiviet">Tiêu đề</label>
                                <input type="text" class="input-long" name="tieude" value="<?php echo $row['tieude'];?>">
                            </p>
                      
                            <p>
                                <label>Nội Dung Tóm Tắt</label>
                                <textarea rows="7" cols="90" class="input-long" name="tomtat"><?php echo $row['tomtat'];?></textarea>
                            </p>
                            <p><label>Tình trạng</label></p>
                            <select name="tinhtrang">
                                <option value="1">Hiện</option>
                                <option value="0">Ẩn</option>
                            </select>   
                            
                            <fieldset>
                                <label>Textarea with WYSIWYG</label>
                                <textarea id="wysiwyg" rows="11" cols="90" name="desc" style="display: none;">  <?php echo $row['noidung'];?>  </textarea> 
                            </fieldset>
                            
                            <fieldset>
                                <input class="submit-green" type="submit" value="Sửa" > 
                                <input class="submit-gray" type="submit" value="Cancel" >
                            </fieldset>
                        </form>
                     </div> <!-- End .module-body -->

                </div>  <!-- End .module -->
                <div style="clear:both;"></div>
            </div>
            <?php
        }else if ($_GET["action"]=="delete") {
            $query = "SELECT * FROM baiviet WHERE idbaiviet=".$_GET['id'];
            $result = mysql_query($query);
            $row = mysql_fetch_array($result);

            ?>
                <div class="grid_12">
            
                <div class="module">
                     <h2><span>Sửa bài viết</span></h2>
                        
                     <div class="module-body">
                        <form action="includes/xulyform.php?action=<?php echo $_GET['action'];?>&id=<?php echo $_GET['id'];?>" method="POST">

                            <p><label>ID: <?php echo $_GET['id'];?></label></p>

                            <p>
                                <label name="idbaiviet">Tiêu đề</label>
                                <input type="text" class="input-long" name="tieude" value="<?php echo $row['tieude'];?>">
                            </p>
                      
                            <p>
                                <label>Nội Dung Tóm Tắt</label>
                                <textarea rows="7" cols="90" class="input-long" name="tomtat"><?php echo $row['tomtat'];?></textarea>
                            </p>
                            <p><label>Tình trạng</label></p>
                            <select name="tinhtrang">
                                <option value="1">Hiện</option>
                                <option value="0">Ẩn</option>
                            </select>   
                            
                            <fieldset>
                                <label>Textarea with WYSIWYG</label>
                                <textarea id="wysiwyg" rows="11" cols="90" name="desc" style="display: none;">  <?php echo $row['noidung'];?>  </textarea> 
                            </fieldset>
                            
                            <fieldset>
                                <input class="submit-green" type="submit" value="Xóa" > 
                                <input class="submit-gray" type="submit" value="Cancel" >
                            </fieldset>
                        </form>
                     </div> <!-- End .module-body -->

                </div>  <!-- End .module -->
                <div style="clear:both;"></div>
            </div>

            <?php
        }
    }
?>
