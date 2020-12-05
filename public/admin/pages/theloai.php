<div class="content">
            <div class="trangchu">
                <p>Thể Loại</p>
            </div>
            <div class="container2">
                <div class="List_title">
                    <div style="background: white;">
                        <table class="table" width="100%">
                        <tbody><tr> 
                        <td class="td">Tên Thể Loại</td>
                        <td class="td">ID Thể Loại</td>
                        <td class="td">Số Thứ Tự</td>
                        <td class="td">Ẩn Hiện Tin</td>
                        <?php
                            if(!isset($data['privileges'])){
                                echo "  
                                        <td class='td'>Sửa</td>
                                        <td class='td'>Xóa</td>";
                            }
                        ?>
                    </tr>
                    <?php
                    if(isset($data['privileges'])){
                        foreach($data['ds'] as $theloai){
                            echo"<tr><td class='tdcon'>".$theloai->TypeName."</td>
                            <td class='tdcon'>".$theloai->IdType."</td>
                            <td class='tdcon'>".$theloai->TypeNumber."</td>
                            <td class='tdcon'>".$theloai->TypeAppear."</td>";
                        }
                    }
                    else{
                        foreach($data['ds'] as $theloai){
                            echo"<tr><td class='tdcon'>".$theloai->TypeName."</td>
                            <td class='tdcon'>".$theloai->IdType."</td>
                            <td class='tdcon'>".$theloai->TypeNumber."</td>
                            <td class='tdcon'>".$theloai->TypeAppear."</td>
                            <td class='tdcon'><form action='".URLROOT."/admin/edittheloai/".$theloai->IdType."' method = 'post'>
                            <input name = 'btn_edittheloai' class= 'add' type = 'submit' value = 'sửa'>
                            </form>
                            </td> 
                            <td class='tdcon'><form action='".URLROOT."/admin/delete_theloai/".$theloai->IdType."' method = 'post'>
                            <button  name = '' class='delete' type='submit'>xóa</button>
                            </form></td>
                            </tr>";
                        }
                    }
                    ?>         
                        </tbody></table>
                </div>
                </div>
                <?php
                    if(!isset($data['privileges'])){
                        echo "  
                                <form action='".URLROOT."/admin/addtheloai' class='form_add' method='post'>
                                <button class='add'>Thêm</button>
                            </form>";
                    }
                ?>
               
            </div>
        </div>
