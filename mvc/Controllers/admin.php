<?php 
    class admin extends Controller{
        public $adminModel;
        public $userModel;
        public function __construct(){
            //Model 
            //$this->adminModel = $this->model("adminModel");
            $this->UserModel = $this->model("usersModel");
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
            $this->view("admin",[
                "pages" => "thanhvien"
            ]);
        }
        function quangcao(){
            $this->view("admin",[
                "pages" => "quangcao"
            ]);
        }
    }
?>