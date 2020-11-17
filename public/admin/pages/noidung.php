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
                        <tr><td class='tdcon'>$row[tieude]</td>
                            <td class='tdcon'>$row[noidung]</td>
                            <td class='tdcon'>$row[hinhanh]</td>
                            <td class='tdcon'><a href="addnoidung.html">Sửa</a></td>
                            <td class='tdcon'><a href="#">Xóa</a></td>
                       </tr>
                    </tbody></table>
                <form action="addnoidung.html" class="noidung" name="form_noidung">
                    <label for="tieude" class="input_left">Chọn tiêu đề:</label>
                    <input name="tieude" type="text" class="input_right" placeholder="Tên tiêu đề" value="">
                    <p id="thongbao"></p>
                    <button class="add" onclick="return kiemtradangnhap()">Tìm kiếm</button>
                </form>
                </div>
                </div>
            </div>
            </div>