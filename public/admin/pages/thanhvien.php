<div class="content">
            <div class="trangchu">
                <p>Tiêu đề</p>
            </div>
            <div class="container2">
                <div class="List_title">
                  <div style="background: white;">
                        <table class="table" width="100%">
                        <tbody><tr> 
                        <td class="td">Username</td></td>
                        <td class="td">Họ tên</td>
                        <td class="td">Email</td>
                        <td class="td">level</td>
                        <td class="td">Sửa</td>
                        <td class="td">Xóa</td>
                        </tr>
                        <?php
                            $array = $data["ds"];
                            $num = count($array);
                            for($row = 0; $row < $num; $row++){
                            echo"<tr><td class='tdcon'>".$array[$row][0]."</td>
                                     <td class='tdcon'>".$array[$row][1]."</td>
                                     <td class='tdcon'>".$array[$row][2]."</td>
                                     <td class='tdcon'>".$array[$row][3]."</td>
                                
                                <td class='tdcon'><form action='./Get_user/".$array[$row][0]."' method = 'post'>
                                                    <input type = 'submit' value = 'sửa'>
                                                    </form>
                                                    </td>
                                <td class='tdcon'><a href=\'./deleteUser/777".$array[$row][0]."'\" onClick=\"return confirm('Bạn chắc chắn muốn xoá người dùng này?');\">Xóa</a></td>
                                
                            </tr>";
                            }
                        ?>
                    </tbody></table>
                </div>
                <form action="http://localhost:8080/lab-03/admin/addThanhvien" class="form_add">
                    <button class="add">Thêm</button>
                </form>
            </div>
        </div>
        </div>