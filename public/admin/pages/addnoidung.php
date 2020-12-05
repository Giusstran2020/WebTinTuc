<div class="content">
            <div class="trangchu">
                <p>Thêm nội dung</p>
            </div>
            <div class="container2">
                <div class="List_title">
                  <div style="background: white;">
                <form action="" class="noidung" method="post" enctype="multipart/form-data"> 
                    <label for="theloai" class="input_left">Tên tiêu đề:</label>
                    <input name="theloai" type="text" class="input_right" ></br>
                    <label for="tomtat" class="input_left">Tóm tắt:</label>
                    <textarea name="tomtat" type="text" class="input_right" rows="6"></textarea></br>
                    <label for="content" class="input_left">Nội dung:</label>
                    <textarea name="content" type="text" class="input_right" rows="6"></textarea></br>
                    <label for="hinhanh" class="input_left">Hình ảnh</label>
                    <input name="hinhanh" type="text" class="input_right" ></br>
                    <label for="day" class="input_left">Ngày tạo: </label>
                    <input name="day" type="text" class="input_right" ><br>
                    <label for="anhien" class="input_left">Ẩn hiện: </label>
                    <input name="anhien" type="text" class="input_right" ></br>
                    <label for="Keyword" class="input_left">Từ khóa: </label>
                    <input name="Keyword" type="text" class="input_right" ></br>
                    <label for="IdNewsType" class="input_left">Thể loại: </label>
                    <input name="IdNewsType" type="text" class="input_right" ></br>

                    <button class="add" name = "btn_submit">Thêm</button>
                </form>
                </div>
                </div>
            </div>
</div>
<?php if(isset($data["result"])){?>
    <h3> 
    <?php
        if($data["result"] == "true"){
            echo "Thêm thành công ";
        }
        else {echo "Thêm thất bại";}
    ?>
    </h3>
<?php }?>
    