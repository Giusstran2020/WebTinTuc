<?php 
    class home extends Controller{
        public $userModel;
        public $tieudeModel;
        public function __construct(){
            //Model 
            //$this->adminModel = $this->model("adminModel");
            $this->userModel = $this->model("usersModel");
            $this->noidungModel = $this->model("noidungModel");
        }
        function SayHi(){
            $dsnoidung = $this->noidungModel->dsnoidung();
            //$tintuc = $this->tieudeModel->dsTintuc();
            //$user = $this->userModel->getUsers();
            $this->view("home", [
                "pages"      => "home",
                "dsnoidung"  => $dsnoidung,
                
            ]);
        }
        function home($IdNews){
            $dsnoidung = $this->noidungModel->get_noidung($IdNews);
            if(isset($_SESSION['username_0'])){
                if(!isset($_SESSION["viewed"])){
                    $_SESSION["viewed"] = array();
                }
                $_SESSION["viewed"][$IdNews] = $dsnoidung;
                $this->view("home", [
                    "pages"      => "home",
                    "dsnoidung"  => $dsnoidung,
                ]);
            }
            else{
                $this->view("home", [
                    "pages"      => "home",
                    "dsnoidung"  => $dsnoidung,
                    
                ]);
            }
        }
    }
?>