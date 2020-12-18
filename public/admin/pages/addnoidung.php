<div class="content">
            <div class="trangchu">
                <p>Thêm nội dung</p>
            </div>
            <div class="container2">
                <div class="List_title">
                  <div style="background: white;">
                <form action="" class="noidung" method="post" enctype="multipart/form-data"> 
                    <label for="theloai" class="input_left">Tên tiêu đề:</label>
                    <input name="theloai" type="text" ></br>
                    <label for="tomtat" class="input_left">Tóm tắt:</label>
                    <textarea name="tomtat" type="text" rows="6"></textarea></br>
                    <label for="content" class="input_left">Nội dung:</label>
                    <textarea name="content" type="text" rows="6"></textarea></br>
                    <label for="hinhanh" class="input_left">Hình ảnh</label>
                    <input name="hinhanh" type="text" ></br>
                    <!--An hien tin-->
                    <label for="anhien" class="input_left">Ẩn hiện: </label>
                    <select  name="anhien" id="txt_anhien">
                            <option value="0"><p>Ẩn</p></option>
                            <option value="1"><p>Hiện</p></option>
                    </select></br>
                    <label for="Keyword" class="input_left">Từ khóa: </label>
                    <input name="Keyword" type="text" ></br>
                    <!--Data đổ về data['list_theloai'] -->
                    <label for="IdNewsType" class="input_left">Loại tin: </label>
                    <select  name="IdNewsType" id="IdNewsType" >
                        <?php
                            foreach( $data["list_loaitin"] as $list_loaitin){
                                echo '
                                        <option value="'.$list_loaitin->IdNewsType.'"><p>'.$list_loaitin->NewsTypeName.'</p></option>
                                ';                        
                            }
                        ?>
                        </select></br>
                    <label for="HotNews" class="input_left">Tin nổi bật: </label>
                    <input name="HotNews" type="text" ></br>

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
<?php }
?>
<?php if(isset($data["error"])){?>
    <h3> 
    <?php
       switch ($data['error']) {
        case 1:
           echo "<p> Chưa điền đủ thông tin  !!!</p>";
            break;
    }
    ?>
    </h3>
<?php }?>

    