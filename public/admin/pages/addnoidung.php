<div class="content">
            <div class="trangchu">
                <p>Tiêu đề</p>
            </div>
            <div class="container2">
                <div class="List_title">
                  <div style="background: white;">
                <form action="addnoidung.html" class="noidung">
                    <label for="tieude" class="input_left">Tên tiêu đề:</label>
                    <input name="tieude" type="text" class="input_right" value="$row[tieude]" readonly></br>
                    <label for="text" class="input_left">Nội dung:</label>
                    <textarea name="text" type="text" class="input_right" placeholder="nội dung"></textarea></br>
                    <label for="hinhanh" class="input_left">Hình ảnh</label>
                    <input name="hinhanh" type="text" class="input_right" placeholder="$row[hinhanh]" readonly></br>
                    <button class="add">Thêm</button>
                </form>
                </div>
                </div>
            </div>
        </div>