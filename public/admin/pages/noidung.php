<?php if(isset($data["result"])){?>
    <h3> 
    <?php
        if($data["result"]=="true"){
            $xoa = "../";
        }
        else {$xoa = "../";}
    ?>
    </h3>
<?php }else{$xoa="";}?>
<div class="content">
            <div class="trangchu">
                <p>Nội dung</p>
            </div>
            <div class="container2">
                <div class="List_title">
                  <div style="background: white;">
                        <table class="table" width="100%">
                        <tbody><tr> 
                        <td class="td">Tiêu đề</td></td>
                        <td class="td">Nội dung</td>
                        <td class="td">Hình ảnh</td>
                        <td class="td">Sửa</td>
                        <td class="td">Xóa</td>
                        </tr>
                       <?php
                        $array = $data["ds"];
                        $num = count($array);
                        for($row = 0; $row < $num; $row++){
                           // $S1 = ($array[$row][1] == "")? "" : "/";
                            echo"<tr>
                                    <td class='tdcon'>".$array[$row][0]."</td>
                                    <td class='tdcon'>".$array[$row][1]."</td>
                                    <td class='tdcon'>".$array[$row][2]."</td>
                                    <td class='tdcon'><form action='$xoa./editnoidung/".$array[$row][0]."' method = 'post'>
                            <button class='add' name='btn_editnoidung' type = 'submit'>sửa</button>
                            </form>
                            </td>
                            <td class='tdcon'><form action='$xoa./xoanoidung/".$array[$row][0]."' method = 'post'>
                            <button class='add' type='submit' onClick='return confirm(Bạn chắc chắn muốn xoá tiêu đề này?');'>xóa</button>
                            </form>
                            </tr>";
                        }
                        ?>
                    </tbody></table>
                </div>
                </div>
            </div>
            </div>