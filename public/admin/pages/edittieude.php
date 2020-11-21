
<div class="content">
            <div class="trangchu">
                <p>Thay Đổi Tiêu Đề</p>
            </div>
            <div class="container2">
                <div class="List_title">
                <form action="../edittieude/<?php echo $data["name"];?> "class="user" method="post">
                    <label for="txt" class="input_left">Tên tiêu đề:</label>
                    <input name="txt" type="text" value="<?php echo $data["name"];?>"  class=" input_right"></br>
                    <button name="submit_edittieude" class="add">Sửa</button>
                </form>
            </div>
        </div>
</div>
<?php if(isset($data["result"])){?>
    <h3> 
    <?php
        if($data["result"] == "true"){
            echo "Sửa thành công"." $data[name] được thay thế ";
        }
        else {echo "Sửa thất bại $data[name] không được thay thế ";}
    ?>
    </h3>
<?php }?>