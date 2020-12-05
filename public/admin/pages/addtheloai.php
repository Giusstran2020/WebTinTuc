<div class="content">
            <div class="trangchu">
                <p>Nhập thể loại </p>
            </div>
            <div class="container2">
                <form action="addtheloai" name="form_add_title" method="post" >
                    <label>Tên Thể Loại</label>
                    <input class="txt" name="txt" type="text" placeholder="Tên thể loại"></br>
                    <label>Số thứ tự</label>
                    <input class="txt" name="txt_STT" type="text" placeholder="Số thứ tự"></br>
                    <label>Ẩn hiện tin</label>
                    <input class="txt" name="txt_anhien" type="text" placeholder="Ẩn hiện tin"></br>
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
