<?php if(isset($data["infoUsser"])) 
        {
            foreach($data['infoUsser'] as $user)
            $edit = "/".$user->username;
        }
       
        else {$edit = "";}
?>


<div class="content">
            <div class="trangchu">
                <p>Thay Đổi Thông Tin Thành Viên</p>
            </div>
            <div class="container2">
                <div class="List_title">
                <form action="../editthanhvien<?php echo $edit; ?>" class="user" method="post">
                    <?php 
                         foreach($data['infoUsser'] as $user){
                    ?>
                    <label for="username" class="input_left">Username:</label>
                    <input name="username" type="text" value="<?php echo $user->username?>" readonly  class=" input_right"></br>
                    <label for="password" class="input_left">Password:</label>
                    <input name="password" type="password" value="<?php echo $user->password;?>" class="input_right"></br>
                    <label for="hovaten" class="input_left">Họ và Tên:</label> 
                    <input  name="hovaten" type="text" value="<?php echo $user->hoten;?>" class="input_right"></br>
                    <label for="email" class="input_left">Email:</label>
                    <input name="email" type="text" value="<?php echo $user->email;?>" class="input_right"></br>
                    <label for="level" class="input_left">Level:</label>
                    <input  name="level" type="text" value="<?php echo $user->level;?>" class="input_right"></br>
                    <button class="add_noidung" name = "btnEdit">Thay đổi</button>
                <?php }?>
                </form>
            </div>
        </div>
        </div>