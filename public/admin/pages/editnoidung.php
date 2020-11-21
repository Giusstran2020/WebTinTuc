<?php if(isset($data["result"])){?>
    <h3> 
    <?php
        if($data["result"] == "true"){
            echo "Sửa thành công ";
        }
        else {echo "Sửa thất bại";}
    ?>
    </h3>
<?php }?>
<?php
if(isset($data["ds"])){
    $array = $data["ds"];
    }
?>


<div class="content">
            <div class="trangchu">
                <p>Tiêu đề</p>
            </div>
            <div class="container2">
                <div class="List_title">
                  <div style="background: white;">
                <form action="../editnoidung/<?php echo $array[0][0] ?>" class="noidung" method="post">
                    <label for="tieude" class="input_left">Tên tiêu đề:</label>
                    <input name="tieude" type="text" class="input_right" value="<?php echo $array[0][0] ?>" readonly></br>
                    <label for="text" class="input_left">Nội dung:</label>
                    <textarea name="text" type="text" class="input_right"> <?php echo $array[0][1]?> </textarea></br>
                    <label for="hinhanh" class="input_left">Hình ảnh</label>
                    <input name="hinhanh" type="text" class="input_right" value="<?php echo $array[0][2]?>"></br>
                    <button class="add" name = "btn_submit">Thêm</button>
                </form>
                </div>
                </div>
            </div>
        </div>
