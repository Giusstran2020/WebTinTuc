<?php 
    class usersModel extends DB{
        public function Check_Login($username,$password){
            $query = "SELECT username, password FROM admin WHERE username='$username'";
            $result = mysqli_query($this->connect,$query) or die(mysqli_error());
            $kq = false;
            if (mysqli_num_rows($result) == 0){
                $kq = false;
                // ktra ten
                echo "sai ten";
            }
            else {
                $row = mysqli_fetch_array($result);
                if ($password == $row['password']){
                    $kq = true;   
                }
            }
             return json_encode($kq);
        }
        public function Get_level(){
            // kiem tra coi user là level gi để đưa vào quản trị tương ứng
        }
        
}
?>