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
        function addCategory(){
            $this->view("admin",[
                "pages" => "category_add"
            ]);
        }
    }
?>