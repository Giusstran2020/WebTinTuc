<?php 
    class home extends Controller{
        public $userModel;
        public $tieudeModel;
        public function __construct(){
            //Model 
            //$this->adminModel = $this->model("adminModel");
            $this->userModel = $this->model("usersModel");
            $this->tieudeModel = $this->model("tieudeModel");
        }
        function SayHi(){
            //$ds = $this->tieudeModel->dstieude();
            //$tintuc = $this->tieudeModel->dsTintuc();
            //$user = $this->userModel->getUsers();
            $this->view("home", [
                "pages"    => "home",
                "ds"       => $user,
                //"tintuc"       => $tintuc,
                
            ]);
        }
    }
?>