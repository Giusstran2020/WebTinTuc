<?php 
    class admin extends Controller{
        public $adminModel;
        public $userModel;
        public function __construct(){
            //Model 
            //$this->adminModel = $this->model("adminModel");
            $this->userModel = $this->model("usersModel");
        }
        function SayHi(){
            $this->view("admin",[
                "pages" => "admin"
            ]);
        }
        function tieude(){
            $this->view("admin",[
                "pages" => "tieude"
            ]);
        }
        function noidung(){
        
            $this->view("admin",[
                "pages" => "noidung"
            ]);
        }
        function thanhvien(){
            $ds = $this->userModel->dsUser();
            $this->view("admin",[
                "pages" => "thanhvien",
                "ds" => $ds
            ]);
        }
        function editthanhvien(){
            $this->view("admin",[
                "pages" => "editthanhvien",
            ]);
        }
        function addthanhvien(){
            if(isset($_POST["btnadd"]) ){
                    $fullname = $_POST["hovaten"];
                    $username = $_POST["username"];
                    $password = $_POST["password"];
                    $level = $_POST["level"];
                    $email = $_POST["email"];
                    $check_user = $this->userModel->check_user($username);
                    if($check_user == "false"){
                        $kq = $this->userModel->Insert_user($fullname,$username,$password,$email,$level);
                        $this->view("admin",[
                            "pages" => "addthanhvien",
                            "result" => $kq,
                        ]);
                    }
                }
            else{
                $this->view("admin",[
                    "pages" => "addthanhvien",
                    
                ]);
            }
        }
        function quangcao(){
            $this->view("admin",[
                "pages" => "quangcao"
            ]);
        }
    }
?>