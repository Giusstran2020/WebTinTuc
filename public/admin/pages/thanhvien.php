<div class="content">
            <div class="trangchu">
                <p>Thành Viên</p>
            </div>
            <div class="container2">
                <div class="List_title">
                  <div style="background: white;">
                        <table class="table" width="100%">
                        <tbody><tr style = "font-weight: bold;"> 
                            <th>ID</th>
                            <th>Username</th>
                            <th>Họ tên</th>
                            <th>Email</th>
                            <th>Giới tính</th>
                            <th>Ngày sinh</th>
                            <th>Ngày Đăng Kí</th>
                            <th>Avatar</th>
                            <th>Level</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                        <?php
                            
                            foreach($data['listUsers'] as $user){
                            
                            echo"<tr><td class='tdcon'>".$user->IdUser."</td>
                                    <td class='tdcon'>".$user->Username."</td>
                                     <td class='tdcon'>".$user->FullName."</td>
                                     <td class='tdcon'>".$user->Email."</td>
                                     <td class='tdcon'>".$user->Gender."</td>
                                     <td class='tdcon'>".$user->BirthDay."</td>
                                     <td class='tdcon'>".$user->RegisterDay."</td>
                                     <td class='tdcon'>".$user->Avatar."</td>
                                     <td class='tdcon'>".$user->IdGroup."</td>
                                
                                <td class='tdcon'><form action='".URLROOT."/admin/editthanhvien/".$user->IdUser."' method = 'post'>
                                                    <input class= 'add' type = 'submit' value = 'sửa'>
                                                    </form>
                                                    </td> 
                                <td class='tdcon'><form action='".URLROOT."/admin/deleteUser/".$user->IdUser."' method = 'post'>
                                <button class='delete' type='submit'>xóa</button>
                                </form></td>
                                </tr>";
                            }
                        ?>
                    </tbody></table>
                </div>
                <form action="<?php echo URLROOT; ?>/admin/addThanhvien" class="form_add" method="post">
                    <button class="add">Thêm</button>
                </form>
            </div>
        </div>
</div>