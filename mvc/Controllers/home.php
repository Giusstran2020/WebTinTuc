<?php 
    class home extends Controller{
        public $userModel;
        public $tieudeModel;
        public function __construct(){
            //Model 
            //$this->adminModel = $this->model("adminModel");
            $this->userModel = $this->model("usersModel");
            $this->noidungModel = $this->model("noidungModel");
            $this->theloaiModel = $this->model("theloaiModel");
            $this->loaitinModel = $this->model("loaitinModel");
            $this->newssaveModel = $this->model("newssaveModel");
        }
        function SayHi(){
            $ds_theloai = $this->theloaiModel->dstheloai();
            $ds_loaitin= $this->loaitinModel->dsloaitin();
            $dsnoidung_ASC = $this->noidungModel->dsnoidung_ASC();
            $dsnoidung_view = $this->noidungModel->dsnoidung_view();
            //$tintuc = $this->tieudeModel->dsTintuc();
            //$user = $this->userModel->getUsers();
            $this->view("home", [
                "pages"      => "index",
                "dsnoidung"  => $dsnoidung_ASC,
                "ds_loaitin"  => $ds_loaitin,
                "ds_theloai"  => $ds_theloai,
                "dsnoidung_view" => $dsnoidung_view,
            ]);
        }
        function viewed($IdNews){
            $dsnoidung = $this->noidungModel->dsnoidung();
            if(!isset($_SESSION['username_0'])){
                if($_SESSION['viewed'] != null){
                    $_SESSION['viewed'] = array_diff($_SESSION['viewed'],array($IdNews));
                    $_SESSION['viewed'][] = $IdNews;
                }
                else{
                    $_SESSION['viewed'][] = $IdNews;
                }     
                foreach($_SESSION['viewed'] as $list){
                    $dsview[] = $this->noidungModel->get_noidung($list);
                }
                $this->view("home", [
                    "pages"      => "home",
                    "dsview"  => $dsview,
                    "dsnoidung"  => $dsnoidung,
                ]);
            }
            else{
                $username = $_SESSION['username_0'];
                $IdUsers =  $this->userModel->getIDuser($username);
                $IdUser =  $IdUsers->IdUser;
                $kq = $this->newssaveModel->add_idnew($IdUser,$IdNews);
                $ds_view = $this->newssaveModel->get_IDnews($IdUser);
                foreach($ds_view as $list){
                    $dsview[] = $this->noidungModel->get_noidung($list->id_news);
                }
                $this->view("home", [
                    "pages"      => "home",
                    "dsview"  => $dsview,
                    "dsnoidung"  => $dsnoidung,
                ]);
            }
        }
    }
?>