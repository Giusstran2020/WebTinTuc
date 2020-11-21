<?php if(isset($data["result"])){?>
    <h3> 
    <?php
        $edit = "../";
        if($data["result"]=="true"){
            $xoa = "../";
        }
        else {$xoa = "../";}
    ?>
    </h3>
<?php }else{$xoa=""; $edit = "";}?>
<div class="content">
            <div class="trangchu">
                <p>Tiêu đề</p>
            </div>
            <div class="container2">
                <div class="List_title">
                    <div style="background: white;">
                        <table class="table" width="100%">
                        <tbody><tr> 
                        <td class="td">Tên tiêu đề</td></td>
                        <td class="td">Sửa</td>
                        <td class="td">Xóa</td>
                    </tr>
                    <?php
                        $array = $data["ds"];
                        $num = count($array);
                        for($row = 0; $row < $num; $row++){
                            echo"<tr><td class='tdcon'>".$array[$row]."</td>
                            <td class='tdcon'><form action='$edit./edittieude/".$array[$row]."' method = 'post'>
                            <button class='add' name='btn_edittieude' type = 'submit'>sửa</button>
                            </form>
                            </td>
                            <td class='tdcon'><form action='$xoa./xoatieude/".$array[$row]."' method = 'post'>
                            <button class='add' type='submit' onClick='return confirm(Bạn chắc chắn muốn xoá tiêu đề này?');'>xóa</button>
                            </form>
                            </tr>";
                        }
                    ?>          
                        </tbody></table>
                </div>
                </div>
                <form action="<?php echo $xoa;?>addtieude" class="form_add" method="post">
                    <button class="add">Thêm</button>
                </form>
            </div>
        </div>

   
