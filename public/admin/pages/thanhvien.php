<!--
<div class="content">
            <div class="trangchu">
                <p>Thành Viên</p>
            </div>
            <div class="container2">
                <div class="List_title">
                  <div style="background: white;">
                        <table class="table" width="100%">
                        <tbody><tr style = "font-weight: bold;"> 
                            <th>ID</th>
                            <th>Username</th>
                            <th>Họ tên</th>
                            <th>Email</th>
                            <th>Giới tính</th>
                            <th>Ngày sinh</th>
                            <th>Ngày Đăng Kí</th>
                            <th>Avatar</th>
                            <th>Level</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                        <?php
                         /*   
                            foreach($data['listUsers'] as $user){
                            
                            echo"<tr><td class='tdcon'>".$user->IdUser."</td>
                                    <td class='tdcon'>".$user->Username."</td>
                                     <td class='tdcon'>".$user->FullName."</td>
                                     <td class='tdcon'>".$user->Email."</td>
                                     <td class='tdcon'>".$user->Gender."</td>
                                     <td class='tdcon'>".$user->BirthDay."</td>
                                     <td class='tdcon'>".$user->RegisterDay."</td>
                                     <td class='tdcon'>".$user->Avatar."</td>
                                     <td class='tdcon'>".$user->IdGroup."</td>
                                
                                <td class='tdcon'><form action='".URLROOT."/admin/editthanhvien/".$user->IdUser."' method = 'post'>
                                                    <input class= 'add' type = 'submit' value = 'sửa'>
                                                    </form>
                                                    </td> 
                                <td class='tdcon'><form action='".URLROOT."/admin/deleteUser/".$user->IdUser."' method = 'post'>
                                <button class='delete' type='submit'>xóa</button>
                                </form></td>
                                </tr>";
                            }*/
                        ?>
                    </tbody></table>
                </div>
                <form action="<echo URLROOT; ?>/admin/addThanhvien" class="form_add" method="post">
                    <button class="add">Thêm</button>
                </form>
            </div>
        </div>
</div>
-->
<!-- trang thanh vien templete-->
<div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Tables</li>
            <li class="breadcrumb-item active">
                <?php
                     if(isset($_SESSION['admin']))
                     {
                         echo "ADMIN - ";
                         echo $_SESSION['admin'];
                     }
                     else{
                        if(isset($_SESSION['username'])){
                            echo "USER - ";
                            echo $_SESSION['username'];
                        }
                     }
                 ?>
            </li>
          </ol>
  <!-- DataTables Example -->
  <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Data Table Example</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                      <th>ID</th>
                      <th>Username</th>
                      <th>Fullname</th>
                      <th>Email</th>
                      <th>Level</th>
                      <th>Gender</th>
                      <th>RegisterDay</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Username</th>
                      <th>Fullname</th>
                      <th>Email</th>
                      <th>Level</th>
                      <th>Gender</th>
                      <th>RegisterDay</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php
                           
                              foreach($data['listUsers'] as $user){
                               
                               echo"<tr><td>".$user->IdUser."</a></td>
                                       <td><a href='".URLROOT."/admin/editthanhvien/".$user->IdUser."'>".$user->Username."</td>
                                        <td>".$user->FullName."</td>
                                        <td>".$user->Email."</td>
                                        <td>".$user->IdGroup."</td>
                                        <td>".$user->Gender."</td>
                                        <td>".$user->RegisterDay."</td>
                                   </tr>";
                               }
                            
                               ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>

          <p class="small text-center text-muted my-5">
            <em>More table examples coming soon...</em>
          </p>

        </div>
        <!-- /.container-fluid -->


