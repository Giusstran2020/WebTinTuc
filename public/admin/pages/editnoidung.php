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
                    <input name="theloai" type="text" value="<?php echo $list->Title; ?>"></br>
                    <label for="tomtat" class="input_left">Tóm tắt:</label>
                    <textarea name="tomtat" type="text" rows="6"><?php echo $list->Overview;?></textarea></br>
                    <label for="content" class="input_left">Nội dung:</label>
                    <textarea name="content" type="text" rows="6"><?php echo $list->Detail;?></textarea></br>
                    <label for="hinhanh" class="input_left">Hình ảnh</label>
                    <input name="hinhanh" type="text" value="<?php echo $list->UrlPics; ?>"></br>
                    <label for="day" class="input_left">Ngày tạo: </label>
                    <input name="day" type="text" value="<?php echo $list->Day; ?>"></br>
                    <!-- an hien tin -->
                    <label for="anhien" class="input_left">Ẩn hiện: </label>
                    <?php   $anhien = ($list->NewsAppear == 0)? "Ẩn" : "Hiện";
                            $_anhien = ($list->NewsAppear == 1)? "Ẩn" : "Hiện";
                            $_TypeAppear = ($list->NewsAppear == 0)? "1" : "0";
                    ?>
                    <select class="input_left"  name="anhien" id="txt_anhien">
                            <option value="<?php echo $list->NewsAppear;?>"><p><?php echo $anhien;?></p></option>
                            <option value="<?php echo $_TypeAppear;?>"><p><?php echo $_anhien;?></p></option>
                    </select></br></br>
                    <label for="Keyword" class="input_left">Từ khóa: </label></br>
                    <input name="Keyword" type="text" value="<?php echo $list->Keyword; ?>"></br>
                    <!-- danh sach the loai -->
                    <label for="IdNewsType" class="input_left">Loại tin: </label></br></br>
                    <select  name="IdNewsType" id="IdNewsType" >
                        <?php
                            foreach( $data["list_loaitin"] as $list_loaitin){
                                if($list_loaitin->IdNewsType == $list->IdNewsType){
                                    echo '
                                            <option value="'.$list_loaitin->IdNewsType.'"><p>'.$list_loaitin->NewsTypeName.'</p></option>
                                    ';              
                                }          
                            }
                            foreach( $data["list_loaitin"] as $list_loaitin){
                                if($list_loaitin->IdNewsType != $list->IdNewsType){
                                    echo '
                                            <option value="'.$list_loaitin->IdNewsType.'"><p>'.$list_loaitin->NewsTypeName.'</p></option>
                                    ';              
                                }          
                            }
                        ?>
                    </select></br></br>
                    <label for="HotNews" class="input_left">Tin nổi bật: </label>
                    <input name="HotNews" type="text"value="<?php echo $list->HotNews; ?>" ></br>
                    <button class="add" name = "btn_submit">Sửa</button>
                </form>
                </div>
                </div>
            </div>
        </div>
<?php }?>
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
