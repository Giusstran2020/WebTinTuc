
<div class="content">
            <div class="trangchu">
                <p>Thay Đổi Tiêu Đề</p>
            </div>
            <div class="container2">
                <div class="List_title">
                <?php 
                    foreach($data["name"] as $theloai){
                ?>
                <form action="../edittheloai/<?php echo $theloai->IdType;?> "class="user" method="post">
                    <label for="txt" class="input_left">Tên tiêu đề:</label>
                    <input name="txt" type="text" value="<?php echo $theloai->TypeName;?>"  class=" input_right"></br>
                    <label for="txt_STT" class="input_left">Số Thứ Tự:</label>
                    <input name="txt_STT" type="text" value="<?php echo $theloai->TypeNumber;?>"  class=" input_right"></br>
                    <label for="txt_anhien" class="input_left">Ân hiện tin:</label>
                    <input name="txt_anhien" type="text" value="<?php echo $theloai->TypeAppear;?>"  class=" input_right"></br>
                    <button name="submit_edittheloai" class="add">Sửa</button>
                </form>
            </div>
        </div>
</div>
<?php 

    if(isset($data["result"])){?>
    <h3> 
    <?php
        if($data["result"] == "true"){
            echo "Sửa thành công";
        }
        else {echo "Sửa thất bại ";}
    }
    ?>
    </h3>
<?php }?>