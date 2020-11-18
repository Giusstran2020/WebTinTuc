<div class="content">
            <div class="trangchu">
                <p>Nhập tiêu đề </p>
            </div>
            <div class="container2">
                <form action="addtieude" name="form_add_title" method="post" >
                    <input class="txt" name="txt" type="text" placeholder="Tên thể loại"></br>
                    <p id="thongbao"></p>
                    <button class="add" name="btn_addtieude" onclick="return  kiemtradangnhap()">Thêm</button>
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
