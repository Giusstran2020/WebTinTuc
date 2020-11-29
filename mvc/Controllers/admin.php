<?php 
    class admin extends Controller{
        public $adminModel;
        public $userModel;
        public $tieudeModel;
        public function __construct(){
            //Model 
            //$this->adminModel = $this->model("adminModel");
            $this->userModel = $this->model("usersModel");
            $this->tieudeModel = $this->model("tieudeModel");

        }
        function SayHi(){
            $this->view("admin",[
                "pages" => "admin"
            ]);
        }
        //Phânf tiêu đề
        function tieude(){
            $ds = $this->tieudeModel->dstieude();
            $this->view("admin",[
                "pages" => "tieude",
                "ds"    => $ds
            ]);
        }
        //Add tieu de
        function addtieude(){
            if(isset($_POST["btn_addtieude"])){
                $tieude = $_POST["txt"];
                $check_tieude = $this->tieudeModel->check_tieude($tieude);
                if($check_tieude == "false"){
                    $kq = $this->tieudeModel->Insert_tieude($tieude);
                    $this->view("admin",[
                        "pages"  => "addtieude",
                        "result" => $kq,
                    ]);  
                }
                else{
                    $this->view("admin",[
                        "pages" => "addtieude",
                        "result" => "false"
                    ]);
                }
            }
            else{
                $this->view("admin",[
                    "pages" => "addtieude"
                ]);
            }
        }
        function xoatieude($tieude){
            $kq = $this->tieudeModel->delete_tieude($tieude);
            $ds = $this->tieudeModel->dstieude();
            $this->view("admin",[
                "pages" => "tieude",
                "ds"    => $ds,
                "result"    => $kq
            ]);
        }
        function edittieude($tieude){
            if(isset($_POST["btn_edittieude"])){
                
                    $this->view("admin",[
                        "pages" => "edittieude",
                        "name"    => $tieude,
                    ]);
            }
            else{
                if(isset($_POST["submit_edittieude"])){
                    $_tieude = $_POST["txt"];
                    $check_tieude = $this->tieudeModel->check_tieude($_tieude);
                    if($check_tieude == "false"){
                        $kq = $this->tieudeModel->edit_tieude($tieude,$_tieude);
                        $this->view("admin",[
                            "pages"  => "edittieude",
                            "result" => $kq,
                            "name"   => $_tieude
                        ]);  
                    }
                    else{
                        $ds = $this->tieudeModel->dstieude();
                        $this->view("admin",[
                            "pages" => "edittieude",
                            "result" => "false",
                            "name"   => $tieude
                        ]);
                    }
                }
                else{
                    $ds = $this->tieudeModel->dstieude();
                    $this->view("admin",[
                        "pages" => "tieude",
                        "ds"    => $ds,
                    ]);
            }}
            
        }
        //Hết phần tiêu đề 

        // Phần nội dung
        function noidung(){
            $ds = $this->tieudeModel->dsTintuc();
            $this->view("admin",[
                "pages" => "noidung",
                "ds"    => $ds,
            ]);
        }
        function xoanoidung($tieude){
            $kq = $this->tieudeModel->delete_tieude($tieude);
            $ds = $this->tieudeModel->dsTintuc();
            $this->view("admin",[
                "pages" => "noidung",
                "ds"    => $ds,
                "result"    => $kq
            ]);
        }
        function editnoidung($tieude){
            if(isset($_POST["btn_editnoidung"])){
                $ds = $this->tieudeModel->get_noidung($tieude);
                $this->view("admin",[
                    "pages" => "editnoidung",
                    "ds"    => $ds,
                ]);
            }
            else{
                if(isset($_POST["btn_submit"])){
                    $_noidung = isset($_POST["content"]) ?  htmlspecialchars($_POST["content"]) : '';
                    $_hinhanh = $_POST["hinhanh"];
                    $kq = $this->tieudeModel->edit_noidung($tieude,$_noidung,$_hinhanh);
                    $ds = $this->tieudeModel->get_noidung($tieude);
                    $this->view("admin",[
                        "pages" => "editnoidung",
                        "result"    => $kq,
                        "ds"    => $ds,
                    ]);
                }
                else{
                    $ds = $this->tieudeModel->dsTintuc();
                    $this->view("admin",[
                        "pages" => "noidung",
                        "ds"    => $ds,
                    ]);
                }
            }
        }
        // Hết phần nội dung

        //Phâng thành viên -------------------------------- PDO
        function thanhvien(){
            $listUsers = $this->userModel->getUsers();
            $this->view("admin",[
                "pages" => "thanhvien",
                "listUsers" => $listUsers
            ]);
        }
        function deleteUser($username){
            $kq = $this->userModel->deleteUser($username);
            $listUsers = $this->userModel->getUsers();
            $this->view("admin",[
                "pages" => "thanhvien",
                "listUsers" => $listUsers,
                "result"    => $kq
            ]);
        }
        function editthanhvien($username){
            $result = $this->userModel->GetInfoUser($username);
            if(isset($_POST["btnEdit"]) ){
                $fullname = $_POST["hovaten"];
                $password = $_POST["password"];
                $level = $_POST["level"];
                $email = $_POST["email"];

                $kq = $this->userModel->updatetUser($fullname,$username,$password,$email,$level);
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
        function addthanhvien(){
            if(isset($_POST["btnadd"]) ){
                    $fullname = $_POST["hovaten"];
                    $username = $_POST["username"];
                    $password = $_POST["password"];
                    $level = $_POST["level"];
                    $email = $_POST["email"];
                    $check_user = $this->userModel->check_user($username);
                    if($check_user == "false"){
                        $kq = $this->userModel->insertUser($fullname,$username,$password,$email,$level);
                        $listUsers = $this->userModel->getUsers();
                        $this->view("admin",[
                            "pages"  => "thanhvien",
                            "listUsers" => $listUsers,
                            "result" => $kq,
                        ]);
                    }
                    else{
                        $this->view("admin",[
                            "pages"  => "addthanhvien",
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
        //IMAGES
        function avatarthanhvien(){
            if(isset($_POST['ok'])) 

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
        }
        //Hết phần thành viên

        //Phâng quảng cáo 
        function quangcao(){
            $this->view("admin",[
                "pages" => "quangcao"
            ]);
        }
    }
