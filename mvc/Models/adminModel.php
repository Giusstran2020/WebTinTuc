<?php 
    class adminModel extends DB{
        public function Check_Login_admin($username,$password){
            $query = "SELECT username, password FROM User WHERE username='$username'";
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


}
?>