<!-- <?php /*if(isset($data["infoUsser"])) 
        {
            foreach($data['infoUsser'] as $user)
            $edit = "/".$user->IdUser;
        }
       
        else {$edit = "";}*/
?>


<div class="content">
            <div class="trangchu">
                <p>Thay Đổi Thông Tin Thành Viên</p>
            </div>
            <div class="container2">
                <div class="List_title">
                <form action="/editthanhvien" class="user" method="post">
                    <label for="username" class="input_left">Username:</label>
                    <input name="username" type="text" value="<?php/* echo $user->Username?>" readonly  class=" input_right"></br>
                    <label for="password" class="input_left">Password:</label>
                    <input name="password" type="password" value="<?php echo $user->Password;?>" class="input_right"></br>
                    <label for="hovaten" class="input_left">Họ và Tên:</label> 
                    <input  name="hovaten" type="text" value="<?php echo $user->FullName;?>" class="input_right"></br>
                    <label for="email" class="input_left">Email:</label>
                    <input name="email" type="text" value="<?php echo $user->Email;?>" class="input_right"></br>
                    <label for="birthday" class="input_left">Ngày sinh:</label>
                    <input  name="birthday" type="text" value="<?php echo $user->BirthDay;?>" class="input_right"></br>
                    <label for="gender" class="input_left">Gender:</label>
                    <input  name="gender" type="text" value="<?php echo $user->Gender;?>" class="input_right"></br>
                    <label for="level" class="input_left">Level:</label>
                    <input  name="level" type="text" value="<?php echo $user->IdGroup;?>" class="input_right"></br>
                    <lable for="permission" class="input_left">Phân Quyền: </lable>
                    <input name="permission" type="text" value="<?php echo $user->privileges;?>" class="input_right" placeholder="1-2-3-4"></br>
                    <button class="add_noidung" name = "btnEdit">Thay đổi</button>
                
                </form>
            </div>
        </div>
        </div> -->
*/?>
-->
<div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Thông tin thành viên</li>
          </ol>
          <?php 
                         foreach($data['infoUsser'] as $user){
            ?>
          <!-- Icon Cards-->
            <form action="<?php echo URLROOT;?>/admin/editthanhvien/<?php echo $user->IdUser;?>" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" readonly value="<?php echo $user->Username?>">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password"  name="password" class="form-control" id="exampleInputPassword1" placeholder="Nhập vào mật khẩu" value="<?php echo $user->Password;?>">
                </div>
                <div class="form-group">
                    <label for="hovaten">Họ và Tên</label>
                    <input type="text"  name="hovaten"  class="form-control"  required="required" placeholder="Nhập vào họ và tên" value="<?php echo $user->FullName;?>">
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required="required"   placeholder="Enter email" value="<?php echo $user->Email;?>">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <?php
                    if($user->Gender == "Nam"){
                        $checked_Nam = 'checked';
                        $checked_Nu = '';
                    }
                    else{
                        $checked_Nu = 'checked';
                        $checked_Nam= '';
                    }
                ?>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="Nam" <?php echo $checked_Nam;?>>
                    <label class="form-check-label" for="exampleRadios1">
                        Nam
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="Nữ" <?php echo $checked_Nu;?>>
                    <label class="form-check-label" for="exampleRadios2">
                        Nữ
                    </label>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="birthday">Ngày sinh</label>
                    <input name="birthday" type="date" class="form-control" id="inputCity" value="<?php echo $user->BirthDay;?>">
                    </div>
                    <div class="form-group col-md-4">
                    <label for="permission">Phân quyền</label>
                    <select name="permission" id="permission" class="form-control">
                    <?php 
                        if(isset($data['list_permission'])){
                            foreach($data['list_permission'] as $list_permission){
                                if($user->privileges == $list_permission->IdPer){
                                    echo'
                                    <option value="'.$list_permission->IdPer.'"selected >'.$list_permission->Name_per.'</option>
                                    ';
                                }
                                else{
                                    echo '
                                    <option value="'.$list_permission->IdPer.'" >'.$list_permission->Name_per.'</option>
                            ';
                                }
                        }}
                        ?>
                    </select>
                    
                    </div>
                    <div class="form-group col-md-2">
                    <label for="level">Level</label>
                    <?php 
                        $IdGroup_0 = '';
                        $IdGroup_1 = '';
                        switch ($user->IdGroup) {
                            case '0':
                                $IdGroup_0 = 'selected';
                                break;
                            case '1':
                                $IdGroup_1 = 'selected';
                                break;
                        }
                    ?>
                    <select name="level" id="level" class="form-control">
                        <option value="0" <?php echo $IdGroup_0;?>>Thành Viên</option>
                        <option value="1" <?php echo $IdGroup_1;?>>Người dùng</option>
                    </select>
                </div>
                <button type="submit" name="btnEdit" class="btn btn-primary mb-2">Sửa</button>
            </form>
            <?php }?>
            <div>
            <?php if(isset($data["result"])){?>
                <h3> 
                <?php
                    if($data["result"]=="true"){
                        echo "update thành công";
                    }
                    else {echo $data["error"];}
                ?>
                </h3>
            <?php }?>
            </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>

        </div>
        <!-- /.container-fluid -->