<?php 
    class admin extends Controller{
        public $adminModel;
        public $userModel;
        public $noidungModel;
        public $theloaiModel;
        public function __construct(){
            //Model 
            $this->userModel = $this->model("usersModel");
            $this->noidungModel = $this->model("noidungModel");
            $this->theloaiModel = $this->model("theloaiModel");
            $this->adminModel = $this->model("adminModel");
        }
        function SayHi(){
            if(isset($_SESSION['username']) || isset($_SESSION['admin'])){
                $this->view("admin",[
                    "pages" => "admin",
                ]);
            }
            else{
                $this->view("admin",[
                    "pages" => "login",
                    "error" => "0"
                ]);
            }
        }
        function login(){
                if(isset($_POST['btnadminLogin'])){
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    if($username != null && $password != null){
                        $check_admin_all = $this->adminModel->check_admin_all($username,$password);
                        $check_admin_user = $this->userModel->check_admin_user($username,$password);
                        if($check_admin_all == "true"){
                            $_SESSION['admin'] = $username;
                            $this->view("admin",[
                                "pages" => "admin"
                            ]);
                        }
                        else{
                            if($check_admin_user == "true"){
                                $_SESSION['username'] = $username;
                                $privilege = $this->userModel->getPrivileges($username);
                                $_SESSION['privileges'] = $privilege->privileges;
                                $idusers = $this->userModel->getIDuser($username);
                                $_SESSION['IdUser'] = $idusers->IdUser;
                                
                                $this->view("admin",[
                                    "pages" => "admin"
                                ]);
                            }
                            else{
                                $this->view("admin",[
                                    "pages" => "login",  
                                    "error" => "1",        
                                ]);
                            }
                        }
                    }
                    else{
                        $this->view("admin",[
                            "pages" => "login",  
                            "error" => "1",        
                        ]);
                    }
                }
                else{
                    $this->view("admin",[
                        "pages" => "login",
                        "error" => "0"
                    ]);
                }
        }
        function logout(){
            if(isset($_SESSION['username']) || isset($_SESSION['admin'])){
                unset($_SESSION['username']);
                unset($_SESSION['admin']);
                unset($_SESSION['privileges']);
                unset($_SESSION['IdUser']);
                $this->view("admin",[
                    "pages" => "login",
                    "error" => "0",

                ]);
            }
            else{
                $this->view("admin",[
                    "pages" => "login",
                    "error" => "0",
                ]);
            }
    }
    // Kết thuc trang login
       
    //Phân the lọai
        function theloai(){
            if(isset($_SESSION['admin'])){
                $listtheloai = $this->theloaiModel->dstheloai();
                $this->view("admin",[
                    "pages" => "theloai",
                    "ds"    => $listtheloai,
                ]);
            }
            else{
                if(isset($_SESSION['username'])){
                    $listtheloai = $this->theloaiModel->dstheloai();
                    $this->view("admin",[
                    "pages" => "theloai",
                    "ds"    => $listtheloai,
                    "privileges" => $_SESSION['privileges']
                ]);
                }
                else{
                    $this->view("admin",[
                        "pages" => "login",
                    ]);
                }
            }
        }
        
        //Add the lọai
        function addtheloai(){
            if(isset($_SESSION['username']) || isset($_SESSION['admin'])){
                if(isset($_POST["btn_addtheloai"])){    
                    $theloai = $_POST['txt'];
                    $STT = $_POST['txt_STT'];
                    $anhien = $_POST['txt_anhien'];
                    $check_theloai = $this->theloaiModel->check_theloai($theloai);
                    if($check_theloai == "false"){
                        $kq = $this->theloaiModel->Insert_theloai($theloai,$STT,$anhien);
                        $this->view("admin",[
                            "pages"  => "addtheloai",
                            "result" => $kq,
                        ]);  
                    }
                    else{
                        $this->view("admin",[
                            "pages" => "addtheloai",
                            "result" => "false"
                        ]);
                    }
                }
                else{
                    $this->view("admin",[
                        "pages" => "addtheloai"
                    ]);
                }
            }
            else{
                $this->view("admin",[
                    "pages" => "login",
                ]);
            }
        }
        function delete_theloai($IdType){
            if(isset($_SESSION['username']) || isset($_SESSION['admin'])){
                if(isset($_POST["btn_edittheloai"])){
                    $kq = $this->theloaiModel->delete_theloai($IdType);
                    $ds = $this->theloaiModel->dstheloai();
                    $this->view("admin",[
                        "pages" => "theloai",
                        "ds"    => $ds,
                    ]);
                }
                else{
                    $this->view("admin",[
                        "pages" => "login",
                    ]);
                }
            }
            else{
                $ds = $this->theloaiModel->dstheloai();
                $this->view("admin",[
                    "pages" => "theloai",
                    "ds"    => $ds,
                ]);
            }
        }
        
        function edittheloai($IdType){
            if(isset($_SESSION['username']) || isset($_SESSION['admin'])){
                if(isset($_POST["btn_edittheloai"])){
                        $ds = $this->theloaiModel->GetInfotheloai($IdType);
                        $this->view("admin",[
                            "pages" => "edittheloai",
                            "name"    => $ds,
                        ]);
                }
                else{
                    if(isset($_POST["submit_edittheloai"])){
                        $_theloai = $_POST["txt"];
                        $STT = $_POST["txt_STT"];
                        $anhien = $_POST["txt_anhien"];
                        $kq = $this->theloaiModel->update_theloai($IdType,$_theloai,$STT,$anhien);
                        $ds = $this->theloaiModel->GetInfotheloai($IdType);
                        $this->view("admin",[
                            "pages"  => "edittheloai",
                            "result" => $kq,
                            "name" =>   $ds,
                        ]);      
                    }
                    
                }
            }
            else{
                $this->view("admin",[
                    "pages" => "login",
                ]);
            }
        }
        //Hết phần tiêu đề  PDO xong

        // Phần nội dung
        function noidung(){
            if(isset($_SESSION['admin'])){
                $ds = $this->noidungModel->dsnoidung();
                $this->view("admin",[
                    "pages" => "noidung",
                    "ds"    => $ds,
                ]);
            }
            else{
                if(isset($_SESSION['username'])){
                    $IdUser = $_SESSION['IdUser'];
                    $ds = $this->noidungModel->dsnoidung_user($IdUser);
                    $this->view("admin",[
                        "pages" => "noidung",
                        "ds"    => $ds,
                    ]);
                }
                else{
                    $this->view("admin",[
                        "pages" => "login",
                    ]);
                }      
            }
        }
        function xoanoidung($IdNews){
            if(isset($_SESSION['admin'])){
                if(isset($_POST['btn_deletenoidung'])){
                    $lists = $this->noidungModel->get_noidung($IdNews);
                    foreach($lists as $list){
                        $IdNewsType = $list->IdNewsType;
                    }
                    $kq = $this->noidungModel->delete_noidung($IdNews,$IdNewsType);
                    $ds = $this->noidungModel->dsnoidung();
                    $this->view("admin",[
                        "pages" => "noidung",
                        "ds"    => $ds,
                        "result"    => $kq
                    ]);
                }
                else{
                    $ds = $this->noidungModel->dsnoidung();
                    $this->view("admin",[
                        "pages" => "noidung",
                        "ds"    => $ds,
                    ]);
                }
            }
            else{
                if(isset($_SESSION['username'])){
                    $IdUser = $_SESSION['IdUser'];
                    if(isset($_POST['btn_deletenoidung'])){
                        $check_iduser = $this->noidungModel->check_iduser($IdUser,$IdNews);
                        if($check_iduser == "true"){
                            $lists = $this->noidungModel->get_noidung($IdNews);
                            foreach($lists as $list){
                                $IdNewsType = $list->IdNewsType;
                            }
                            $kq = $this->noidungModel->delete_noidung($IdNews,$IdNewsType);
                            $ds = $this->noidungModel->dsnoidung_user($IdUser);
                            $this->view("admin",[
                                "pages" => "noidung",
                                "ds"    => $ds,
                                "result"    => $kq
                            ]);
                        }
                        else{
                            $ds = $this->noidungModel->dsnoidung_user($IdUser);
                            $this->view("admin",[
                            "pages" => "noidung",
                            "ds"    => $ds,
                            ]);
                        }
                    }
                    else{
                        $ds = $this->noidungModel->dsnoidung_user($IdUser);
                        $this->view("admin",[
                        "pages" => "noidung",
                        "ds"    => $ds,
                        ]);
                    }
                }else{
                    $this->view("admin",[
                        "pages" => "login",
                    ]);
                } 
            }
        }
        function editnoidung($IdNews){
            if(isset($_SESSION['admin'])){
                if(isset($_POST["btn_editnoidung"])){
                    $ds = $this->noidungModel->get_noidung($IdNews);
                    $this->view("admin",[
                        "pages" => "editnoidung",
                        "ds"    => $ds,
                    ]);
                }
                else{
                    if(isset($_POST["btn_submit"])){
                        $ds = $this->noidungModel->get_noidung($IdNews);
                        foreach($ds as $list){
                            $IdNewsType = $list->IdNewsType;
                        }
                        $Title = isset($_POST["theloai"]) ?  htmlspecialchars($_POST["theloai"]) : '';
                        $_Overview = isset($_POST["tomtat"]) ?  htmlspecialchars($_POST["tomtat"]) : '';
                        $_Detail = isset($_POST["content"]) ?  htmlspecialchars($_POST["content"]) : '';
                        $_UrlPics = isset($_POST["hinhanh"]) ?  htmlspecialchars($_POST["hinhanh"]) : '';
                        $_NewsAppear = isset($_POST["anhien"]) ?  htmlspecialchars($_POST["anhien"]) : '';
                        $_Keyword = isset($_POST["Keyword"]) ?  htmlspecialchars($_POST["Keyword"]) : '';
                        $_IdNewsType = isset($_POST["IdNewsType"]) ?  htmlspecialchars($_POST["IdNewsType"]) : '';
                        if(isset($_POST["day"])){
                            $Day = date_create($_POST['day']);
                            $_Day = date_format($Day,"Y/m/d");
                        }else{
                            $Day = getdate();
                            $_Day = date_format($Day,"Y/m/d");
                        }
                        $kq = $this->noidungModel->update_noidung($IdNews,$Title,$_Overview,$_Detail,$_UrlPics,$_NewsAppear,$_Keyword,$_Day,$_IdNewsType,$IdNewsType);
                        $ds = $this->noidungModel->get_noidung($IdNews);
                        $this->view("admin",[
                            "pages" => "editnoidung",
                            "result"    => $kq,
                            "ds"    => $ds,
                        ]);
                    }
                    else{
                        $ds = $this->noidungModel->dsnoidung();
                        $this->view("admin",[
                            "pages" => "noidung",
                            "ds"    => $ds,
                        ]);
                    }
                }
            }
            else{
                if(isset($_SESSION['username'])){
                    $IdUser = $_SESSION['IdUser'];
                    if(isset($_POST["btn_editnoidung"])){
                        $check = $this->noidungModel->check_iduser($IdUser,$IdNews);
                        if($check = "true"){
                            $ds = $this->noidungModel->get_noidung($IdNews);
                            $this->view("admin",[
                            "pages" => "editnoidung",
                            "ds"    => $ds,
                            ]);
                        }
                        else{
                            $ds = $this->noidungModel->dsnoidung_user($IdUser);
                            $this->view("admin",[
                            "pages" => "noidung",
                            "ds"    => $ds,
                        ]);
                        }
                    }
                    else{
                        if(isset($_POST["btn_submit"])){
                            $ds = $this->noidungModel->get_noidung($IdNews);
                            foreach($ds as $list){
                                $IdNewsType = $list->IdNewsType;
                            }
                            $Title = isset($_POST["theloai"]) ?  htmlspecialchars($_POST["theloai"]) : '';
                            $_Overview = isset($_POST["tomtat"]) ?  htmlspecialchars($_POST["tomtat"]) : '';
                            $_Detail = isset($_POST["content"]) ?  htmlspecialchars($_POST["content"]) : '';
                            $_UrlPics = isset($_POST["hinhanh"]) ?  htmlspecialchars($_POST["hinhanh"]) : '';
                            $_NewsAppear = isset($_POST["anhien"]) ?  htmlspecialchars($_POST["anhien"]) : '';
                            $_Keyword = isset($_POST["Keyword"]) ?  htmlspecialchars($_POST["Keyword"]) : '';
                            $_IdNewsType = isset($_POST["IdNewsType"]) ?  htmlspecialchars($_POST["IdNewsType"]) : '';
                            if(isset($_POST["day"])){
                                $Day = date_create($_POST['day']);
                                $_Day = date_format($Day,"Y/m/d");
                            }else{
                                $Day = getdate();
                                $_Day = date_format($Day,"Y/m/d");
                            }
                            $kq = $this->noidungModel->update_noidung($IdNews,$Title,$_Overview,$_Detail,$_UrlPics,$_NewsAppear,$_Keyword,$_Day,$_IdNewsType,$IdNewsType);
                            $ds = $this->noidungModel->get_noidung($IdNews);
                            $this->view("admin",[
                                "pages" => "editnoidung",
                                "result"    => $kq,
                                "ds"    => $ds,
                            ]);
                        }
                        else{
                            $ds = $this->noidungModel->dsnoidung_user($IdUser);
                            $this->view("admin",[
                            "pages" => "noidung",
                            "ds"    => $ds,
                        ]);
                        }
                    }
                }
                else{
                    $this->view("admin",[
                        "pages" => "login",
                    ]);
                }      
            }
        }
        function addnoidung(){
            if(isset($_SESSION['admin'])){
                if(isset($_POST['btn_addnoidung'])){
                    $ds = $this->noidungModel->dsnoidung();
                        $this->view("admin",[
                            "pages" => "noidung",
                            "ds"    => $ds,
                            "error"    => "1",
                        ]);
                }
                else{

                }
            }
            else{

            }
        }
        function noidungpic(){
            if(isset($_SESSION['admin'])){
                $listNoidung = $this->noidungModel->dsnoidung();
                $this->view("admin",[
                    "pages" => "noidungpic",
                    "list_noidung" => $listNoidung,     
                ]);
            }
            else{
                if(isset($_SESSION['username'])){
                        $IdUser = $_SESSION['IdUser'];
                        $listNoidung = $this->noidungModel->dsnoidung_user($IdUser);
                        $this->view("admin",[
                        "pages" => "noidungpic",
                        "list_noidung" => $listNoidung,
                        ]);
                }
                else{
                    $this->view("admin",[
                        "pages" => "login",
                    ]);
                }
            }
        }
        // Hết phần nội dung

        //Phân thành viên -------------------------------- PDO
        function thanhvien(){
            if(isset($_SESSION['admin'])){
                $listUsers = $this->userModel->getUsers();
                $this->view("admin",[
                    "pages" => "thanhvien",
                    "listUsers" => $listUsers
                ]);
            }
            else{
                if(isset($_SESSION['username'])){
                    $this->view("admin",[
                        "pages" => "login",
                        "error" => "2"
                    ]);
                }
                $this->view("admin",[
                    "pages" => "login",
                    "error" => "0"
                ]);
            }

        }
        function deleteUser($IdUser){
            if(isset($_SESSION['admin'])){
                $kq = $this->userModel->deleteUser($IdUser);
                $listUsers = $this->userModel->getUsers();
                $this->view("admin",[
                    "pages" => "thanhvien",
                    "listUsers" => $listUsers,
                    "result"    => $kq
                ]);
            }
            else{
                if(isset($_SESSION['username'])){
                    $this->view("admin",[
                        "pages" => "login",
                        "error" => "2"
                    ]);
                }
                $this->view("admin",[
                    "pages" => "login",
                    "error" => "0"
                ]);
            }
        }
        function editthanhvien($IdUser){
            if(isset($_SESSION['admin'])){
                $result = $this->userModel->GetInfoUser($IdUser);
                if(isset($_POST["btnEdit"]) ){
                    $fullname = $_POST["hovaten"];
                    $password = $_POST["password"];
                    $level = $_POST["level"];
                    $email = $_POST["email"];
                    $birth = date_create($_POST['birthday']);
                    $Birthday = date_format($birth,"Y/m/d");
                    $gender = $_POST["gender"];
                    $permission = $_POST["permission"];
                    $avatar = URLROOT."public/user/images/image.JPG";
                    $kq = $this->userModel->updatetUser($fullname,$IdUser,$password,$email,$level,$gender,$Birthday,$permission);
                    $listUsers = $this->userModel->getUsers();
                    $this->view("admin",[
                        "pages"  => "thanhvien",
                        "listUsers" => $listUsers,
                        "result" => $kq,
                    ]);
                }
                else{
                    $this->view("admin",[
                        "pages" => "editthanhvien",
                        "infoUsser" => $result,
                    ]);
                }
            }
            else{
                if(isset($_SESSION['username'])){
                    $this->view("admin",[
                        "pages" => "login",
                        "error" => "2"
                    ]);
                }
                $this->view("admin",[
                    "pages" => "login",
                    "error" => "0"
                ]);
            }
        }
        function addthanhvien(){
            if(isset($_SESSION['admin'])){
                if(isset($_POST["btnadd"]) ){
                        $nameValidation = "/^[a-zA-Z0-9]*$/";
                        $fullname = $_POST["hovaten"];
                        $username = $_POST["username"];
                        $permission = $_POST["permission"];
                        if(preg_match($nameValidation,$username)){
                            $password = $_POST["password"];
                            $level = $_POST["level"];
                            $email = $_POST["email"];
                            if(filter_var($email,FILTER_VALIDATE_EMAIL)){
                                $birth = date_create($_POST['birthday']);
                                $Birthday = date_format($birth,"Y/m/d");
                                $gender = $_POST["gender"];
                                $avatar = URLROOT."public/user/images/image.JPG";
                                $RegisterDay = date("Y/m/d");
                                $check_user = $this->userModel->check_user($username);
                                $check_email = $this->userModel->check_email($email);
                                if($check_user == "false" && $check_email == "false" ){
                                    $kq = $this->userModel->insertUser($fullname,$username,$password,$email,$level,$gender,$avatar,$RegisterDay,$Birthday,$permission);
                                    $listUsers = $this->userModel->getUsers();
                                    $this->view("admin",[
                                        "pages"  => "thanhvien",
                                        "listUsers" => $listUsers,
                                        "result" => $kq,
                                    ]);
                                }
                                else{
                                    
                                    $error = ($check_user == true) ? "User đã tồn tại" : "Email đã tồn tại";
                                    
                                    $this->view("admin",[
                                        "pages"  => "addthanhvien",
                                        "error"  => $error,
                                        "result" => "false",
                                    ]);
                                }
                            }
                            else{
                                $this->view("admin",[
                                    "pages" => "addthanhvien",
                                    "error"  => "Email sai định dạng",
                                    "result" => "false",
                                ]);
                            }
                        }
                        else{
                            $this->view("admin",[
                                "pages" => "addthanhvien",
                                "error"  => "Tên sai định dạng",
                                "result" => "false",
                            ]);
                        }
                }
                else{
                    $this->view("admin",[
                        "pages" => "addthanhvien",
                    ]);
                }
                }
                else{
                    if(isset($_SESSION['username'])){
                        $this->view("admin",[
                            "pages" => "login",
                            "error" => "2"
                        ]);
                    }
                    $this->view("admin",[
                        "pages" => "login",
                        "error" => "0"
                    ]);
                }
        }
        //IMAGES
        function avatarthanhvien(){
           /* if(isset($_POST['ok'])) 

            { 

                $folder ="uploads/"; 

                $image = $_FILES['image']['name']; 

                $path = $folder . $image ; 

                $target_file=$folder.basename($_FILES["image"]["name"]);


                $imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);


                $allowed=array('jpeg','png' ,'jpg'); $filename=$_FILES['image']['name']; 

                $ext=pathinfo($filename, PATHINFO_EXTENSION); if(!in_array($ext,$allowed) ) 

                { 

                    echo "Sorry, only JPG, JPEG, PNG & GIF  files are allowed.";

                }

                else{ 

                    move_uploaded_file( $_FILES['image'] ['tmp_name'], $path); 

                    $sth=$con->prepare("insert into users(image)values(:image) "); 

                    $sth->bindParam(':image',$image); 

                    $sth->execute(); 

                } 

                } 
                else{
                    $this->view("admin",[
                        "pages" => "avatarthanhvien",
                        
                    ]);
                }
                */
                if(isset($_SESSION['admin'])){
                    $listUsers = $this->userModel->getUsers();
                    $this->view("admin",[
                        "pages" => "avatarthanhvien",
                        "listUsers" => $listUsers,     
                    ]);
                }
                else{
                    if(isset($_SESSION['username'])){
                        $this->view("admin",[
                            "pages" => "login",
                            "error" => "2"
                        ]);
                    }
                    $this->view("admin",[
                        "pages" => "login",
                        "error" => "0"
                    ]);
                }
        }
        //Hết phần thành viên

        //Phâng quảng cáo 
        function quangcao(){
            $this->view("admin",[
                "pages" => "quangcao"
            ]);
        }
    }
