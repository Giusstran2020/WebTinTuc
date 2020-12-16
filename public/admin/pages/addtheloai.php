<div class="content">
            <div class="trangchu">
                <p>Nhập thể loại </p>
            </div>
            <div class="container2">
                <form action="addtheloai" name="form_add_title" method="post" >
                    <label for="theloai" class="input_left">Tên Thể Loại</label>
                    <input class="txt" name="theloai" type="text" placeholder="Tên thể loại"></br>
                    <label for="txt_STT" class="input_left">Số thứ tự</label>
                    <input class="txt" name="txt_STT" type="text" placeholder="Số thứ tự"></br>
                    <label for="txt_anhien" class="input_left">Ẩn hiện tin</label>
                    <select class="txt"  name="txt_anhien" id="txt_anhien">
                            <option value="0"><p>Ẩn</p></option>
                            <option value="1"><p>Hiện</p></option>
                        </select>
                    <p id="thongbao"></p>
                    <button class="add" name="btn_addtheloai" onclick="return  kiemtradangnhap()">Thêm</button>
                </form>
            </div>
        </div>
    <?php if(isset($data["result"])){?>
    <h3> 
    <?php
        if($data["result"] == "true"){
            echo "Thêm thành công";
        }
        else {echo "Thêm thất bại";}
    ?>
    </h3>
<?php }?>
<?php if(isset($data["error"])){?>
    <h3> 
    <?php
       switch ($data['error']) {
        case 1:
           echo "<p> Chưa điền đủ thông tin  !!!</p>";
            break;
        case 2:
            echo "<p> Tên thể loại không hợp lệ !!!  !!!</p>";
            break;
        case 3:
            echo "<p> Số thứ tự phải là số  !!!</p>";
            break;
    }
    ?>
    </h3>
<?php }?>
