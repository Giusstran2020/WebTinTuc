<?php 
    class admin extends Controller{
        private $adminModel;
        private $userModel;
        private $noidungModel;
        private $theloaiModel;
        private $validate_number = "/^[0-9]]*$/";
        private $validate_username = "/^[a-zA-Z0-9]]*$/";
        private $validate_name = "/^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềếểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ ]+$/";
        public function __construct(){
            //Model 
            $this->userModel = $this->model("usersModel");
            $this->noidungModel = $this->model("noidungModel");
            $this->theloaiModel = $this->model("theloaiModel");
            $this->loaitinModel = $this->model("loaitinModel");
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
                    $theloai = $_POST['theloai'];
                    $stt = $_POST['txt_STT'];
                    $anhien = $_POST['txt_anhien'];
                    if($theloai == null || $stt == null || $anhien == null){
                        $this->view("admin",[
                            "pages" => "addtheloai",
                            "error" => "1",
                        ]);
                    }
                    else{   
                        if(!preg_match($this->validate_name,$theloai)){
                            $this->view("admin",[
                                "pages" => "addtheloai",
                                "error" => "2",
                            ]);
                        }
                        else{
                            
                            if(!preg_match($this->validate_number,$stt)){     
                                $this->view("admin",[
                                    "pages" => "addtheloai",
                                    "error" => "3",
                                ]);
                            }
                            else{
                                $check_theloai = $this->theloaiModel->check_theloai($theloai);
                                if($check_theloai == "false"){
                                    $kq = $this->theloaiModel->Insert_theloai($theloai,$stt,$anhien);
                                    $this->view("admin",[
                                        "pages"  => "addtheloai",  
                                        "result" => "true"
                                    ]);  
                                }
                                else{
                                    $this->view("admin",[
                                        "pages" => "addtheloai",
                                        "result" => "false"
                                    ]);
                                }
                            }
                        }
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
        
        function edittheloai($param=null){
            $IdType = $param[0];
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
                        $_theloai = $_POST["theloai"];
                        $STT = $_POST["txt_STT"];
                        $anhien = $_POST["txt_anhien"];
                        if( $_theloai == null || $STT == null || $anhien == null){
                            $ds = $this->theloaiModel->GetInfotheloai($IdType);
                            $this->view("admin",[
                                "pages"  => "edittheloai",
                                "error" => "1",
                                "name" =>   $ds,
                            ]); 
                        }
                        else{
                            $ds = $this->theloaiModel->GetInfotheloai($IdType);
                            if(!preg_match($this->validate_name,$_theloai)){
                                $this->view("admin",[
                                    "pages" => "edittheloai",
                                    "error" => "2",
                                    "name" =>   $ds,
                                ]);
                            }
                            else{
                                if(!preg_match($this->validate_number,$STT)){     
                                    $this->view("admin",[
                                        "pages" => "edittheloai",
                                        "error" => "3",
                                        "name" =>   $ds,
                                    ]);
                                }
                                else{
                                    $kq = $this->theloaiModel->update_theloai($IdType,$_theloai,$STT,$anhien);
                                    $_ds = $this->theloaiModel->GetInfotheloai($IdType);
                                    $this->view("admin",[
                                        "pages"  => "edittheloai",
                                        "result" => $kq,
                                        "name" =>   $_ds,
                                    ]);   
                                } 
                            }  
                        }
                    
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
                    $list_loaitin = $this->loaitinModel->dsloaitin();
                    $ds = $this->noidungModel->get_noidung($IdNews);
                    $this->view("admin",[
                        "pages" => "editnoidung",
                        "ds"    => $ds,
                        "list_loaitin" => $list_loaitin,
                    ]);
            }
            else{
                $list_loaitin = $this->loaitinModel->dsloaitin();
                if(isset($_SESSION['username'])){
                    $IdUser = $_SESSION['IdUser'];
                    if(isset($_POST["btn_editnoidung"])){
                        $check = $this->noidungModel->check_iduser($IdUser,$IdNews);
                        if($check = "true"){
                            $ds = $this->noidungModel->get_noidung($IdNews);
                            $this->view("admin",[
                            "pages" => "editnoidung",
                            "list_loaitin" => $list_loaitin,
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
                        $IdUser = $_SESSION['IdUser'];
                        if(isset($_POST["btn_submit"])){
                            $check = $this->noidungModel->check_iduser($IdUser,$IdNews);
                            if($check = "true"){
                                $ds = $this->noidungModel->get_noidung($IdNews);
                                foreach($ds as $list){
                                    $IdNewsType = $list->IdNewsType;
                                }
                                $Title = isset($_POST["theloai"]) ?  htmlspecialchars($_POST["theloai"]) : '';
                                $HotNews = isset($_POST["HotNews"]) ?  htmlspecialchars($_POST["HotNews"]) : '';
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
                            // ktra null 
                                if( $Title == null ||
                                    $HotNews == null ||
                                    $_Overview == null ||
                                    $_Detail == null ||
                                    $_UrlPics == null ||
                                    $_NewsAppear == null ||
                                    $_Keyword == null ||
                                    $_IdNewsType == null ||
                                    $_Day == null ){
                                        $this->view("admin",[
                                            "pages" => "editnoidung",
                                            "list_loaitin" => $list_loaitin,
                                            "error"    => "1",
                                            "ds"    => $ds,
                                        ]);
                                }
                                else{
                                    $kq = $this->noidungModel->update_noidung($IdNews,$Title,$_Overview,$_Detail,$_UrlPics,$_NewsAppear,$_Keyword,$_Day,$_IdNewsType,$IdNewsType,$HotNews);
                                    $_ds = $this->noidungModel->get_noidung($IdNews);
                                    $this->view("admin",[
                                        "pages" => "editnoidung",
                                        "list_loaitin" => $list_loaitin,
                                        "result"    => $kq,
                                        "ds"    => $_ds,
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
                            // đang làm
        function addnoidung(){
            if(isset($_SESSION['admin'])){
                    $ds = $this->noidungModel->dsnoidung();
                        $this->view("admin",[
                            "pages" => "noidung",
                            "ds"    => $ds,
                            "error"    => "1",
                        ]);
            }
            else{
                if(isset($_SESSION['username'])){
                    $IdUser =  $_SESSION['IdUser'];
                    $list_loaitin = $this->loaitinModel->dsloaitin();
                    if(isset($_POST['btn_addnoidung'])){
                        $this->view("admin",[
                            "pages" => "addnoidung",
                            "list_loaitin" => $list_loaitin,
                        ]);
                    }
                    else{
                       if(isset($_POST['btn_submit'])){ 
                            $Title = isset($_POST["theloai"]) ?  htmlspecialchars($_POST["theloai"]) : '';
                            $HotNews = isset($_POST["HotNews"]) ?  htmlspecialchars($_POST["HotNews"]) : '';
                            $_Overview = isset($_POST["tomtat"]) ?  htmlspecialchars($_POST["tomtat"]) : '';
                            $_Detail = isset($_POST["content"]) ?  htmlspecialchars($_POST["content"]) : '';
                            $_UrlPics = isset($_POST["hinhanh"]) ?  htmlspecialchars($_POST["hinhanh"]) : '';
                            $_NewsAppear = isset($_POST["anhien"]) ?  htmlspecialchars($_POST["anhien"]) : '';
                            $_Keyword = isset($_POST["Keyword"]) ?  htmlspecialchars($_POST["Keyword"]) : '';
                            $_IdNewsType = isset($_POST["IdNewsType"]) ?  htmlspecialchars($_POST["IdNewsType"]) : '';
                            $_Day = date("Y-m-d");
                            if(     $Title == null || $HotNews == null || $_Overview == null || $_Detail == null || $_UrlPics == null || $_NewsAppear == null
                                ||  $_Keyword == null ||  $_IdNewsType == null ||  $_Day == null )
                            {
                                $this->view("admin",[
                                    "pages" => "addnoidung",
                                    "list_loaitin" => $list_loaitin,
                                    "error" => "1",
                                ]);
                            }
                            else{
                                $kq = $this->noidungModel->insert_noidung($Title,$_Overview,$_Detail,$_UrlPics,$_NewsAppear,$_Keyword,$_Day,$_IdNewsType,$IdUser,$HotNews);
                                $this->view("admin",[
                                    "pages" => "addnoidung",
                                    "list_loaitin" => $list_loaitin,
                                    "result" => $kq
                                ]);
                            }
                        }
                       else{
                                $this->view("admin",[
                                    "pages" => "addnoidung",
                                    "list_loaitin" => $list_loaitin,
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
        function deleteUser($IdUser=null){
            if(isset($_SESSION['admin'])){
                $kq = $this->userModel->deleteUser($IdUser[0]);
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
        function editthanhvien($IdUser=null){
            if(isset($_SESSION['admin'])){
                $result = $this->userModel->GetInfoUser($IdUser[0]);
                $list_permission = $this->userModel->Get_permission();
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
                    $kq = $this->userModel->updatetUser($fullname,$IdUser[0],$password,$email,$level,$gender,$Birthday,$permission);
                    $listUsers = $this->userModel->getUsers();
                    $this->view("admin",[
                        "pages"  => "thanhvien",
                        "listUsers" => $listUsers,
                        "list_permission" => $list_permission,
                        "result" => $kq,
                    ]);
                }
                else{
                    $this->view("admin",[
                        "pages" => "editthanhvien",
                        "infoUsser" => $result,
                        "list_permission" => $list_permission,
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
                $list_permission = $this->userModel->Get_permission();
                if(isset($_POST["btnadd"]) ){
                        $nameValidation = "/^[a-zA-Z0-9]*$/";
                        $fullname = isset($_POST['hovaten']) ? $_POST['hovaten'] : "";
                        $username = isset($_POST['username']) ? $_POST['username'] : "";
                        $permission = isset($_POST['permission']) ? $_POST['permission'] : "";
                        $password = isset($_POST['password']) ? $_POST['password'] : "";
                        $level = isset($_POST['level']) ? $_POST['level'] : "";
                        $email = isset($_POST['email']) ? $_POST['email'] : "";
                        $temp_birth = isset($_POST['birthday']) ? $_POST['birthday'] : "";
                        $Birthday = date("Y/m/d", strtotime($temp_birth));
                        $gender = isset($_POST['gender']) ? $_POST['gender'] : "";
                        if($fullname == null || $username == null || $permission == null || $password == null || $level == null || $email == null || $Birthday == null || $gender == null){
                            $this->view("admin",[
                                "pages" => "addthanhvien",
                                "list_permission" => $list_permission,
                                "error"  => "Vui lòng điền đủ thông tin",
                                "result" => "false",
                            ]);
                        }
                        else{
                            if(preg_match($nameValidation,$username)){
                                if(filter_var($email,FILTER_VALIDATE_EMAIL)){
                                    $avatar = URLROOT."public/user/images/image.JPG";
                                    $RegisterDay = date("Y/m/d");
                                    $check_user = $this->userModel->check_user($username);
                                    $check_email = $this->userModel->check_email($email);
                                    if($check_user == "false" && $check_email == "false" ){
                                        $year_brith = explode("/",$Birthday);
                                        $year_now = explode("/",$RegisterDay);
                                        $age = intval($year_now[0]) - intval($year_brith[0]);
                                        if($age < 10){
                                            $this->view("admin",[
                                                "pages"  => "addthanhvien",
                                                "error"  => "Tuổi phải lớn hơn 10",
                                                "list_permission" => $list_permission,
                                                "result" => "false",
                                            ]);
                                        }
                                        else{
                                            $token = md5($username)."LV".$level;
                                            $kq = $this->userModel->insertUser($fullname,$username,$password,$email,$level,$gender,$avatar,$RegisterDay,$Birthday,$permission,$token);
                                            $listUsers = $this->userModel->getUsers();
                                            $this->view("admin",[
                                                "pages"  => "thanhvien",
                                                "listUsers" => $listUsers,
                                                "list_permission" => $list_permission,
                                                "result" => $kq,
                                            ]);
                                        }
                                    }
                                    else{
                                        $error = ($check_user == true) ? "User đã tồn tại" : "Email đã tồn tại";
                                        $this->view("admin",[
                                            "pages"  => "addthanhvien",
                                            "list_permission" => $list_permission,
                                            "error"  => $error,
                                            "result" => "false",
                                        ]);
                                    }
                                }
                                else{
                                    $this->view("admin",[
                                        "pages" => "addthanhvien",
                                        "error"  => "Email sai định dạng",
                                        "list_permission" => $list_permission,
                                        "result" => "false",
                                    ]);
                                }
                            }
                            else{
                                $this->view("admin",[
                                    "pages" => "addthanhvien",
                                    "error"  => "Tên sai định dạng",
                                    "list_permission" => $list_permission,
                                    "result" => "false",
                                ]);
                            }
                        }
                }
                else{
                    $this->view("admin",[
                        "pages" => "addthanhvien",
                        "list_permission" => $list_permission,
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
            if(isset($_SESSION['admin'])){
                $this->view("admin",[
                    "pages" => "quangcao"
                ]);
            }
            else{
                if(isset($_SESSION['username'])){
                    $this->view("admin",[
                        "pages" => "quangcao"
                    ]);
                }
                else{
                    $this->view("admin",[
                        "pages" => "login",
                        "error" => "0"
                    ]);
                }
            }
        }
    }
