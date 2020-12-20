<?php
    class api extends Controller{
        private $adminModel;
        private $userModel;
        private $noidungModel;
        private $theloaiModel;
        public function __construct(){
            //Model 
            $this->userModel = $this->model("usersModel");
            $this->noidungModel = $this->model("noidungModel");
            $this->theloaiModel = $this->model("theloaiModel");
            $this->loaitinModel = $this->model("loaitinModel");
            $this->adminModel = $this->model("adminModel");
        }
        function getUser(){
            if(isset($_SESSION['admin'])){
                $listUsers = $this->userModel->getUsers();
                //var_dump(json_encode($listUsers));
                $num = $this->userModel->rowCount();
                if($num > 0){
                    $post_arr = array();
                    $post_arr['data'] = array();
                    foreach($listUsers as $user){
                        extract($listUsers);
                        $post_item = array(
                            "IdUser" => $user->IdUser,
                            "Username" => $user->Username,
                            "FullName" => $user->FullName,
                            "Email" => $user->Email,
                            "IdGroup" => $user->IdGroup,
                            "Gender" => $user->Gender,
                            "RegisterDay" => $user->RegisterDay,
                        );
                        array_push($post_arr['data'],$post_item);
                    }
                    $result = json_encode($post_arr);
                }
                else{
                    $result = json_encode("Chưa có thành viên nào tham gia");
                }
                $this->view("admin",[
                    "pages" => "thanhvien_api",
                    "listUsers" => $result,
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
       
        function SayHi(){
            $listUsers = $this->userModel->getUsers();
            //var_dump(json_encode($listUsers));
            $num = $this->userModel->rowCount();
            if($num > 0){
                $post_arr = array();
                $post_arr['data'] = array();
                foreach($listUsers as $user){
                    extract($listUsers);
                    $post_item = array(
                        "IdUser" => $user->IdUser,
                        "Username" => $user->Username,
                        "FullName" => $user->FullName,
                        "Email" => $user->Email,
                        "IdGroup" => $user->IdGroup,
                        "Gender" => $user->Gender,
                        "RegisterDay" => $user->RegisterDay,
                    );
                    array_push($post_arr['data'],$post_item);
                }
                $result = json_encode($post_arr);
            }
            else{
                $result = json_encode("Chưa có thành viên nào tham gia");
            }
            $this->view("admin",[
                "pages" => "thanhvien_api",
                "listUsers" => $result,
            ]);
        }
        function read(){
            $listUsers = $this->userModel->getUsers();
            //var_dump(json_encode($listUsers));
            $num = $this->userModel->rowCount();
            if($num > 0){
                $post_arr = array();
                $post_arr['data'] = array();
                foreach($listUsers as $user){
                    extract($listUsers);
                    $post_item = array(
                        "IdUser" => $user->IdUser,
                        "Username" => $user->Username,
                        "FullName" => $user->FullName,
                        "Email" => $user->Email,
                        "IdGroup" => $user->IdGroup,
                        "Gender" => $user->Gender,
                        "RegisterDay" => $user->RegisterDay,
                    );
                    array_push($post_arr['data'],$post_item);
                }
                json_encode($post_arr);
            }
        }
        function read_single($id){
            $user = $this->userModel->GetInfoUser($id);
            echo json_encode($user);
        }
        function create(){
            if(isset($_SESSION['admin'])){
                if(isset($_POST["btnadd"]) ){
                        $nameValidation = "/^[a-zA-Z0-9]*$/";
                        $fullname = isset($_POST['hovaten']) ? $_POST['hovaten'] : "";
                        $username = isset($_POST['username']) ? $_POST['username'] : "";
                        $permission = isset($_POST['permission']) ? $_POST['permission'] : "";
                        $password = isset($_POST['password']) ? $_POST['password'] : "";
                        $level = isset($_POST['level']) ? $_POST['level'] : "";
                        $email = isset($_POST['email']) ? $_POST['email'] : "";
                        $temp_birth = isset($_POST['birthday']) ? $_POST['birthday'] : "";
                        $get_birth = date_create($temp_birth);
                        $Birthday = date_format($get_birth,"Y/m/d");
                        $gender = isset($_POST['gender']) ? $_POST['gender'] : "";
                        if($fullname == null || $username == null || $permission == null || $password == null || $level == null || $email == null || $Birthday == null || $gender == null){
                            $this->view("admin",[
                                "pages" => "addthanhvien",
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
                                                "result" => $kq,
                                            ]);
                                        }
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
    }
?>