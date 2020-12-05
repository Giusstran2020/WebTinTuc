<div class="content">
            <div class="trangchu">
                <p>Thêm Thành Viên</p>
            </div>
            <div class="container2">
                <div class="List_title">
                <form action="addthanhvien" method="post" class="user" name="addUser">
                        <lable for="username" class="input_left">Username:</lable>
                        <input name="username" type="text" class="input_right"></br>
                        <lable for="password" class="input_left">Password:</lable>
                        <input name="password" type="password" class="input_right"></br>
                        <lable for="hovaten" class="input_left">Họ và Tên:</lable>
                        <input  name="hovaten" type="text" class="input_right"></br>
                        <lable for="email" class="input_left">Email:</lable>
                        <input name="email" type="text" class="input_right"></br>
                        <lable for="level" class="input_left">Level:</lable>
                        <input name="level" type="text" class="input_right"></br>
                        <lable for="birthday" class="input_left">Ngày sinh:</lable>
                        <input name="birthday" type="text" class="input_right" placeholder="Y-m-d"></br>
                        <lable for="permission" class="input_left">Phân Quyền: </lable>
                        <input name="permission" type="text" class="input_right" placeholder="1-2-3-4"></br>
                        <lable for="gender" class="input_left">Gender:</lable>
                        <select name="gender" id="cars">
                            <option value="Nam"><p>Nam</p></option>
                            <option value="Nữ"><p>Nữ</p></option>
                        </select>
                        </br>
                        <button  class="add" name="btnadd">Thêm</button>       
                </form>
            </div>
        </div>
        </div>
    <?php if(isset($data["result"])){?>
    <h3> 
    <?php
        if($data["result"]=="true"){
            echo "Thêm thành công";
        }
        else {echo $data["error"];}
    ?>
    </h3>
<?php }?>