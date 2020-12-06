<div class="content">
            <div class="trangchu">
                <p>Nội dung</p>
            </div>
            <div class="container2">
                <div class="List_title">
                  <div style="background: white;">
                        <table class="table" width="100%">
                        <tbody><tr style = "font-weight: bold;"> 
                        <td class="td">Tiêu đề</td>
                        <td class="td">Tóm tắt</td>
                        <td class="td">Nội dung</td>
                        <td class="td">ID user</td>
                        <td class="td">Sửa</td>
                        <td class="td">Xóa</td>
                        </tr>
                       <?php
                
                        foreach($data["ds"] as $list){
                            echo"<tr>
                                    <td class='tdcon'>".$list->Title."</td>
                                    <td class='tdcon'>".$list->Overview."</td>
                                    <td class='tdcon'>".$list->Detail."</td>
                                    <td class='tdcon'>".$list->IdUser."</td>
                                    <td class='tdcon'><form action='".URLROOT."/admin/editnoidung/".$list->IdNews."' method = 'post'>
                                    <input name = 'btn_editnoidung' class= 'add' type = 'submit' value = 'sửa'>
                                    </form>
                                    </td> 
                                    <td class='tdcon'><form action='".URLROOT."/admin/xoanoidung/".$list->IdNews."' method = 'post'>
                                    <button  name = 'btn_deletenoidung' class='delete' type='submit'>xóa</button>
                                    </form></td>
                                    </tr>";
                        }
                        ?>
                    </tbody></table>

                    <form  action="<?php echo URLROOT; ?>/admin/addnoidung" class="form_add" method="post">
                         <button name="btn_addnoidung" class="add">Thêm</button>
                </form>
                </div>
                </div>
</div>
</div>
<?php if(isset($data["error"])){?>
    <h3> 
    <?php
        if($data["error"] == "1"){
            echo "Đăng nhập user để thêm ";
        }
    ?>
    </h3>
<?php }?>