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
                        <tr><td class='tdcon'>$row[username]</td>
                            <td class='tdcon'>$row[hovaten]</td>
                            <td class='tdcon'>$row[email]</td>
                               <td class='tdcon'>$row[level]</td>
                            <td class='tdcon'><a href="editThanhvien.html">Sửa</a></td>
                            <td class='tdcon'><a href="#">Xóa</a></td>
                       </tr>
                    </tbody></table>
                </div>
                <form action="addThanhvien.html" class="form_add">
                    <button class="add">Thêm</button>
                </form>
            </div>
        </div>
        </div>