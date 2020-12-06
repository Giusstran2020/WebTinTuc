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
    foreach($data["ds"] as $list){
?>


<div class="content">
            <div class="trangchu">
                <p>Nội dung</p>
            </div>
            <div class="container2">
                <div class="List_title">
                  <div style="background: white;">
                <form action="../editnoidung/<?php echo $list->IdNews ?>" class="noidung" method="post" enctype="multipart/form-data"> 
                    <label for="theloai" class="input_left">Tên tiêu đề:</label>
                    <input name="theloai" type="text" class="input_right" value="<?php echo $list->Title; ?>"></br>
                    <label for="tomtat" class="input_left">Tóm tắt:</label>
                    <textarea name="tomtat" type="text" class="input_right" rows="6"><?php echo $list->Overview;?></textarea></br>
                    <label for="content" class="input_left">Nội dung:</label>
                    <textarea name="content" type="text" class="input_right" rows="6"><?php echo $list->Detail;?></textarea></br>
                    <label for="hinhanh" class="input_left">Hình ảnh</label>
                    <input name="hinhanh" type="text" class="input_right" value="<?php echo $list->UrlPics; ?>"></br>
                    <label for="day" class="input_left">Ngày tạo: </label>
                    <input name="day" type="text" class="input_right" value="<?php echo $list->Day; ?>"></br>
                    <label for="anhien" class="input_left">Ẩn hiện: </label>
                    <input name="anhien" type="text" class="input_right" value="<?php echo $list->NewsAppear; ?>"></br>
                    <label for="Keyword" class="input_left">Từ khóa: </label>
                    <input name="Keyword" type="text" class="input_right" value="<?php echo $list->Keyword; ?>"></br>
                    <label for="IdNewsType" class="input_left">Thể loại: </label>
                    <input name="IdNewsType" type="text" class="input_right" value="<?php echo $list->IdNewsType; ?>"></br>
                    <label for="HotNews" class="input_left">Tin nổi bật: </label>
                    <input name="HotNews" type="text" class="input_right"value="<?php echo $list->HotNews; ?>" ></br>
                    <button class="add" name = "btn_submit">Sửa</button>
                </form>
                </div>
                </div>
            </div>
        </div>
<?php }?>