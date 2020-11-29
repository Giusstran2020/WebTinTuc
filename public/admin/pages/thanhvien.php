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
                <p>Thành Viên</p>
            </div>
            <div class="container2">
                <div class="List_title">
                  <div style="background: white;">
                        <table class="table" width="100%">
                        <tbody><tr style = "font-weight: bold;"> 
                            <th>Username</th>
                            <th>Họ tên</th>
                            <th>Email</th>
                            <th>Level</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                        <?php
                            
                            foreach($data['listUsers'] as $user){
                            
                            echo"<tr><td class='tdcon'>".$user->username."</td>
                                     <td class='tdcon'>".$user->hoten."</td>
                                     <td class='tdcon'>".$user->email."</td>
                                     <td class='tdcon'>".$user->level."</td>
                                
                                <td class='tdcon'><form action='$edit./editthanhvien/".$user->username."' method = 'post'>
                                                    <input type = 'submit' value = 'sửa'>
                                                    </form>
                                                    </td>
                                <td class='tdcon'><form action='$xoa./deleteUser/".$user->username."' method = 'post' onsubmit='return confirm('Bạn chắc chắn muốn xoá tiêu đề này?');'>
                                <button class='add' type='submit'>xóa</button>
                                </form>
                                </tr>";
                            }
                        ?>
                    </tbody></table>
                </div>
                <form action="http://localhost:8080/lab-03/admin/addThanhvien" class="form_add" method="post">
                    <button class="add">Thêm</button>
                </form>
            </div>
        </div>
</div>