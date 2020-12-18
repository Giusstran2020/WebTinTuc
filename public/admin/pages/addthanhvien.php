<div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Thêm thành viên</li>
          </ol>

          <!-- Icon Cards-->
            <form action="addthanhvien" method="post" name="addUser">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" required="required" placeholder="Nhập vào tài khoản">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password"  name="password" class="form-control" id="exampleInputPassword1" placeholder="Nhập vào mật khẩu">
                </div>
                <div class="form-group">
                    <label for="hovaten">Họ và Tên</label>
                    <input type="text"  name="hovaten"  class="form-control"  required="required" placeholder="Nhập vào họ và tên">
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required="required"   placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="Nam" checked>
                    <label class="form-check-label" for="exampleRadios1">
                        Nam
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="Nữ">
                    <label class="form-check-label" for="exampleRadios2">
                        Nữ
                    </label>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="birthday">Ngày sinh</label>
                    <input name="birthday" type="date" class="form-control" id="inputCity">
                    </div>
                    <div class="form-group col-md-4">
                    <label for="permission">Phân quyền</label>
                    <select name="permission" id="permission" class="form-control">
                        <option value="1" selected>1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                    </div>
                    <div class="form-group col-md-2">
                    <label for="level">Level</label>
                    <select name="level" id="level" class="form-control">
                        <option value="0" selected>Thành Viên</option>
                        <option value="1">Người dùng</option>
                    </select>
                </div>
                <button type="submit" name="btnadd" class="btn btn-primary mb-2">Thêm</button>
            </form>
            <div>
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
            </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>

        </div>
        <!-- /.container-fluid -->
